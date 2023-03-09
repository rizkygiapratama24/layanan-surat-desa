<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat extends CI_Model
{
    private $_table = "surat";
    public $id_surat;
    public $id_jenis_surat;
    public $nama_surat;
    public $file_surat;
    public $sedia_mandiri;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [

            [
                'field' => 'id_jenis_surat',
                'label' => 'Jenis Surat',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Kolom Ini Wajib Dipilih'
                ),
            ],

            [
                'field' => 'nama_surat',
                'label' => 'Nama Surat',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Kolom Ini Wajib Diisi'
                ),
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('jenis_surat', 'jenis_surat.id_jenis_surat = surat.id_jenis_surat');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_surat)
    {
        $query = $this->db->get_where('surat', array('id_surat' => $id_surat));

        return $query->row();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($data, $id_surat)
    {
        return $this->db->update($this->_table, $data, array('id_surat' => $id_surat));
    }

    public function update_status($data, $id_surat)
    {
        return $this->db->update($this->_table, $data, array('id_surat' => $id_surat));
    }

    public function delete($id_surat)
    {
        return $this->db->delete($this->_table, array('id_surat' => $id_surat));
    }

    public function deleteAll($chk_id)
    {
        $this->db->where_in('id_surat', $chk_id);
        return $this->db->delete($this->_table);
    }

    public function getDownload($id_surat)
    {
        $queryna = $this->db->get_where('surat', array('id_surat' => $id_surat));

        return $queryna->row();
    }
}
