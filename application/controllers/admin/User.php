<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('User_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function index(){
		$data['title'] = 'User terdaftar';

        $dataModel = array(
            'user'=> $this->User_model->getUser()
                );
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/user_v',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
    function userInfo($uname){
        $output = $this->User_model->get_id($uname);
        echo json_encode($output);
    }
    function hapus($uname){
        $this->User_model->delete($uname);
        redirect('admin/User');
    }
}
