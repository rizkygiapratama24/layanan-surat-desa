<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_surat');
        $this->load->model('m_syarat_surat');
        $this->load->model('m_jenis_surat');
        $this->load->model('m_surat_layanan');
    }

    public function index()
    {
        $data = [
            'title' => 'Layanan Surat Desa',
            'subtitle' => 'Silahkan Download Surat Sesuai Yang Dibutuhkan Oleh Anda',
            'daftar_surat' => $this->m_surat->getAll()
        ];
        $this->load->view('site/index.php', $data);
    }

    public function persyaratan($id_surat)
    {
        $data = [
            'title' => 'Persyaratan',
            'syarat_surat' => $this->m_surat->getById($id_surat),
            'surat_layanan' => $this->m_surat_layanan->getByAll($id_surat)
        ];
        $this->load->view('site/persyaratan.php', $data);
    }

    public function download($id_surat)
    {
        $this->load->helper('download');
        $fileInfo = $this->m_surat->getDownload($id_surat);
        // file path
        $file = 'uploads/' . $fileInfo->file_surat;

        force_download($file, NULL);
    }
}
