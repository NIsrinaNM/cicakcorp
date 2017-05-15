<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $loggedin = $this->session->userdata('masukin');
        }

	function getKota(){
		$nama = $this->input->post('cari');
		$out = $this->Home_model->cariKota($nama);
		echo json_encode($out);
	}
}
