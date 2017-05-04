<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function add(){
		$data['title'] = 'Tambah Produk';
		$dataModel['kategori'] = $this->Product_model->getData('kategori');
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/addProduct',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function tambahkan(){
		$this->Product_model->insertData('jualan');
	}
	
	function category(){
		$data['title'] = 'Kategori barang';
		$dataModel['kate'] = $this->Product_model->getData('kategori');
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/kategori',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function addKategori(){
		$this->form_validation->set_rules('nama','Nama Kategori','required|is_unique[kategori.nama]');
		$data['nama'] = strtoupper($this->input->post('nama'));
		
			if ($this->form_validation->run()==false) {
				// $this->session->set_flashdata('error','Gagal menambahkan kategori baru');
				$out['error'] = validation_errors();
			}else{
			$do = $this->Product_model->insertData('kategori',$data);
			if ($do) {
				// $this->session->set_flashdata('success','Berhasil menambahkan kategori baru');
				$out['success'] = 'Berhasil menambahkan kategori baru';
			}else{
				// $this->session->set_flashdata('error','Gagal menambahkan kategori baru');
				$out['error'] = 'Gagal menambahkan kategori baru';
			}
		}
		// redirect('admin/Product/category');
		echo json_encode($out);
	}
	function hapus($tabel,$id){
		$this->Product_model->delete($tabel,$id);
		redirect('admin/Product/category');
	}
}