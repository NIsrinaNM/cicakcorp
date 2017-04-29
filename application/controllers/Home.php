<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
                // $this->load->model('');
        }

	public function index() {
		$this->load->view("home/navigasi");
		$this->load->view("home/slides");
		$this->load->view('home/index');
	}

	public function galeri() {
		$this->load->view("home/navigasi");
		$this->load->view("home/slides");
		$this->load->view("home/galeri");
	}

	public function signup() {
		$this->load->view("home/signUp");
	}
}
