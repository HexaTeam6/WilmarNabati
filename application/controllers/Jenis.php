<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            $data['data'] = $this->Jenis_model->tampil_data()->result();
            $this->load->view('menu/jenis/jenis_list', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }

    public function insert()
    {
        $nama_jenis    = $this->input->post('nama_jenis');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'nama_jenis'   => $nama_jenis,
            'keterangan'    => $keterangan
        );

        $this->Jenis_model->input_data('jenis', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Jenis');
    }

    public function update()
    {
        $id_jenis      = $this->input->post('id_jenis');
        $nama_jenis    = $this->input->post('nama_jenis');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'nama_jenis'   => $nama_jenis,
            'keterangan'    => $keterangan
        );

        $this->Jenis_model->update_data('id_jenis', 'jenis', $id_jenis, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Jenis');
    }

    public function delete($id_jenis)
    {
        $this->Jenis_model->delete_data('jenis', $id_jenis);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('Jenis');
    }
}