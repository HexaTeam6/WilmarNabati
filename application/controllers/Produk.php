<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Jenis_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            $data['data'] = $this->Produk_model->tampil_data()->result();
            $data['jenis'] = $this->Jenis_model->tampil_data()->result();
            $this->load->view('menu/produk/produk_list', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }

    public function insert()
    {
        $id_jenis       = $this->input->post('id_jenis');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'id_jenis'      => $id_jenis,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan
        );

        $this->Produk_model->input_data('produk', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Produk');
    }

    public function update()
    {
        $id_produk      = $this->input->post('id_produk');
        $id_jenis       = $this->input->post('id_jenis');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'id_jenis'      => $id_jenis,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan
        );

        $this->Produk_model->update_data('id_produk', 'produk', $id_produk, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Produk');
    }

    public function delete($id_produk)
    {
        $this->Produk_model->delete_data('produk', $id_produk);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('Produk');
    }
}