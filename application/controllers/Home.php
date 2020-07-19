<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Jenis_model');
        $this->load->model('Satuan_model');
        $this->load->model('Produk_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            $data['data'] = $this->Home_model->tampil_data()->result();
            $data['produk'] = $this->Produk_model->tampil_data()->result();
            $data['satuan'] = $this->Satuan_model->tampil_data()->result();
            $this->load->view('home', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }

    public function insert()
    {
        $id_produk          = $this->input->post('id_produk');
        $id_satuan          = $this->input->post('id_satuan');
        $id_login           = $_SESSION['id'];
        $tanggal            = $this->input->post('tanggal');
        $stock              = $this->input->post('stock');
        $line               = $this->input->post('line');
        $target_produksi    = $this->input->post('target_produksi');
        $t_shift1           = $this->input->post('t_shift1');
        $t_shift2           = $this->input->post('t_shift2');
        $t_shift3           = $this->input->post('t_shift3');
        $total_produksi     = $t_shift1 + $t_shift2 + $t_shift3;
        $r_shift1           = $this->input->post('r_shift1');
        $r_shift2           = $this->input->post('r_shift2');
        $r_shift3           = $this->input->post('r_shift3');
        $total_reject       = $r_shift1 + $r_shift2 + $r_shift3;
        $received           = $this->input->post('received');
        $outgoing           = $this->input->post('outgoing');
        $end_stock          = (($stock + $total_produksi) - $total_reject) - $outgoing;

        $data = array(
            'id_produk'         => $id_produk,
            'id_satuan'         => $id_satuan,
            'id_login'          => $id_login,
            'tanggal'           => $tanggal,
            'stock'             => $stock,
            'line'              => $line,
            'target_produksi'   => $target_produksi,
            't_shift1'          => $t_shift1,
            't_shift2'          => $t_shift2,
            't_shift3'          => $t_shift3,
            'total_produksi'    => $total_produksi,
            'total_reject'      => $total_reject,
            'r_shift1'          => $r_shift1,
            'r_shift2'          => $r_shift2,
            'r_shift3'          => $r_shift3,
            'received'          => $received,
            'outgoing'          => $outgoing,
            'end_stock'         => $end_stock
        );

        $this->Home_model->input_data('plan', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Home');
    }

    public function update()
    {
        $id_plan            = $this->input->post('id_plan');
        $id_produk          = $this->input->post('id_produk');
        $id_satuan          = $this->input->post('id_satuan');
        $id_login           = $_SESSION['id'];
        $tanggal            = $this->input->post('tanggal');
        $stock              = $this->input->post('stock');
        $line               = $this->input->post('line');
        $target_produksi    = $this->input->post('target_produksi');
        $t_shift1           = $this->input->post('t_shift1');
        $t_shift2           = $this->input->post('t_shift2');
        $t_shift3           = $this->input->post('t_shift3');
        $total_produksi     = $t_shift1 + $t_shift2 + $t_shift3;
        $r_shift1           = $this->input->post('r_shift1');
        $r_shift2           = $this->input->post('r_shift2');
        $r_shift3           = $this->input->post('r_shift3');
        $total_reject       = $r_shift1 + $r_shift2 + $r_shift3;
        $received           = $this->input->post('received');
        $outgoing           = $this->input->post('outgoing');
        $end_stock          = (($stock + $total_produksi) - $total_reject) - $outgoing;

        $data = array(
            'id_produk'         => $id_produk,
            'id_satuan'         => $id_satuan,
            'id_login'          => $id_login,
            'tanggal'           => $tanggal,
            'stock'             => $stock,
            'line'              => $line,
            'target_produksi'   => $target_produksi,
            't_shift1'          => $t_shift1,
            't_shift2'          => $t_shift2,
            't_shift3'          => $t_shift3,
            'total_produksi'    => $total_produksi,
            'total_reject'      => $total_reject,
            'r_shift1'          => $r_shift1,
            'r_shift2'          => $r_shift2,
            'r_shift3'          => $r_shift3,
            'received'          => $received,
            'outgoing'          => $outgoing,
            'end_stock'         => $end_stock
        );

        $this->Home_model->update_data('id_plan', 'plan', $id_plan, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Home');
    }

    public function delete($id_plan)
    {
        $this->Home_model->delete_data('plan', $id_plan);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('Home');
    }
}