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
<<<<<<< HEAD
		$this->load->view("Galeri");
	}
=======
		$this->load->view("galeri");
>>>>>>> 0e5ab0da6c4895ce884a940981a37f0033086bd5

	public function signup() {
		$this->load->view("signUp");
	}
}
