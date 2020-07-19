<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        redirect(site_url().'/Auth/masuk');
    }

    public function masuk()
    {
//        echo iss

        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $this->load->view('pages/masuk');
        }
    }

    public function login()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
        }else{
            $username = $this->input->post("username");
            $password = $this->input->post("password");
        }

        $query = $this->User_model->getLogin($username, $password);

        if (count($query->result())>0){
            foreach ($query->result() as $row)
            {
                $this->session->set_userdata("id",$row->id);
                $this->session->set_userdata("username",$row->username);
                $this->session->set_userdata("nama",$row->nama);
                $this->session->set_userdata("kode_akses",$row->kode_akses);
                $this->session->set_userdata("update_at",$row->update_at);
//                $this->session->set_userdata("menu",$this->generateMenu());
//                $this->set_hak_akses();

                redirect(site_url().'/Home');
            }
        }else{
            $this->session->set_flashdata('msg', 'error');
            redirect(site_url().'/Auth/masuk');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'/Auth/masuk');
    }

    public function checkUserInfo($username){
        $query = $this->User_model->selectUserInfo($username);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }
}
