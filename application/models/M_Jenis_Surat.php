<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Jenis_Surat extends CI_Model
{
    private $_table = "jenis_surat";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
