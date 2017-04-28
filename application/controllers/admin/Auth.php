<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Auth_model');
            $loggedin = $this->session->userdata('loggedin');
            if (empty($loggedin) || $loggedin != true) {
            	// redirect('admin/Auth/login');
            	// $this->login();
            }
        }

	public function index() {
		redirect('admin/Dashboard');
	}

    public function login() {
    	if ($this->session->userdata('loggedin')) {
    		redirect('admin/Dashboard');
    	}else{
			$this->load->view("admin/loginAdmin");
		}
	}

	public function masukadmin() {
		$usernameAdmin = htmlspecialchars($this->input->post('usernameAdmin'));
		$passwordAdmin = htmlspecialchars($this->input->post('passwordAdmin'));
		$isLogin = $this->Auth_model->login_auth($usernameAdmin, $passwordAdmin);
		if ($isLogin == true) {

			$loginData = array(
				'user'=>$isLogin['username'],
				'nama'=>$isLogin['nama'],
				'time'=>$isLogin['timestamp']);

			$this->session->set_userdata('loggedin',$loginData);
			$this->index();
		}
		else{
			$data['error'] = "Kombinasi username atau password salah";
			$this->load->view('admin/loginAdmin', $data);
		}
	}

	public function logout(){
		$this->session->unset_userdata('loggedin');
		$this->session->sess_destroy();
		$this->index();
	}

}