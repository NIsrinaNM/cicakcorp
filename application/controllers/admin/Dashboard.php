<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Auth_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
        }

    public function index(){
    	$this->load->view('admin/layout/header');
    	$this->load->view('admin/dashboard');
    	$this->load->view('admin/layout/slider');
    }

    public function profile() {
        $data = array(
            'username'=>$this->session->userdata('loggedin')['user'],
            'nama'=>$this->session->userdata('loggedin')['nama'],
            'date'=>$this->session->userdata('loggedin')['time']);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/profile',$data);
        $this->load->view('admin/layout/slider');
    }

}