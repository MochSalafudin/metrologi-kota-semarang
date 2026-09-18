<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($data)
    {
        return $this->db->insert('tb_notifikasi', $data);
    }

    public function get_unread($limit = 10)
    {
        $this->db->where('dibaca', 0);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('tb_notifikasi')->result();
    }

    public function get_all($limit = 50)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('tb_notifikasi')->result();
    }

    public function mark_as_read($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_notifikasi', ['dibaca' => 1]);
    }

    public function mark_all_read()
    {
        return $this->db->update('tb_notifikasi', ['dibaca' => 1]);
    }

    public function count_unread()
    {
        $this->db->where('dibaca', 0);
        return $this->db->count_all_results('tb_notifikasi');
    }

    public function create_pengajuan_notification($pengajuan)
    {
        $data = [
            'pengajuan_id' => $pengajuan['id'],
            'judul' => 'Pengajuan Baru',
            'pesan' => 'Pengajuan baru dari ' . $pengajuan['nama_pemohon'] . ' - ' . $pengajuan['jenis_layanan'],
            'tipe' => 'pengajuan_baru'
        ];
        return $this->create($data);
    }
}
