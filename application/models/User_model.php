<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function getLogin($username, $password)
    {
        $sql = "SELECT *
                FROM login
                WHERE username=? 
                AND password=MD5(?)";
        $result = $this->db->query($sql, array($username, $password));
        return $result;
    }

    function selectUserInfo($username){
        return $this->db->query("SELECT *
                                 FROM login
                                 WHERE username = ?", array($username));
    }

    function tampil_data()
    {
        $sql = "SELECT *
                FROM login
                WHERE kode_akses <> '0'";
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
        $this->db->where('username', $where);
        $this->db->delete($table);
    }

    function inactive_data($table,$where,$data){
        $this->db->where('username',$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>