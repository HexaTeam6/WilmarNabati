<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Jenis_model');
        $this->load->model('Satuan_model');
        $this->load->model('Produk_model');
        $this->load->model('Grafik_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            if (isset($_POST['id_produk']) && isset($_POST['tgl_dari']) && isset($_POST['tgl_sampai'])){
                $tgl_dari   = $this->input->post("tgl_dari");
                $tgl_sampai = $this->input->post("tgl_sampai");
                $id_produk  = $this->input->post("id_produk");

                $data['data'] = $this->Grafik_model->search($tgl_dari, $tgl_sampai, $id_produk)->result();
            }
            $data['produk'] = $this->Produk_model->tampil_data()->result();
            $this->load->view('menu/grafik/grafik_list', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }
}