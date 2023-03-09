<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syarat_Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('is_login') == FALSE)) {
            redirect(base_url('siteman/'));
        }
        $this->load->model('m_syarat_surat');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Dokumen Persyaratan',
            'syarat_surat' => $this->m_syarat_surat->getAll()
        ];
        $this->load->view('admin/syarat-surat/index.php', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Dokumen Persyaratan',
        ];

        $syarat = $this->m_syarat_surat;
        $validation = $this->form_validation;
        $validation->set_rules($syarat->rules());

        if ($validation->run()) {
            $syarat->save();
            $this->session->set_flashdata('success', 'Dokumen Berhasil Disimpan');
            redirect('syarat_surat');
        }

        $this->load->view('admin/syarat-surat/tambah-syarat-surat.php', $data);
    }

    public function edit($id_syarat_surat)
    {
        $syarat_surat = $this->m_syarat_surat;
        $validation = $this->form_validation;
        $validation->set_rules($syarat_surat->rules());

        if ($validation->run()) {
            $syarat_surat->update();
            $this->session->set_flashdata('success', 'Dokumen Berhasil Disimpan');
            redirect('syarat_surat');
        }

        $data = [
            'title' => 'Edit Dokumen Persyaratan Surat',
            'syarat_surat' => $syarat_surat->getById($id_syarat_surat),
        ];

        $this->load->view('admin/syarat-surat/edit-syarat-surat', $data);
    }

    public function hapus($id_syarat_surat)
    {
        if (!isset($id_syarat_surat)) redirect('syarat_surat');

        if ($this->m_syarat_surat->delete($id_syarat_surat)) {
            $this->session->set_flashdata('success', 'Dokumen Berhasil Di hapus');
            redirect(site_url('syarat_surat'));
        }
    }

    public function hapusAll()
    {
        $chk_id = $this->input->post('chk_id');
        $this->m_syarat_surat->deleteAll($chk_id);
        $this->session->set_flashdata('success', 'Dokumen Berhasil Di hapus');
        redirect(site_url('syarat_surat'));
    }
}
