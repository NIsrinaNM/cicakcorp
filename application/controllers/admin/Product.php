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
		$data['title'] = 'Tambah Produk';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/addProduct');
    	$this->load->view('admin/layout/slider');
	}
	function tambahkan(){
		$this->Product_model->insertData('jualan');
	}
	
}