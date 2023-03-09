<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('is_login') == FALSE)) {
            redirect(base_url('siteman/'));
        }
        $this->load->model('m_surat');
        $this->load->model('m_syarat_surat');
        $this->load->model('m_jenis_surat');
        $this->load->model('m_surat_layanan');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Surat',
            'data_surat' => $this->m_surat->getAll()
        ];
        $this->load->view('admin/surat/index.php', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Surat',
            'syarat_surat' => $this->m_syarat_surat->getAll(),
            'jenis_surat' => $this->m_jenis_surat->getAll()
        ];

        $surat = $this->m_surat;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $config['upload_path'] = './uploads/'; // set upload destination
            $config['allowed_types'] = 'pdf|docx'; // set upload format 
            $config['max_size'] = 0; // set upload no limit size

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {
                $uploaded_data = $this->upload->data();
                $data = array(
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'file_surat' => $uploaded_data['file_name'],
                    'nama_surat' => $this->input->post('nama_surat'),
                    'sedia_mandiri' => $this->input->post('sedia_mandiri'),
                    'status_surat' => 'Nonaktif'
                );
                $surat->save($data);
                $this->session->set_flashdata('success', 'Surat Berhasil Disimpan');
                return redirect('surat');
            } else {
                $data = array(
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'nama_surat' => $this->input->post('nama_surat'),
                    'sedia_mandiri' => $this->input->post('sedia_mandiri'),
                    'status_surat' => 'Nonaktif'
                );
                $surat->save($data);
                $this->session->set_flashdata('success', 'Surat Berhasil Disimpan');
                return redirect('surat');
            }
        }
        $this->load->view('admin/surat/tambah-surat', $data);
    }

    public function edit($id_surat)
    {
        if (!isset($id_surat)) redirect('surat');

        $surat = $this->m_surat;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $config['upload_path'] = './uploads/'; // set upload destination
            $config['allowed_types'] = 'pdf|docx'; // set upload format 
            $config['max_size'] = 0; // set upload no limit size

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_surat')) {
                $uploaded_data = $this->upload->data();
                $data = array(
                    'id_surat' => $id_surat,
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'file_surat' => $uploaded_data['file_name'],
                    'nama_surat' => $this->input->post('nama_surat'),
                    'sedia_mandiri' => $this->input->post('sedia_mandiri'),
                );
                $surat->update($data, $id_surat);
                $this->session->set_flashdata('success', 'Surat Berhasil Disimpan');
                return redirect('surat');
            } else {
                $data = array(
                    'id_surat' => $id_surat,
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'nama_surat' => $this->input->post('nama_surat'),
                    'sedia_mandiri' => $this->input->post('sedia_mandiri'),
                    'file_surat' => $this->input->post('file_surat_old')
                );
                $surat->update($data, $id_surat);
                $this->session->set_flashdata('success', 'Surat Berhasil Disimpan');
                return redirect('surat');
            }
        }

        $data = [
            'title' => 'Edit Surat',
            'syarat_surat' => $this->m_syarat_surat->getAll(),
            'jenis_surat' => $this->m_jenis_surat->getAll(),
            'surat' => $surat->getById($id_surat)
        ];

        if (!$data['surat']) show_404();

        $this->load->view('admin/surat/edit-surat', $data);
    }

    public function status_surat($id_surat, $status)
    {
        $surat = $this->m_surat;
        if ($status == 'Aktif') {
            $data['status_surat'] = 'Nonaktif';
            $surat->update_status($data, $id_surat);
            $this->session->set_flashdata('success', 'Surat Berhasil Di Nonaktifkan');
            redirect('surat');
        } else {
            $data = array(
                'status_surat' => 'Aktif'
            );
            $surat->update_status($data, $id_surat);
            $this->session->set_flashdata('success', 'Surat Berhasil Di Aktifkan');
            redirect('surat');
        }
    }

    public function hapus($id_surat)
    {
        if (!isset($id_surat)) redirect('surat');

        if ($this->m_surat->delete($id_surat)) {
            $this->session->set_flashdata('success', 'Surat Berhasil Dihapus');
            redirect(site_url('surat'));
        }
    }

    public function hapusAll()
    {
        $chk_id = $this->input->post('chk_id');
        $this->m_surat->deleteAll($chk_id);
        $this->session->set_flashdata('success', 'Surat Berhasil Dihapus');
        redirect(site_url('surat'));
    }

    public function syarat($id_surat)
    {
        $surat_layanan = $this->m_surat_layanan;
        $validation = $this->form_validation;
        $validation->set_rules($surat_layanan->rules());

        if ($validation->run()) {
            if ($this->input->post('id_surat_layanan') != "") {
                $id_surat_layanan = $this->input->post('id_surat_layanan');
                $data = array(
                    'id_surat_layanan' => $id_surat_layanan,
                    'id_syarat_surat' => $this->input->post('id_syarat_surat'),
                    'id_surat' => $id_surat
                );
                $surat_layanan->update($data, $id_surat_layanan);
                $this->session->set_flashdata('success', 'Syarat Surat Berhasil Disimpan');
                return redirect('surat/syarat/' . $id_surat);
            } else {
                $data = array(
                    'id_syarat_surat' => $this->input->post('id_syarat_surat'),
                    'id_surat' => $id_surat
                );
                $surat_layanan->save($data);
                $this->session->set_flashdata('success', 'Syarat Surat Berhasil Disimpan');
                return redirect('surat/syarat/' . $id_surat);
            }
        }

        $data = [
            'title' => 'Dokumen Persyaratan',
            'surat' => $this->m_surat->getById($id_surat),
            'surat_layanan' => $this->m_surat_layanan->getByAll($id_surat),
            'syarat_surat' => $this->m_syarat_surat->getAll()
        ];

        $this->load->view('admin/surat/syarat.php', $data);
    }

    public function update_syarat($id_surat_layanan, $id_surat)
    {
        $id_surat_layanan = $this->m_surat_layanan->getById($id_surat_layanan);
        $data = array(
            'id_surat_layanan' => $id_surat_layanan,
            'id_syarat_surat' => $this->input->post('id_syarat_surat'),
            'id_surat' => $id_surat
        );
        $this->m_surat_layanan->update($data, $id_surat_layanan);
        redirect('surat/syarat/' . $id_surat);
    }

    public function hapus_syarat($id_surat_layanan, $id_surat)
    {
        if (!isset($id_surat_layanan)) redirect('surat/syarat/' . $id_surat);

        if ($this->m_surat_layanan->delete($id_surat_layanan)) {
            $this->session->set_flashdata('success', 'Syarat Surat Berhasil Dihapus');
            redirect(site_url('surat/syarat/' . $id_surat));
        }
    }

    public function hapus_syarat_suratAll($id_surat)
    {
        $chk_id = $this->input->post('chk_id');
        $this->m_surat_layanan->deleteAll($chk_id);
        $this->session->set_flashdata('success', 'Surat Berhasil Dihapus');
        return redirect(site_url('surat/syarat/' . $id_surat));
    }
}
