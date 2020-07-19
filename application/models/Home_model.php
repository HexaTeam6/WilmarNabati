<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function tampil_data()
    {
        $sql = "SELECT p.nama_produk, j.nama_jenis, s.nama_satuan, l.nama, pl.* 
                FROM plan pl
                LEFT JOIN produk p ON 
                  pl.id_produk = p.id_produk
                LEFT JOIN satuan s ON 
                  pl.id_satuan = s.id_satuan
                LEFT JOIN login l ON 
                  pl.id_login = l.id
                INNER JOIN jenis j ON 
                  p.id_jenis = j.id_jenis";
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
        $this->db->where('id_plan', $where);
        $this->db->delete($table);
    }

    function inactive_data($table,$where,$data){
        $this->db->where('id_plan',$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>