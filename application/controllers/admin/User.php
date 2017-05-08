<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function index(){
		$data['title'] = 'User terdaftar';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/user_v');
    	$this->load->view('admin/layout/slider');
	}
}