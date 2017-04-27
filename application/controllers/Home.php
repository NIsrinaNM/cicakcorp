<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view("navigasi");
		$this->load->view("slides");
		$this->load->view('index');
	}

	public function galeri() {
		$this->load->view("navigasi");
		$this->load->view("slides");
		$this->load->view("galeri");
	}

	public function signup() {
		$this->load->view("signUp");
	}

	public function loginAdmin() {
		$this->load->view("loginAdmin");
	}

	public function masukadmin() {
		$usernameAdmin = $this->input->post('usernameAdmin');
		$passwordAdmin = $this->input->post('passwordAdmin');
		$isLogin = $this->MyModel->login_auth($usernameAdmin, $passwordAdmin);
		if ($isLogin == true) {
			$this->cpanel();
		}
		else{
			$data['err_message'] = "gagal login";
			$this->load->view('loginAdmin', $data);
		}
	}

	public function cpanel() {
		$this->load->view('cpanel');
	}
}
