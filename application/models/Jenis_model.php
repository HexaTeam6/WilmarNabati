<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model
{

    function tampil_data()
    {
        $sql = "SELECT *
                FROM jenis";
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
        $this->db->where('id_jenis', $where);
        $this->db->delete($table);
    }

    function inactive_data($table,$where,$data){
        $this->db->where('id_jenis',$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>