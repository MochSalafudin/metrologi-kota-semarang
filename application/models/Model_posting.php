<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_posting extends CI_Model
{
    public function total_video()
    {
        return $this->db->get_where('tb_media',['kategori' => 'Video'])->num_rows();
    }
    public function total_gambar()
    {
        return $this->db->get_where('tb_media',['kategori' => 'Gambar'])->num_rows();
    }
    public function total()
    {
        return $this->db->get('tb_media')->num_rows();
    }
    public function total_posting()
    {
        return $this->db->get('tb_artikel')->num_rows();
    }
    public function data_media()
    {
        $this->db->order_by('date_update','DESC');
        return $this->db->get('tb_media')->result_array();
    } 
    public function data_kategori()
    {
        return $this->db->get('tb_kategori_tera')->result_array();
    }
    public function data_kategori_header($id)
    {
        return $this->db->get_where('tb_kategori_tera',['header' => $id])->result_array();
    }
    public function kadar_air($id)
    {
        return $this->db->get_where('tb_jenis_tera',['kategori_id' => $id])->result_array();
    }
    public function jenis()
    {
        $query = "SELECT * FROM `tb_kategori_tera` JOIN `tb_jenis_tera` ON tb_kategori_tera.id_kategori = tb_jenis_tera.kategori_id";
        return $this->db->query($query)->result_array();    
    }
    public function data_jenis($id)
    {
        if(!empty($id))
        {
            $query = "SELECT * FROM `tb_kategori_tera` JOIN `tb_jenis_tera` ON tb_kategori_tera.id_kategori = tb_jenis_tera.kategori_id WHERE tb_kategori_tera.id_kategori = $id";
            return $this->db->query($query)->result_array();
        }else{
            $query = "SELECT * FROM `tb_kategori_tera` JOIN `tb_jenis_tera` ON tb_kategori_tera.id_kategori = tb_jenis_tera.kategori_id WHERE tb_kategori_tera.id_kategori = '1'";
            return $this->db->query($query)->result_array();
        }
    }
    public function get_media($kategori)
    {
        if(!empty($kategori))
        {
            $this->db->order_by('date_update','DESC');
            return $this->db->get_where('tb_media',['kategori' => $kategori])->result_array();
        }else{
            $this->db->order_by('id_media','DESC');
            return $this->db->get('tb_media')->result_array();
        }
    }
    public function get_artikel()
    {
        $query = "SELECT * FROM `tb_media` JOIN `tb_artikel` ON tb_artikel.id_gambar = tb_media.id_media ORDER BY tgl_upload DESC";
        return $this->db->query($query)->result_array();
    }
    public function get_profil()
    {
        $query = "SELECT * FROM `tb_profil`";
        return $this->db->query($query)->result_array();
    }
    public function get_artikel_id($id)
    {
        $query = "SELECT * FROM `tb_media` JOIN `tb_artikel` ON tb_artikel.id_gambar = tb_media.id_media WHERE tb_artikel.id_artikel = $id ORDER BY tgl_upload DESC";
        return $this->db->query($query)->result_array();
        
    }
    public function get_artikel_limit()
    {
        $query = "SELECT * FROM `tb_media` JOIN `tb_artikel` ON tb_artikel.id_gambar = tb_media.id_media ORDER BY tgl_upload DESC LIMIT 10";
        // $this->db->select('*');
        // $this->db->from('tb_media');
        // $this->db->join('tb_artikel', 'tb_artikel.id_gambar = tb_media.id_media');
        // $this->db->join('tb_artikel', 'tb_artikel.id_video = tb_media.id_media');
        // $this->db->order_by('tgl_upload','DESC');
        return $this->db->query($query)->result_array();
    }
    public function get_artikel_video()
    {
        $query = "SELECT * FROM `tb_media` JOIN `tb_artikel` ON tb_artikel.id_video = tb_media.id_media ORDER BY tgl_upload DESC";
        // $this->db->select('*');
        // $this->db->from('tb_media');
        // $this->db->join('tb_artikel', 'tb_artikel.id_gambar = tb_media.id_media');
        // $this->db->join('tb_artikel', 'tb_artikel.id_video = tb_media.id_media');
        // $this->db->order_by('tgl_upload','DESC');
        return $this->db->query($query)->result_array();
    }
    public function total_pegawai()
    {
        return $this->db->get('tb_artikel')->num_rows();
    }
    public function tambahartikel($data)
    {
        $this->db->insert('tb_artikel', $data);
        return $this->db->affected_rows();
    }
    public function tambahdata($data)
    {
        $this->db->insert('tb_media', $data);
        return $this->db->affected_rows();
    }
    public function updatedata($id, $data)
    {
        $this->db->update('tb_artikel', $data, ['id_artikel' => $id]);

        return $this->db->affected_rows();
    }
    public function ganti_header($data)
    {
        $this->db->update('tb_profil', ['header_img' => $data], ['id_profil' => '1']);

        return $this->db->affected_rows();
    }
    public function updatedataprofil($id, $data)
    {
        $this->db->update('tb_profil', $data, ['id_profil' => $id]);

        return $this->db->affected_rows();
    }
    public function hapusdata($id)
    {
        $this->db->delete('tb_artikel', ['id_artikel' => $id]);

        return $this->db->affected_rows();
    }
    public function hapusdatamedia($id)
    {
        $this->db->update('tb_artikel', ['id_gambar'=>0], ['id_gambar' => $id]);
        $this->db->delete('tb_media', ['id_media' => $id]);
    
        return $this->db->affected_rows();
    }
    public function hapusdatavideo($id)
    {
        $this->db->update('tb_artikel', ['id_video'=>0], ['id_video' => $id]);
        $this->db->delete('tb_media', ['id_media' => $id]);
        
        return $this->db->affected_rows();
    }
}
