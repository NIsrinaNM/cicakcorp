<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Setting_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function add(){
		
		$this->load->view('admin/layout/header');
    	$this->load->view('admin/addProduct');
    	$this->load->view('admin/layout/slider');
	}
	
}