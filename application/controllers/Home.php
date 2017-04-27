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
}
