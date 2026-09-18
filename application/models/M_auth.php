<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register($data)
    {
        return $this->db->insert('tb_users', $data);
    }

    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_users')->row();
    }

    public function login($username, $password)
    {
        $user = $this->get_user_by_username($username);

        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
}
