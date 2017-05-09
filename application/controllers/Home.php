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
		
		if($password == $repassword && count($x) > 5) {
		$InsertUser = array(
			'username' => $username,
			'password' => $password,
			'email' => $email
		);

		$InsertProfile = array(
			'username' => $username,
			'nama' => $nama,
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

	public function chgpass($username){
		$this->form_validation->set_rules('npassword','New Password','required|matches[cpassword]|min_length[5]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required');
		$opass = $this->input->post('opassword');
		$npass = $this->input->post('npassword');
		$data['password'] = $npass;

		$do = $this->Home_model->getColomn($username);
		if ($do[0]->password == $opass) {
			if ($this->form_validation->run()) {
				if (!$this->Home_model->updateData($username,$data)) {
					$this->session->set_flashdata('success','Password successfully updated');
				}else{
					$this->session->set_flashdata('error','can\'t update password right now');
				}
			}else{$data = validation_errors();
				$this->session->set_flashdata('error',''.validation_errors().'');}
		}else{$this->session->set_flashdata('error','Old Password is wrong');}
		redirect('Home_Dashboard/profile');
	}

	public function chgProfile(){
		$this->form_validation->set_rules('nama','Nama','required');
		$username = $this->session->userdata('masukin')['user'];
		$data = array('nama'=>$this->input->post('nama'));
		$sessEdit = array(
			'user'=>$this->session->userdata('masukin')['user'],
			'nama'=>$this->input->post('nama'),
			'time'=>$this->session->userdata('masukin')['time']);

		if ($this->form_validation->run()) {
			$this->Home_model->updateData($username,$data);
			$this->session->set_userdata('masukin',$sessEdit);
			$this->session->set_flashdata('success','Profile successfully updated');
		}else{
			$this->session->set_flashdata('error','can\'t update Profile right now');
		}
		redirect('Home_Dashboard/profile');
	}

	public function updateData($username,$data){
		$this->db->where('username',$username);
		$this->db->update('user',$data);
	}

	public function logout() {
		$this->session->unset_userdata('masukin');
		$this->session->sess_destroy();
		$this->index();
	}
}
