<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $get['title'] = "Admin Login";
        $get['favicon'] = "assets/images/logo.png";
        // $this->load->view('admin/template/header_link', $get);

        //restrict users to go back to login if session has been set
        if ($this->session->userdata('sms_admin')) {
            redirect(base_url('admin_Dashboard'));
        } else {
            $this->load->view('admin/login',$get);
        }
    }

    public function adminlogin()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == '' || $password == ''){
             $this->session->set_userdata('error', 'Enter login credentials');
            redirect(base_url('admin'));
        }else{
            $data = $this->Login_model->validate($username, $password);

        if ($data) {
            $this->session->set_userdata('sms_admin', $data);
            redirect(base_url('Admin_Dashboard'));
        } else {
            
            $this->session->set_userdata('error', 'Invalid login credentials');
            redirect(base_url('admin'));
        }
        }
        
    }

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('sms_admin');
        redirect(base_url('admin'));
    }
}
