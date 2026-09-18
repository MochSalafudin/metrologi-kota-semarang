<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($status = null)
    {
        if ($status) {
            $this->db->where('status', $status);
        }
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('tb_petugas')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_petugas', ['id' => $id])->row();
    }

    public function create($data)
    {
        return $this->db->insert('tb_petugas', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_petugas', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_petugas');
    }

    public function count_aktif()
    {
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('tb_petugas');
    }
}
