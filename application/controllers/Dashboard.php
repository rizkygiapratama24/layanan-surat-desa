<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('is_login') == FALSE)) {
            redirect(base_url('siteman/'));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'userna' => $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row(),
        ];
        $this->load->view('admin/dashboard/index.php', $data);
    }
}
