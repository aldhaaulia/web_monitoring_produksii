<?php

/**
 *
 * Created at 2022-06-02 19:17:55
 * Updated at
 *
 */

class M_Barang extends CI_Model
{
    private $_table = "tm_barang";

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function searchbarang($str)
    {
        $this->db->select('*');
        $this->db->like('nama', $str);
        $query = $this->db->get('tm_barang');
        return $query->result_array();
    }

    function save($dataPost)
    {
        return $this->db->insert($this->_table, $dataPost);
    }
    // end of class
}
