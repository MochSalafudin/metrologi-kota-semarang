<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') != 'user') {
            redirect('auth');
        }
        $this->load->model('M_pengajuan');
        $this->load->model('M_sertifikat');
        $this->load->model('M_jadwal');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        redirect('user/dashboard');
    }

    public function dashboard()
    {
        $user_id = $this->session->userdata('user_id');
        $data['pengajuan'] = $this->M_pengajuan->get_pengajuan_by_user($user_id);
        $this->load->view('user/dashboard', $data);
    }

    public function pengajuan()
    {
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required|trim');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik/Instansi', 'required|trim');
        $this->form_validation->set_rules('jenis_layanan', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('tempat_pengerjaan', 'Tempat Pengerjaan', 'required');
        $this->form_validation->set_rules('jenis_uttp', 'Jenis UTTP', 'required|trim');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');
        $this->form_validation->set_rules('jumlah_alat', 'Jumlah Alat', 'required|integer|greater_than[0]');

        if ($this->form_validation->run() == false) {
            // Generate preview registration number
            $data['no_registrasi'] = $this->M_pengajuan->generate_no_registrasi();
            $this->load->view('user/pengajuan', $data);
        } else {
            // Handle file upload
            $dokumen_path = null;
            if (!empty($_FILES['dokumen_pendukung']['name'])) {
                $config['upload_path'] = './uploads/dokumen_pendukung/';
                $config['allowed_types'] = 'pdf|doc|docx|jpeg|jpg';
                $config['max_size'] = 2048; // 2MB
                $config['file_name'] = time() . '_' . $_FILES['dokumen_pendukung']['name'];

                // Create directory if not exists
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }

                $this->upload->initialize($config);

                if ($this->upload->do_upload('dokumen_pendukung')) {
                    $upload_data = $this->upload->data();
                    $dokumen_path = 'uploads/dokumen_pendukung/' . $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                    redirect('user/pengajuan');
                    return;
                }
            }

            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'no_registrasi' => $this->M_pengajuan->generate_no_registrasi(),
                'nama_pemohon' => $this->input->post('nama_pemohon'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'dokumen_pendukung' => $dokumen_path,
                'jenis_layanan' => $this->input->post('jenis_layanan'),
                'tempat_pengerjaan' => $this->input->post('tempat_pengerjaan'),
                'jenis_uttp' => $this->input->post('jenis_uttp'),
                'kapasitas' => $this->input->post('kapasitas'),
                'jumlah_alat' => $this->input->post('jumlah_alat'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'pending'
            ];

            if ($this->M_pengajuan->create_pengajuan($data)) {
                // Create notification for admin
                $data['id'] = $this->db->insert_id();
                $this->load->model('M_notifikasi');
                $this->M_notifikasi->create_pengajuan_notification($data);
                
                $this->session->set_flashdata('success', 'Pengajuan berhasil dikirim dengan No. Registrasi: ' . $data['no_registrasi']);
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengirim pengajuan.');
                redirect('user/pengajuan');
            }
        }
    }
    
    public function detail($id)
    {
        $user_id = $this->session->userdata('user_id');
        $data['pengajuan'] = $this->M_pengajuan->get_pengajuan_detail($id, $user_id);
        
        if (!$data['pengajuan']) {
            show_404();
        }
        
        $data['sertifikat'] = $this->M_sertifikat->get_by_pengajuan($id);
        $data['jadwal'] = $this->M_jadwal->get_by_pengajuan($id);
        $this->load->view('user/detail_pengajuan', $data);
    }

    public function sertifikat($pengajuan_id)
    {
        $user_id = $this->session->userdata('user_id');
        $data['pengajuan'] = $this->M_pengajuan->get_pengajuan_detail($pengajuan_id, $user_id);
        
        if (!$data['pengajuan']) {
            show_404();
        }
        
        $data['sertifikat'] = $this->M_sertifikat->get_by_pengajuan($pengajuan_id);
        
        if (!$data['sertifikat']) {
            $this->session->set_flashdata('error', 'Sertifikat belum diterbitkan untuk pengajuan ini.');
            redirect('user/detail/' . $pengajuan_id);
            return;
        }
        
        // Format dates in Indonesian
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        $ts = strtotime($data['sertifikat']->tanggal_terbit);
        $data['tanggal_terbit'] = date('d', $ts) . ' ' . $bulan[(int)date('m', $ts)] . ' ' . date('Y', $ts);
        
        if ($data['sertifikat']->tanggal_berlaku) {
            $tb = strtotime($data['sertifikat']->tanggal_berlaku);
            $data['tanggal_berlaku'] = date('d', $tb) . ' ' . $bulan[(int)date('m', $tb)] . ' ' . date('Y', $tb);
        } else {
            $data['tanggal_berlaku'] = '-';
        }
        
        $this->load->view('user/sertifikat', $data);
    }
}
