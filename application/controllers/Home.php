<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $loggedin = $this->session->userdata('loggedin');
            if (empty($loggedin) || $loggedin != true) {
            	// redirect('admin/Auth/login');
            	// $this->login();
            }
        }

	public function index() {
		$this->load->view("home/navigasi");
		$this->load->view("home/slides");
		$this->load->view('home/index');
	}

	
	public function login() {
    	if ($this->session->userdata('loggedin')) {
    		$this->index();
    	}else{
			$this->load->view("home/signUp");
		}
	}

	public function masukadmin() {
		$usernameAdmin = htmlspecialchars($this->input->post('usernameUser'));
		$passwordAdmin = htmlspecialchars($this->input->post('passwordUser'));
		$isLogin = $this->Home_model->login_user($usernameUser, $passwordUser);
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
			$this->load->view('home/signUp', $data);
		}
	}

	public function galeri() {
		$this->load->view("home/navigasi");
		$this->load->view("home/slides");
		$this->load->view("home/galeri");
	}

	public function signup() {
		$this->load->view("home/signUp");
	}

		public function insertDaftar() {
		$this->form_validation->set_rules('passdaftar','New Password','required|matches[repassdaftar]|min_length[5]');
		$this->form_validation->set_rules('repassdaftar','Repeat Password','required');

		$username = $_POST['userdaftar'];
		$password = md5("1Qaz" . $_POST['passdaftar'] . "-Pl,");
		$repassword = $_POST['repassdaftar'];
		$nama = $_POST['namadaftar'];
		$email = $_POST['emaildaftar'];
		$alamat = $_POST['alamatdaftar'];
		$notelp = $_POST['telpdaftar'];
		
		$InsertUser = array(
			'username' => $username,
			'password' => $password,
			'email' => $email
		);

		$InsertProfile = array(
			'username' => $username,
			'nama' => $nama,
			'alamat' => $alamat,
			'noTelp' => $notelp
		);
		
		$hasil = $this->Home_model->InsertData('user', $InsertUser);
		$hasil1 = $this->Home_model->InsertData('profile', $InsertProfile);
		if($hasil > 0 && $hasil1 > 0) {
			redirect('Home/index');
		} else {
			echo "Gagal";
		}
	}
}
