<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($data)
    {
        return $this->db->insert('tb_jadwal_pengujian', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_jadwal_pengujian', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_jadwal_pengujian');
    }

    public function get_by_id($id)
    {
        $this->db->select('tb_jadwal_pengujian.*, tb_pengajuan.no_registrasi, tb_pengajuan.nama_pemohon, tb_pengajuan.jenis_layanan, tb_pengajuan.jenis_uttp, tb_pengajuan.tempat_pengerjaan, tb_petugas.nama as nama_petugas, tb_petugas.no_telepon as hp_petugas');
        $this->db->from('tb_jadwal_pengujian');
        $this->db->join('tb_pengajuan', 'tb_pengajuan.id = tb_jadwal_pengujian.pengajuan_id');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_jadwal_pengujian.petugas_id', 'left');
        $this->db->where('tb_jadwal_pengujian.id', $id);
        return $this->db->get()->row();
    }

    public function get_by_pengajuan($pengajuan_id)
    {
        $this->db->select('tb_jadwal_pengujian.*, tb_petugas.nama as nama_petugas, tb_petugas.no_telepon as hp_petugas');
        $this->db->from('tb_jadwal_pengujian');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_jadwal_pengujian.petugas_id', 'left');
        $this->db->where('tb_jadwal_pengujian.pengajuan_id', $pengajuan_id);
        $this->db->order_by('tb_jadwal_pengujian.tanggal_pengujian', 'ASC');
        return $this->db->get()->row();
    }

    public function get_all($status = null)
    {
        $this->db->select('tb_jadwal_pengujian.*, tb_pengajuan.no_registrasi, tb_pengajuan.nama_pemohon, tb_pengajuan.jenis_layanan, tb_pengajuan.jenis_uttp, tb_petugas.nama as nama_petugas');
        $this->db->from('tb_jadwal_pengujian');
        $this->db->join('tb_pengajuan', 'tb_pengajuan.id = tb_jadwal_pengujian.pengajuan_id');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_jadwal_pengujian.petugas_id', 'left');
        if ($status) {
            $this->db->where('tb_jadwal_pengujian.status', $status);
        }
        $this->db->order_by('tb_jadwal_pengujian.tanggal_pengujian', 'DESC');
        return $this->db->get()->result();
    }

    public function get_upcoming($limit = 5)
    {
        $this->db->select('tb_jadwal_pengujian.*, tb_pengajuan.no_registrasi, tb_pengajuan.nama_pemohon, tb_petugas.nama as nama_petugas');
        $this->db->from('tb_jadwal_pengujian');
        $this->db->join('tb_pengajuan', 'tb_pengajuan.id = tb_jadwal_pengujian.pengajuan_id');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_jadwal_pengujian.petugas_id', 'left');
        $this->db->where('tb_jadwal_pengujian.tanggal_pengujian >=', date('Y-m-d'));
        $this->db->where('tb_jadwal_pengujian.status', 'dijadwalkan');
        $this->db->order_by('tb_jadwal_pengujian.tanggal_pengujian', 'ASC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function count_today()
    {
        $this->db->where('tanggal_pengujian', date('Y-m-d'));
        $this->db->where('status !=', 'dibatalkan');
        return $this->db->count_all_results('tb_jadwal_pengujian');
    }

    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('tb_jadwal_pengujian');
    }

    /**
     * Get pengajuan yang bisa dijadwalkan (status diproses, belum punya jadwal aktif)
     */
    public function get_pengajuan_available()
    {
        $this->db->select('tb_pengajuan.id, tb_pengajuan.no_registrasi, tb_pengajuan.nama_pemohon, tb_pengajuan.jenis_layanan, tb_pengajuan.jenis_uttp, tb_pengajuan.petugas_id');
        $this->db->from('tb_pengajuan');
        $this->db->where('tb_pengajuan.status', 'diproses');
        $this->db->where('tb_pengajuan.id NOT IN (SELECT pengajuan_id FROM tb_jadwal_pengujian WHERE status IN ("dijadwalkan","berlangsung"))', NULL, FALSE);
        $this->db->order_by('tb_pengajuan.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_jadwal_pengujian', ['status' => $status]);
    }
}
