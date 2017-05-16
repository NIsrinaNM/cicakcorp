<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function index(){
		$data['title'] = 'Daftar pemesanan';
		$detil = array(
			'orderjasa' => $this->Product_model->getOrderJasa()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesanan',$detil);
    	$this->load->view('admin/layout/slider');
	}
	function edit(){
		$data['title'] = 'Edit Status';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/editPemesanan');
    	$this->load->view('admin/layout/slider');
	}
}