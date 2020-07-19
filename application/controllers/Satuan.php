<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            $data['data'] = $this->Satuan_model->tampil_data()->result();
            $this->load->view('menu/satuan/satuan_list', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }

    public function insert()
    {
        $nama_satuan    = $this->input->post('nama_satuan');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'nama_satuan'   => $nama_satuan,
            'keterangan'    => $keterangan
        );

        $this->Satuan_model->input_data('satuan', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Satuan');
    }

    public function update()
    {
        $id_satuan      = $this->input->post('id_satuan');
        $nama_satuan    = $this->input->post('nama_satuan');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'nama_satuan'   => $nama_satuan,
            'keterangan'    => $keterangan
        );

        $this->Satuan_model->update_data('id_satuan', 'satuan', $id_satuan, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Satuan');
    }

    public function delete($id_satuan)
    {
        $this->Satuan_model->delete_data('satuan', $id_satuan);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('Satuan');
    }
}