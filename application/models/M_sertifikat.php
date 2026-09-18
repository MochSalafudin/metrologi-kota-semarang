<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sertifikat extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Generate unique certificate number
     * Format: SERT/MET/YYYY/MM/XXXX
     */
    public function generate_no_sertifikat()
    {
        $year = date('Y');
        $month = date('m');
        $prefix = "SERT/MET/{$year}/{$month}/";
        
        $this->db->select('no_sertifikat');
        $this->db->like('no_sertifikat', $prefix, 'after');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $last = $this->db->get('tb_sertifikat')->row();
        
        if ($last) {
            $last_number = (int) substr($last->no_sertifikat, -4);
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }
        
        return $prefix . str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function create($data)
    {
        return $this->db->insert('tb_sertifikat', $data);
    }

    public function get_by_pengajuan($pengajuan_id)
    {
        return $this->db->get_where('tb_sertifikat', ['pengajuan_id' => $pengajuan_id])->row();
    }

    public function get_all()
    {
        $this->db->select('tb_sertifikat.*, tb_pengajuan.no_registrasi, tb_pengajuan.nama_pemohon, tb_pengajuan.jenis_layanan');
        $this->db->from('tb_sertifikat');
        $this->db->join('tb_pengajuan', 'tb_pengajuan.id = tb_sertifikat.pengajuan_id');
        $this->db->order_by('tb_sertifikat.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function count_this_month()
    {
        $this->db->where('MONTH(tanggal_terbit)', date('m'));
        $this->db->where('YEAR(tanggal_terbit)', date('Y'));
        return $this->db->count_all_results('tb_sertifikat');
    }
}
