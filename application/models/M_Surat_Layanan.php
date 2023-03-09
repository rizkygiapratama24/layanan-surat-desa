<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat_Layanan extends CI_Model
{
    private $_table = "surat_layanan";

    public function rules()
    {
        return [
            [
                'field' => 'id_syarat_surat',
                'label' => 'Syarat Surat',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Kolom Ini Wajib Dipilih'
                ),
            ]
        ];
    }

    public function getByAll($id_surat)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('syarat_surat', 'syarat_surat.id_syarat_surat = surat_layanan.id_syarat_surat');
        $this->db->join('surat', 'surat.id_surat = surat_layanan.id_surat');
        $this->db->where('surat_layanan.id_surat', $id_surat);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_surat_layanan)
    {
        $query = $this->db->get_where('surat_layanan', array('id_surat_layanan' => $id_surat_layanan));

        return $query->row();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($data, $id_surat_layanan)
    {
        // return $this->db->update($this->_table, $data, array('id_surat' => $id_surat));
        return $this->db->update($this->_table, $data, array('id_surat_layanan' => $id_surat_layanan));
    }

    public function delete($id_surat_layanan)
    {
        return $this->db->delete($this->_table, array('id_surat_layanan' => $id_surat_layanan));
    }

    public function deleteAll($chk_id)
    {
        $this->db->where_in('id_surat_layanan', $chk_id);
        return $this->db->delete($this->_table);
    }
}
