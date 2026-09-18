<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengajuan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Generate unique registration number
     * Format: REG-YYYYMMDD-XXXX
     */
    public function generate_no_registrasi()
    {
        $date = date('Ymd');
        $prefix = 'REG-' . $date . '-';
        
        // Get last registration number for today
        $this->db->select('no_registrasi');
        $this->db->like('no_registrasi', $prefix, 'after');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $last = $this->db->get('tb_pengajuan')->row();
        
        if ($last) {
            $last_number = (int) substr($last->no_registrasi, -4);
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }
        
        return $prefix . str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function create_pengajuan($data)
    {
        return $this->db->insert('tb_pengajuan', $data);
    }

    public function get_pengajuan_by_user($user_id)
    {
        $this->db->select('tb_pengajuan.*, tb_petugas.nama as nama_petugas, tb_petugas.no_telepon as hp_petugas');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_pengajuan.petugas_id', 'left');
        $this->db->where('tb_pengajuan.user_id', $user_id);
        $this->db->order_by('tb_pengajuan.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_pengajuan()
    {
        $this->db->select('tb_pengajuan.*, tb_users.nama_lengkap');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_users', 'tb_users.id = tb_pengajuan.user_id');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_pengajuan_detail($id, $user_id = null)
    {
        $this->db->select('tb_pengajuan.*, tb_users.nama_lengkap, tb_users.email, tb_users.whatsapp');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_users', 'tb_users.id = tb_pengajuan.user_id');
        $this->db->where('tb_pengajuan.id', $id);
        
        if ($user_id !== null) {
            $this->db->where('tb_pengajuan.user_id', $user_id);
        }
        
        return $this->db->get()->row();
    }

    public function count_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('tb_pengajuan');
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_pengajuan', ['status' => $status]);
    }
    
    public function count_all()
    {
        return $this->db->count_all('tb_pengajuan');
    }

    public function get_recent($limit = 5)
    {
        $this->db->select('tb_pengajuan.*, tb_users.nama_lengkap');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_users', 'tb_users.id = tb_pengajuan.user_id');
        $this->db->order_by('tb_pengajuan.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_monthly_stats($year = null)
    {
        if (!$year) $year = date('Y');
        
        $this->db->select('MONTH(created_at) as bulan, COUNT(*) as total');
        $this->db->from('tb_pengajuan');
        $this->db->where('YEAR(created_at)', $year);
        $this->db->group_by('MONTH(created_at)');
        $this->db->order_by('bulan', 'ASC');
        $result = $this->db->get()->result();
        
        // Fill all months with 0 if no data
        $stats = array_fill(1, 12, 0);
        foreach ($result as $row) {
            $stats[(int)$row->bulan] = (int)$row->total;
        }
        return $stats;
    }

    public function get_status_stats()
    {
        return [
            'pending' => $this->count_status('pending'),
            'diproses' => $this->count_status('diproses'),
            'selesai' => $this->count_status('selesai'),
            'ditolak' => $this->count_status('ditolak'),
            'total' => $this->count_all()
        ];
    }

    public function update_pengajuan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_pengajuan', $data);
    }

    public function assign_petugas($id, $petugas_id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_pengajuan', [
            'petugas_id' => $petugas_id,
            'status' => 'diproses',
            'verified_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_by_status($status, $limit = null)
    {
        $this->db->select('tb_pengajuan.*, tb_users.nama_lengkap, tb_petugas.nama as nama_petugas');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_users', 'tb_users.id = tb_pengajuan.user_id');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_pengajuan.petugas_id', 'left');
        $this->db->where('tb_pengajuan.status', $status);
        $this->db->order_by('tb_pengajuan.created_at', 'DESC');
        if ($limit) $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_detail_full($id)
    {
        $this->db->select('tb_pengajuan.*, tb_users.nama_lengkap, tb_users.email, tb_users.whatsapp, tb_petugas.nama as nama_petugas, tb_petugas.nip as nip_petugas');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_users', 'tb_users.id = tb_pengajuan.user_id');
        $this->db->join('tb_petugas', 'tb_petugas.id = tb_pengajuan.petugas_id', 'left');
        $this->db->where('tb_pengajuan.id', $id);
        return $this->db->get()->row();
    }

    public function get_this_month_count()
    {
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        return $this->db->count_all_results('tb_pengajuan');
    }
}
