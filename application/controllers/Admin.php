<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_pengajuan');
        $this->load->model('M_petugas');
        $this->load->model('M_sertifikat');
        $this->load->model('M_notifikasi');
        $this->load->model('M_jadwal');
        $this->load->library('form_validation');
    }

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function dashboard()
    {
        $data['stats'] = $this->M_pengajuan->get_status_stats();
        $data['monthly_stats'] = $this->M_pengajuan->get_monthly_stats();
        $data['recent_pengajuan'] = $this->M_pengajuan->get_recent(5);
        $data['notifikasi'] = $this->M_notifikasi->get_unread(5);
        $data['count_notifikasi'] = $this->M_notifikasi->count_unread();
        $data['count_petugas'] = $this->M_petugas->count_aktif();
        $data['count_sertifikat'] = $this->M_sertifikat->count_this_month();
        
        $this->load->view('admin/dashboard', $data);
    }

    // ============ PENGAJUAN MANAGEMENT ============
    
    public function pengajuan($status = null)
    {
        if ($status) {
            $data['pengajuan'] = $this->M_pengajuan->get_by_status($status);
            $data['filter_status'] = $status;
        } else {
            $data['pengajuan'] = $this->M_pengajuan->get_all_pengajuan();
            $data['filter_status'] = 'semua';
        }
        $data['stats'] = $this->M_pengajuan->get_status_stats();
        $this->load->view('admin/pengajuan', $data);
    }

    public function detail_pengajuan($id)
    {
        $data['pengajuan'] = $this->M_pengajuan->get_detail_full($id);
        if (!$data['pengajuan']) {
            show_404();
        }
        $data['petugas_list'] = $this->M_petugas->get_all('aktif');
        $data['sertifikat'] = $this->M_sertifikat->get_by_pengajuan($id);
        $data['jadwal'] = $this->M_jadwal->get_by_pengajuan($id);
        
        $this->load->view('admin/detail_pengajuan', $data);
    }

    public function verify($id)
    {
        $this->form_validation->set_rules('petugas_id', 'Petugas', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Pilih petugas terlebih dahulu.');
        } else {
            $petugas_id = $this->input->post('petugas_id');
            $catatan = $this->input->post('catatan_admin');
            
            $this->M_pengajuan->update_pengajuan($id, [
                'petugas_id' => $petugas_id,
                'status' => 'diproses',
                'verified_at' => date('Y-m-d H:i:s'),
                'verified_by' => $this->session->userdata('user_id'),
                'catatan_admin' => $catatan
            ]);
            
            $this->session->set_flashdata('success', 'Pengajuan berhasil diverifikasi dan petugas ditugaskan.');
        }
        
        redirect('admin/detail_pengajuan/' . $id);
    }

    public function update_status($id, $status)
    {
        $allowed = ['pending', 'diproses', 'selesai', 'ditolak'];
        if (!in_array($status, $allowed)) {
            show_404();
        }
        
        $this->M_pengajuan->update_status($id, $status);
        $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui.');
        redirect('admin/detail_pengajuan/' . $id);
    }

    public function terbitkan_sertifikat($id)
    {
        $pengajuan = $this->M_pengajuan->get_detail_full($id);
        if (!$pengajuan || $pengajuan->status != 'diproses') {
            $this->session->set_flashdata('error', 'Pengajuan harus dalam status diproses.');
            redirect('admin/detail_pengajuan/' . $id);
            return;
        }

        // Check if certificate already exists
        $existing = $this->M_sertifikat->get_by_pengajuan($id);
        if ($existing) {
            $this->session->set_flashdata('error', 'Sertifikat sudah diterbitkan untuk pengajuan ini.');
            redirect('admin/detail_pengajuan/' . $id);
            return;
        }

        $no_sertifikat = $this->M_sertifikat->generate_no_sertifikat();
        $data = [
            'pengajuan_id' => $id,
            'no_sertifikat' => $no_sertifikat,
            'tanggal_terbit' => date('Y-m-d'),
            'tanggal_berlaku' => date('Y-m-d', strtotime('+1 year')),
            'keterangan' => $this->input->post('keterangan')
        ];

        if ($this->M_sertifikat->create($data)) {
            $this->M_pengajuan->update_status($id, 'selesai');
            
            // Create notification
            $this->M_notifikasi->create([
                'pengajuan_id' => $id,
                'judul' => 'Sertifikat Diterbitkan',
                'pesan' => 'Sertifikat ' . $no_sertifikat . ' telah diterbitkan untuk pengajuan ' . $pengajuan->nama_pemohon,
                'tipe' => 'sertifikat_terbit'
            ]);
            
            $this->session->set_flashdata('success', 'Sertifikat berhasil diterbitkan: ' . $no_sertifikat . '. User dapat mengunduh sertifikat dari dashboard.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menerbitkan sertifikat.');
        }    

        redirect('admin/detail_pengajuan/' . $id);
    }

    public function tolak($id)
    {
        $catatan = $this->input->post('catatan_admin');
        $this->M_pengajuan->update_pengajuan($id, [
            'status' => 'ditolak',
            'catatan_admin' => $catatan
        ]);
        $this->session->set_flashdata('success', 'Pengajuan telah ditolak.');
        redirect('admin/detail_pengajuan/' . $id);
    }

    // ============ PETUGAS MANAGEMENT ============
    
    public function petugas()
    {
        $data['petugas'] = $this->M_petugas->get_all();
        $this->load->view('admin/petugas', $data);
    }

    public function tambah_petugas()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['mode'] = 'tambah';
            $this->load->view('admin/form_petugas', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telepon' => $this->input->post('no_telepon'),
                'status' => 'aktif'
            ];

            if ($this->M_petugas->create($data)) {
                $this->session->set_flashdata('success', 'Petugas berhasil ditambahkan.');
                redirect('admin/petugas');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan petugas.');
                redirect('admin/tambah_petugas');
            }
        }
    }

    public function edit_petugas($id)
    {
        $data['petugas'] = $this->M_petugas->get_by_id($id);
        if (!$data['petugas']) {
            show_404();
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['mode'] = 'edit';
            $this->load->view('admin/form_petugas', $data);
        } else {
            $update = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telepon' => $this->input->post('no_telepon'),
                'status' => $this->input->post('status')
            ];

            if ($this->M_petugas->update($id, $update)) {
                $this->session->set_flashdata('success', 'Data petugas berhasil diperbarui.');
                redirect('admin/petugas');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data petugas.');
                redirect('admin/edit_petugas/' . $id);
            }
        }
    }

    public function hapus_petugas($id)
    {
        if ($this->M_petugas->delete($id)) {
            $this->session->set_flashdata('success', 'Petugas berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus petugas.');
        }
        redirect('admin/petugas');
    }

    // ============ SERTIFIKAT ============
    
    public function sertifikat()
    {
        $data['sertifikat'] = $this->M_sertifikat->get_all();
        $this->load->view('admin/sertifikat', $data);
    }

    // ============ NOTIFIKASI ============
    
    public function notifikasi()
    {
        $data['notifikasi'] = $this->M_notifikasi->get_all(50);
        $this->M_notifikasi->mark_all_read();
        $this->load->view('admin/notifikasi', $data);
    }

    // AJAX endpoint for real-time notification polling
    public function get_notif_count()
    {
        $count = $this->M_notifikasi->count_unread();
        $notifikasi = $this->M_notifikasi->get_unread(5);
        
        $items = [];
        foreach ($notifikasi as $n) {
            $items[] = [
                'judul' => $n->judul,
                'pesan' => $n->pesan,
                'waktu' => date('d M H:i', strtotime($n->created_at))
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode(['count' => $count, 'items' => $items]);
    }

    // ============ PENJADWALAN PENGUJIAN ============
    
    public function jadwal($status = null)
    {
        if ($status) {
            $data['jadwal'] = $this->M_jadwal->get_all($status);
            $data['filter_status'] = $status;
        } else {
            $data['jadwal'] = $this->M_jadwal->get_all();
            $data['filter_status'] = 'semua';
        }
        $this->load->view('admin/jadwal', $data);
    }

    public function tambah_jadwal($pengajuan_id = null)
    {
        $this->form_validation->set_rules('pengajuan_id', 'Pengajuan', 'required');
        $this->form_validation->set_rules('tanggal_pengujian', 'Tanggal Pengujian', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['mode'] = 'tambah';
            $data['pengajuan_list'] = $this->M_jadwal->get_pengajuan_available();
            $data['petugas_list'] = $this->M_petugas->get_all('aktif');
            $data['selected_pengajuan_id'] = $pengajuan_id;
            
            // If coming from a specific pengajuan, get its details
            if ($pengajuan_id) {
                $data['pengajuan_detail'] = $this->M_pengajuan->get_detail_full($pengajuan_id);
            }
            
            $this->load->view('admin/form_jadwal', $data);
        } else {
            $data = [
                'pengajuan_id' => $this->input->post('pengajuan_id'),
                'petugas_id' => $this->input->post('petugas_id'),
                'tanggal_pengujian' => $this->input->post('tanggal_pengujian'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'lokasi' => $this->input->post('lokasi'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'dijadwalkan'
            ];

            if ($this->M_jadwal->create($data)) {
                // Create notification
                $pengajuan = $this->M_pengajuan->get_detail_full($data['pengajuan_id']);
                $this->M_notifikasi->create([
                    'pengajuan_id' => $data['pengajuan_id'],
                    'judul' => 'Jadwal Pengujian Dibuat',
                    'pesan' => 'Jadwal pengujian untuk pengajuan ' . $pengajuan->no_registrasi . ' telah dibuat pada tanggal ' . date('d/m/Y', strtotime($data['tanggal_pengujian'])),
                    'tipe' => 'info'
                ]);
                
                $this->session->set_flashdata('success', 'Jadwal pengujian berhasil dibuat.');
                redirect('admin/jadwal');
            } else {
                $this->session->set_flashdata('error', 'Gagal membuat jadwal pengujian.');
                redirect('admin/tambah_jadwal');
            }
        }
    }

    public function edit_jadwal($id)
    {
        $data['jadwal'] = $this->M_jadwal->get_by_id($id);
        if (!$data['jadwal']) {
            show_404();
        }

        $this->form_validation->set_rules('tanggal_pengujian', 'Tanggal Pengujian', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['mode'] = 'edit';
            $data['petugas_list'] = $this->M_petugas->get_all('aktif');
            $this->load->view('admin/form_jadwal', $data);
        } else {
            $update = [
                'petugas_id' => $this->input->post('petugas_id'),
                'tanggal_pengujian' => $this->input->post('tanggal_pengujian'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'lokasi' => $this->input->post('lokasi'),
                'catatan' => $this->input->post('catatan')
            ];

            if ($this->M_jadwal->update($id, $update)) {
                $this->session->set_flashdata('success', 'Jadwal pengujian berhasil diperbarui.');
                redirect('admin/jadwal');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui jadwal pengujian.');
                redirect('admin/edit_jadwal/' . $id);
            }
        }
    }

    public function hapus_jadwal($id)
    {
        if ($this->M_jadwal->delete($id)) {
            $this->session->set_flashdata('success', 'Jadwal pengujian berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus jadwal pengujian.');
        }
        redirect('admin/jadwal');
    }

    public function update_status_jadwal($id, $status)
    {
        $allowed = ['dijadwalkan', 'berlangsung', 'selesai', 'dibatalkan'];
        if (!in_array($status, $allowed)) {
            show_404();
        }
        
        $this->M_jadwal->update_status($id, $status);
        $this->session->set_flashdata('success', 'Status jadwal berhasil diperbarui.');
        redirect('admin/jadwal');
    }
}
