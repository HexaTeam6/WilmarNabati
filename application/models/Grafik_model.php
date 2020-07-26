<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    function search($tgl_dari, $tgl_sampai, $id_produksi)
    {
        $sql = "SELECT tanggal, SUM(total_produksi) AS size, SUM(total_reject) AS error,
                ROUND(SUM(total_reject) / SUM(total_produksi),4) AS average, d.CL,
                ROUND(d.CL + (3*SQRT(d.CL/SUM(total_produksi))),4) AS UCL,
                ROUND(d.CL - (3*SQRT(d.CL/SUM(total_produksi))),4) AS LCL
                FROM plan p, 
                    (SELECT ROUND(SUM(total_reject / total_produksi)/COUNT(id_plan),4) AS CL FROM plan WHERE id_produk = ? AND tanggal BETWEEN ? AND ?) d
                WHERE id_produk = ?
                AND tanggal BETWEEN ? AND ?
                GROUP by tanggal";
        $result = $this->db->query($sql, array($id_produksi, $tgl_dari, $tgl_sampai, $id_produksi, $tgl_dari, $tgl_sampai));
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