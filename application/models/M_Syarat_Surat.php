<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Syarat_Surat extends CI_Model
{
    private $_table = "syarat_surat";
    public $id_syarat_surat;
    public $nama_syarat_surat;

    public function rules()
    {
        return [
            [
                'field' => 'nama_syarat_surat',
                'label' => 'Nama Persyaratan',
                'rules' => 'required|min_length[3]',
                'errors' => array(
                    'required' => 'Kolom Ini Wajib Diisi',
                ),
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_syarat_surat)
    {
        return $this->db->get_where($this->_table, ['id_syarat_surat' => $id_syarat_surat])->row();
    }

    public function save()
    {
        $syarat = $this->input->post();
        $this->nama_syarat_surat = $syarat['nama_syarat_surat'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $syarat = $this->input->post();
        $this->id_syarat_surat = $syarat['id_syarat_surat'];
        $this->nama_syarat_surat = $syarat['nama_syarat_surat'];
        return $this->db->update($this->_table, $this, array('id_syarat_surat' => $syarat['id_syarat_surat']));
    }

    public function delete($id_syarat_surat)
    {
        return $this->db->delete($this->_table, array('id_syarat_surat' => $id_syarat_surat));
    }

    public function deleteAll($chk_id)
    {
        $this->db->where_in('id_syarat_surat', $chk_id);
        return $this->db->delete($this->_table);
    }
}
