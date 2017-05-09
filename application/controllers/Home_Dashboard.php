<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Dashboard extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Home_model');
            if (!$this->session->userdata('masukin')) {
            	redirect('Home/login');
            }
        }

    public function index(){
        $this->load->view('home/navigasilogin');
        $this->load->view("home/profiluser");
        $this->load->view('home/footer');
    }

    public function profiluser() {
        if (empty($this->session->userdata('masukin'))) {
            redirect('Home/login');
        } else {
            $var['title'] = 'Profile '.$this->session->userdata('masukin')['user'];
            $detiluser = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
            $data = array(
                'username'=>$this->session->userdata('masukin')['user'],
                'nama'=>$this->session->userdata('masukin')['nama'],
                'alamat'=>$detiluser[0]->alamat,
                'notelp'=>$detiluser[0]->noTelp,
                'foto'=>$detiluser[0]->foto);
            $this->load->view('home/navigasilogin');
            $this->load->view('home/profiluser', $data);
            $this->load->view('home/footer');
        }
    }

}