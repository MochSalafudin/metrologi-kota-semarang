<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('user_id')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->M_auth->login($username, $password);

            if ($user) {
                $session_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'nama_lengkap' => $user->nama_lengkap,
                    'role' => $user->role
                ];
                $this->session->set_userdata($session_data);

                if ($user->role == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('user/dashboard');
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('whatsapp', 'Nomor WhatsApp', 'required|trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'whatsapp' => $this->input->post('whatsapp'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user'
            ];

            if ($this->M_auth->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal! Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
