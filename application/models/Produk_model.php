<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    function tampil_data()
    {
        $sql = "SELECT p.*, j.nama_jenis
                FROM produk p, jenis j
                WHERE p.id_jenis = j.id_jenis";
        $result = $this->db->query($sql);
        return $result;
    }

    public function input_data($table, $data){
        return $this->db->insert($table, $data);
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }

    function delete_data($table, $where)
    {
        $this->db->where('id_produk', $where);
        $this->db->delete($table);
    }

    function inactive_data($table,$where,$data){
        $this->db->where('id_produk',$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>