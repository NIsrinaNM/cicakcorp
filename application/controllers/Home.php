<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $loggedin = $this->session->userdata('masukin');
        }

	public function index() {
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		
		$this->load->view("home/slides");
		$this->load->view('home/index');
	}


	public function shoppingcart() {
		$this->load->view("home/shoppingcart");
	}

	public function successshopping() {
		$this->load->view("home/success");
	}

	public function confirm() {
		$this->load->view("home/confirm");
	}

	public function confirmok() {
		$this->load->view("home/confirmok");
	}

	public function customorder() {
		$this->load->view("home/orderjasa");
	}

	public function category() {
		$this->load->view("home/category");
	}

	public function barang() {
		$this->load->view("home/barang");
	}

	public function profiluser() {
		$this->load->view('home/navigasilogin');
		$this->load->view("home/profiluser");
        $this->load->view('home/footer');

	}

	
	public function login() {
    	if ($this->session->userdata('masukin')) {
    		$this->index();
    	}else{
			$this->load->view("home/signUp");
		}
	}

	public function masukuser() {
		$usernameUser = htmlspecialchars($this->input->post('usernameUser'));
		$passwordUser = htmlspecialchars($this->input->post('passwordUser'));
		$isLogin = $this->Home_model->login_user($usernameUser, $passwordUser);
		$isLogin1 = $this->Home_model->ambilnama($usernameUser);
		if ($isLogin == true) {

			$loginData = array(
				'user'=>$isLogin[0]->username,
				'nama'=>$isLogin1[0]->nama);

			$this->session->set_userdata('masukin',$loginData);
			$this->index();
		}
		else{
			$data['error'] = "Kombinasi username atau password salah";
			$this->load->view('home/signUp', $data);
		}
	}

	public function galeri() {
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		$this->load->view("home/slides");
		$this->load->view("home/galeri");
	}

	public function signup() {
		$this->load->view("home/signUp");
	}

	public function insertDaftar() {
		$username = $_POST['userdaftar'];
		$x = str_split($_POST['passdaftar']);
		$password = md5("1Qaz" . $_POST['passdaftar'] . "-Pl,");
		$repassword = md5("1Qaz" . $_POST['repassdaftar'] . "-Pl,");
		$nama = $_POST['namadaftar'];
		$email = $_POST['emaildaftar'];
		$alamat = $_POST['alamatdaftar'];
		$notelp = $_POST['telpdaftar'];
		
		if($password == $repassword && count($x) > 5) {
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

	public function logout() {
		$this->session->unset_userdata('masukin');
		$this->session->sess_destroy();
		$this->index();
	}
}
