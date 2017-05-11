<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Setting_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	public function addSlider(){
		// $this->form_validation->set_rules('file','Gambar','required');
		$this->form_validation->set_rules('caption','Caption','trim');

		$gbr = $this->upload();
		$tabel = 'setting';
		$data = array(
				'caption'=>$this->input->post('caption'),
				'jenis'=>'slider',
				'gambar'=>$gbr);
		
		if ($gbr == true) {
			if ($this->form_validation->run()) {
				$this->Setting_model->tambah($tabel,$data);
				$this->session->set_flashdata('success','Penambahan berhasil.');
			}else{
			$this->session->set_flashdata('error',''.validation_errors().'');
			}
		}else{
			$this->session->set_flashdata('error','Penambahan gagal.');
		}
		
		redirect('admin/Dashboard/setting');
	}

	function upload(){  
		if (empty($_FILES['file']['tmp_name'])) {
		     	return false;
		     } 
		     else{    
		    $file_name = $_FILES['file']['name'];
		    $name = 'slider_'.rand(1,1000000);
		    $file_size =$_FILES['file']['size'];
		    $file_tmp =$_FILES['file']['tmp_name'];
		    $file_type=$_FILES['file']['type'];   
		    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
	        move_uploaded_file($file_tmp,"./assets/slider/".$name.".".$file_ext);
	        return 'assets/slider/'.$name.".".$file_ext;
		    }
	}

	public function delete($id){
		if ($this->Setting_model->delete($id)) {
			$this->session->set_flashdata('success','Hapus berhasil.');
		}else{
			$this->session->set_flashdata('error','Hapus gagal.');
		}
	redirect('admin/Dashboard/setting');
	}

	public function ajax_show_per_id($id){
		$getter = $this->Setting_model->getById($id);
		echo json_encode($getter);
	}
	public function updateSlider(){
		$this->form_validation->set_rules('captionEdit','Caption','trim');
		$id = $this->input->post('id');
		$gbr = $this->upload();
		
		if ($gbr == true) {
			if ($this->form_validation->run()) {
				
				$data = array(
				'caption'=>$this->input->post('captionEdit'),
				'gambar'=>$gbr);

				$this->Setting_model->updateData($id,$data);
				$this->session->set_flashdata('success','Update berhasil.');
			}else{
			$this->session->set_flashdata('error',''.validation_errors().'');
			}
		}else{
			$data = array(
				'caption'=>$this->input->post('captionEdit'),
				);
			$this->Setting_model->updateData($id,$data);
			$this->session->set_flashdata('success','Update berhasil.');
		}
		
		redirect('admin/Dashboard/setting');
		// var_dump($id);
		// var_dump($data);
	}
	
}