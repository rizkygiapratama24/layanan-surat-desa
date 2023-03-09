<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siteman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('siteman/index.php');
    }

    public function proses()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->db->get_where('user', ['username' => $username]);

        if ($cek->num_rows() > 0) {
            $hasil = $cek->row();
            if (password_verify($password, $hasil->password)) {
                // membuat session
                $this->session->set_userdata('id_user', $hasil->id_user);
                $this->session->set_userdata('role', $hasil->role);
                $this->session->set_userdata('is_login', TRUE);
                redirect('dashboard/');
            } else {
                $this->session->set_flashdata('gagal', 'Password Salah !');
                redirect('siteman/');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Username Tidak Tersedia');
            redirect('siteman/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('siteman/'));
    }
}
