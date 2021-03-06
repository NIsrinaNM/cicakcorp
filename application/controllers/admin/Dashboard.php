<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Auth_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
        }

    public function index(){
        $data['title'] = 'Dashboard';
    	$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/dashboard');
    	$this->load->view('admin/layout/slider');
    }

    public function profile() {
        if (!$this->session->userdata('loggedin')) {
                redirect('admin/Auth/login');
        } else {
        $var['title'] = 'Profile '.$this->session->userdata('loggedin')['user'];    
        $data = array(
            'username'=>$this->session->userdata('loggedin')['user'],
            'nama'=>$this->session->userdata('loggedin')['nama'],
            'date'=>$this->session->userdata('loggedin')['time']);
        $this->load->view('admin/layout/header',$var);
        $this->load->view('admin/profile',$data);
        $this->load->view('admin/layout/slider');
    }
    }

    public function setting(){
        if (!$this->session->userdata('loggedin')) {
                redirect('admin/Auth/login');
        } else {
        $this->load->model('Setting_model');
        $data = array('slider'=>$this->Setting_model->getAllData('slider'));
        $var['title'] = 'Setting';
        
        $this->load->view('admin/layout/header',$var);
        $this->load->view('admin/setting',$data);
        $this->load->view('admin/layout/slider');
    }
    }

}