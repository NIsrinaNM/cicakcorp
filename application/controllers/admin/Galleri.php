<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleri extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Setting_model');
            $this->load->library('pagination');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function index(){
		$var['title'] = 'Galeri Cicak Corp';
		$data = array('galeri'=>$this->Setting_model->getAllData('galeri'));
		$this->load->view('admin/layout/header',$var);
    	$this->load->view('admin/tabelGaleri',$data);
    	$this->load->view('admin/layout/slider');
	}

	function add(){
		$this->form_validation->set_rules('caption','Caption','trim');

		$config = array(
				'upload_path'=> './assets/galeri/',
				'allowed_types'=>'gif|jpg|png|jpeg',
				'max_size'=>2048,
				'overwrite'=>true,
				'file_name'=>'GALERI_'.rand(0,10000000));
		$this->upload->initialize($config);
		
		if ($this->form_validation->run()) {
			$do = $this->upload->do_upload('file');
			$tabel = 'setting';
			$data = array(
					'caption'=>$this->input->post('caption'),
					'jenis'=>'galeri',
					'gambar'=>'assets/galeri/'.$this->upload->data('file_name'));
			if ($do == true) {
				$this->Setting_model->tambah($tabel,$data);
				$this->session->set_flashdata('success','Penambahan berhasil.');
			}else{
				$this->session->set_flashdata('error','Penambahan gagal.');
			}
		}else{
			$this->session->set_flashdata('error',''.validation_errors().'');
		}
		
		redirect('admin/Galleri');
	}

	function delete($id){
		if ($this->Setting_model->delete($id)) {
			$this->session->set_flashdata('success','Hapus berhasil.');
		}else{
			$this->session->set_flashdata('error','Hapus gagal.');
		}
	redirect('admin/Dashboard/setting');
	}
}