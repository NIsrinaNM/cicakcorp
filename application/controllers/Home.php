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
		$dataslide = $this->Home_model->getAllData('slider');
		$data['slider'] = $dataslide;
		
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		
		$this->load->view("home/slides", $data);
		$this->load->view('home/index');
	}

	public function shoppingcart() {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/login');
		} else {
			$sess = $this->session->userdata('masukin')['user'];
			$data['detail'] = $this->Home_model->ambildetiluser($sess)[0];
			$this->load->view("home/shoppingcart",$data);
		}
	}

 public function review($kodeorder="") { 
    if (empty($kodeorder)) { 
      redirect('Home/category'); 
    } 
    $orid = $this->Home_model->getSomeOrder_byKode($kodeorder); 
    $usname = $orid[0]->username; 
    $uname = $this->session->userdata('masukin')['user']; 
    $barang = $this->Home_model->hasil_beli($orid[0]->id); 
    var_dump($orid); 
    $i = array( 
      'kode'=>$kodeorder, 
      'nama'=>$orid[0]->nama, 
      'alamat'=>$orid[0]->addrr, 
      'metod'=>$orid[0]->metode, 
      'kontak'=>$orid[0]->noTelp, 
      'email'=>$orid[0]->email, 
      'status'=>$orid[0]->status_bayar, 
      'barang'=>$barang, 
      'ongkir'=>$orid[0]->biaya); 
    if (empty($this->session->userdata('masukin'))) { 
      redirect('Home/login'); 
    }elseif ($usname != $uname) { 
      redirect('Home/category'); 
    }else{ 
      $this->load->view("home/reviewOrder",$i); 
    } 
  } 

	public function successshopping() {
		$orderakhir = $this->Home_model->latestorder();
		$data = array(
			'kode' => $orderakhir[0]->kodebooking,
			'harga' => $orderakhir[0]->harga);
		$this->load->view("home/success", $data);
	}

	public function confirm() {
		$this->load->view("home/confirm");
	}

	public function confirmok() {
		$this->load->view("home/confirmok");
	}

	public function customorder() {
		do {
			$acak = $this->Home_model->randomkode();
			$num = $this->Home_model->cekkodebooking($acak);
		} while ($num>=1);
		$detiluser = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
		$data = array(
			'nama' => $this->session->userdata('masukin')['nama'],
			'alamat'=>$detiluser[0]->alamat,
            'notelp'=>$detiluser[0]->noTelp,
            'prop'=>$detiluser[0]->prop,
            'kotkab'=>$detiluser[0]->kotkab,
            'kec'=>$detiluser[0]->kec,
            'kodepos' => $detiluser[0]->kodepos,
			'kode' => $acak,
			'jasa' =>  $this->Home_model->jasa()
			);
		$this->load->view("home/orderjasa", $data);
	}

	public function ambil_data(){
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if($modul=="jenisjasa"){
            echo $this->Home_model->jenisjasa($id);
        }
    }

	public function category() {
		$data = array(
			'data' => $this->Home_model->getKategori(),
			'jualan' => $this->Home_model->getJualan());
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		$this->load->view("home/category", $data);
		$this->load->view("home/footer");
	}

	public function detilcategory($kategori) {
		if(empty($this->Home_model->getdetilKategori($kategori))) {
			echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Oops! Kategori Barang ini tidak ditemukan</strong> '.$this->session->flashdata('error').'
</div>';
			$this->category();
		} else {
		$data = array(
			'data' => $this->Home_model->getKategori(),
			'jualan' => $this->Home_model->getdetilKategori($kategori));
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		$this->load->view("home/category", $data);
		$this->load->view("home/footer");
		}
	}

	public function barang($id) {
		$barang = $this->Home_model->getBarang($id);
		$kota = $this->Home_model->cariKota();
		$data = array('barang' => $barang[0],
			'kota'=>$kota);
		$kode = $barang[0]->kode;
		$this->load->view("home/barang", $data);
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
		$dataslide = $this->Home_model->getAllData('slider');
		$data['slider'] = $dataslide;
		$datajualan = array(
			'jualan' => $this->Home_model->getAllData('galeri'));
		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		$this->load->view("home/slides", $data);
		$this->load->view("home/galeri", $datajualan);
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

	public function logout() {
		$this->session->unset_userdata('masukin');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
