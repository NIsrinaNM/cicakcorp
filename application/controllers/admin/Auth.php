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
            	//redirect('admin/Auth/login');
            	//$this->login();
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
		$enkrippass = md5("~4h5@N;" . $passwordAdmin . "-13uRh4n,");
		$isLogin = $this->Auth_model->login_auth($usernameAdmin, $enkrippass);
		if ($isLogin == true) {

			$loginData = array(
				'user'=>$isLogin[0]->username,
				'nama'=>$isLogin[0]->nama,
				'time'=>$isLogin[0]->timestamp);

			$this->session->set_userdata('loggedin',$loginData);
			$this->index();
		}
		else{
			$data['error'] = "Kombinasi username atau password salah";
			$this->load->view('admin/loginAdmin', $data);
		}
	}

	public function chgpass($username){
		$this->form_validation->set_rules('npassword','New Password','required|matches[cpassword]|min_length[5]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required');
		$opass = md5("~4h5@N;" . $this->input->post('opassword') . "-13uRh4n,");
		$npass = md5("~4h5@N;" . $this->input->post('npassword') . "-13uRh4n,");
		$data['password'] = $npass;

		$do = $this->Auth_model->getColomn($username);
		if ($do[0]->password == $opass) {
			if ($this->form_validation->run()) {
				if (!$this->Auth_model->updateData($username,$data)) {
					$this->session->set_flashdata('success','Password successfully updated');
				}else{
					$this->session->set_flashdata('error','can\'t update password right now');
				}
			}else{$data = validation_errors();
				$this->session->set_flashdata('error',''.validation_errors().'');}
		}else{$this->session->set_flashdata('error','Old Password is wrong');}
		redirect('admin/Dashboard/profile');
	}
	public function chgProfile(){
		$this->form_validation->set_rules('nama','Nama','required');
		$username = $this->session->userdata('loggedin')['user'];
		$data = array('nama'=>$this->input->post('nama'));
		$sessEdit = array(
			'user'=>$this->session->userdata('loggedin')['user'],
			'nama'=>$this->input->post('nama'),
			'time'=>$this->session->userdata('loggedin')['time']);

		if ($this->form_validation->run()) {
			$this->Auth_model->updateData($username,$data);
			$this->session->set_userdata('loggedin',$sessEdit);
			$this->session->set_flashdata('success','Profile successfully updated');
		}else{
			$this->session->set_flashdata('error','can\'t update Profile right now');
		}
		redirect('admin/Dashboard/profile');
	}

	public function logout(){
		$this->session->unset_userdata('loggedin');
		$this->session->sess_destroy();
		$this->index();
	}

}