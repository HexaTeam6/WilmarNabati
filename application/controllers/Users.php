<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            $data['data'] = $this->User_model->tampil_data()->result();
            $this->load->view('menu/user/user_list', $data);
        }else{
            redirect(site_url().'/Auth/login');
        }
    }

    public function insert()
    {
        $kode_akses     = $this->input->post('kode_akses');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');

        if ($kode_akses == 1) $nama = 'PLAN';
        else if ($kode_akses == 2) $nama = 'WH';
        else if ($kode_akses == 3) $nama = 'QC';
        else if ($kode_akses == 4) $nama = 'PPIC';

        $query = $this->User_model->selectUserInfo($username);
        if (count($query->result()) > 0)  redirect(site_url().'/Users');

        $dataLogin = array(
            'username'      => $username,
            'nama'          => $nama,
            'password'      => md5($password),
            'kode_akses'    => $kode_akses,
//            'salt'          => $password
        );

        $this->User_model->input_data('login', $dataLogin);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Users');
    }

    public function update()
    {
        $id_login       = $this->input->post('id_login');
        $username       = $this->input->post('username');
        $kode_akses     = $this->input->post('kode_akses');

        if ($kode_akses == 1) $nama = 'PLAN';
        else if ($kode_akses == 2) $nama = 'WH';
        else if ($kode_akses == 3) $nama = 'QC';
        else if ($kode_akses == 4) $nama = 'PPIC';

        $dataLogin = array(
            'username'      => $username,
            'nama'          => $nama,
            'kode_akses'    => $kode_akses,
        );

        $this->User_model->update_data('id', 'login', $id_login, $dataLogin);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Users');
    }

    public function delete($username)
    {
        $this->User_model->delete_data('login', $username);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('Users');
    }
}