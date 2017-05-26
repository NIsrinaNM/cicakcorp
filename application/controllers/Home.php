<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $this->load->model('Product_model');
            $this->load->library('pagination');
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

 public function review($kodeorder) { 
	if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
    if (empty($kodeorder)) { 
      redirect('Home/category'); 
    } 
    $orid = $this->Home_model->getSomeOrder_byKode($kodeorder); 
    $usname = $orid[0]->username; 
    $uname = $this->session->userdata('masukin')['user']; 
    $barang = $this->Home_model->hasil_beli($orid[0]->id);  
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
  } 

	public function successshopping($kodeorder) {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
		if (empty($kodeorder)) { 
	      redirect('Home/category'); 
	    } 
		$orderakhir = $this->Home_model->latestorder($kodeorder);
		$data = array(
			'kode' => $orderakhir[0]->kode,
			'nama' => $orderakhir[0]->nama,
			'alamat' => $orderakhir[0]->alamat,
			'notelp' => $orderakhir[0]->notelp,
			'metod' => $orderakhir[0]->metod,
			'harga' => 'NEGO / TUNGGU KAMI MENGHUBUNGI ANDA');
	if (empty($this->session->userdata('masukin'))) { 
      redirect('Home/login'); 
   		}else{
   			$this->load->view("home/success", $data);
   		}
   	}
	}

	public function confirm($kode="") {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
	if (empty($kode)) { 
      redirect('Home/category'); 
    }
		if(!$this->Home_model->getOrderJasa1($kode)) {
			$order = $this->Home_model->getOrder1($kode);
			$detilorder = array(
				'kode' => $order[0]->kode_order,
				'total' => $order[0]->subtotal
				);
		} else if (!$this->Home_model->getOrder1($kode)) {
			$order = $this->Home_model->getOrderJasa1($kode);
			$detilorder = array(
				'kode' => $order[0]->kode,
				'total' => $order[0]->total
				);
		}
		$this->load->view("home/confirm", $detilorder);
	}
	}

	public function insertKonfirmBayar() {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
		$user = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
		$config['upload_path'] = './assets/buktibayar/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '10240';
        $this->upload->initialize($config);

        $this->upload->do_upload('buktibayar');
        $data = array(
        	'kode' => $this->input->post('kode'),
        	'username' => $this->session->userdata('masukin')['user'],
        	'namabayar' => $this->input->post('namabayar'),
        	'metode' => $this->input->post('metode'),
        	'bank' =>$this->input->post('bank'),
        	'buktibayar' => 'assets/buktibayar/'.$this->upload->data('file_name'),
        	'total' => $this->input->post('jumlahbayarharusnya'),
        	'jumlahbayar' => $this->input->post('jumlahbayar')
        	);
        $data1 = array('statusorder' => 'Sudah dibayar');
        $where1 = array('kode' => $this->input->post('kode'));
        $data2 = array('status_bayar' => 'Sudah dibayar');
        $where2 = array('kode_order' => $this->input->post('kode'));
        $hasil = $this->Home_model->InsertData('buktibayar', $data);
        $hasil1 = $this->Home_model->UpdateDataA('orderanjasa', $data1, $where1);
        $hasil2 = $this->Home_model->UpdateDataA('order', $data2, $where2);
		if($hasil > 0 && $hasil > 0 && $hasil2 > 0) {
				$subject = '[Konfirmasi Pembayaran Cicak Corp]';
        		$message = '
        		Dear '. $user[0]->nama .',<br/><br/>
        		Terima Kasih telah melakukan pembayaran order. Berikut Kami lampirkan salinan pembayaran.<br/><br/> 
        		Kode Booking: '. $this->input->post('kode') . '<br/>
        		Metode: '.$this->input->post('metode') . '<br/>
        		Bank: '. $this->input->post('bank') . '<br/>
        		Jumlah Pembayaran: '. $this->input->post('jumlahbayar') . '<br /><br />
        		Terima kasih atas kepercayaannya.<br/><br/><br/>
        		Thanks<br/>Cicak Corp';
        		$config['mailtype'] = 'html';
        		$config['charset'] = 'iso-8859-1';
        		$config['wordwrap'] = TRUE;
        		$config['newline'] = "\r\n";
        		$this->email->initialize($config);

 				$this->email->from('admin@cicakcorp.com', 'cicakcorp');
 				$this->email->to($user[0]->email); 
 				$this->email->subject($subject);
 				$this->email->message($message);
 				$this->email->send();

			redirect('Home/confirmok');
		} else {
			echo "Gagal";
		}
		}
	}

	public function confirmok() {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
		$this->load->view("home/confirmok");
		}
	}

	public function customorder() {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/signUp');
		} else {
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
	}

	public function ambil_data(){
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if($modul=="jenisjasa"){
            echo $this->Home_model->jenisjasa($id);
        }
    }

	public function category() {
		$jumlah = $this->Product_model->count_data();

		$config['base_url'] = base_url().'Home/category';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 30;
		// STYLING 
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $offset = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data = array(
			'data' => $this->Home_model->getKategori(),
			'jualan' => $this->Product_model->_getData($config['per_page'],$offset));

		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		$this->load->view("home/category", $data);
	}

	function cari(){
		$input = $this->input->post('cari');
		if (isset($_POST['caribtn'])) {
			$data['pencarian'] = $input;
			$this->session->set_userdata('pencarianUmum',$data['pencarian']);
		}else{
			$data['pencarian'] = $this->session->userdata('pencarianUmum');
		}

		$config['base_url'] = base_url().'Home/cari/';
		$config['total_rows'] = count($this->Product_model->data_rec($input));
		$config['per_page'] = 20;
		// STYLING 
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$offset = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['data'] = $this->Home_model->getKategori();
		$data['jualan'] = $this->Product_model->data_on_search($data['pencarian'],$config['per_page'],$offset);

		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("home/navigasi");
		} else {
			$this->load->view("home/navigasilogin");
		}
		// var_dump($data);
		$this->load->view("home/category", $data);
	}

	public function detilcategory($kategori) {
		$config['base_url'] = base_url().'Home/detilcategory/'.$kategori;
		$config['total_rows'] = count($this->Home_model->data_category_record($kategori));
		$config['per_page'] = 30;
		// STYLING 
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$offset = $this->uri->segment(4);
		$this->pagination->initialize($config);

		$data = array(
			'data' => $this->Home_model->getKategori(),
			'jualan' => $this->Home_model->getdetilKategori($kategori,$config['per_page'],$offset));

		if(empty($this->Home_model->getdetilKategori($kategori,$config['per_page'],$offset))) {
			$this->session->set_flashdata('error','Kategori barang tidak ditemukan!');
			$this->category();
		} else {
		
			if (empty($this->session->userdata('masukin'))) {
				$this->load->view("home/navigasi");
			} else {
				$this->load->view("home/navigasilogin");
			}
		$this->load->view("home/category", $data);
		}
	}

	public function barang($id) {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/signup');
		} else {
		$barang = $this->Home_model->getBarang($id);
		$kota = $this->Home_model->cariKota();
		$kode = $barang[0]->kode;
		$get = $this->Product_model->gambarDet($kode);
		$data = array('barang' => $barang[0],
			'kota'=>$kota,
			'gambar'=>$get);
		$this->load->view("home/barang", $data);
	}
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
			if($isLogin[0]->verify == '1') {
				$loginData = array(
					'user'=>$isLogin[0]->username,
					'nama'=>$isLogin1[0]->nama);

				$this->session->set_userdata('masukin',$loginData);
				redirect('Home/index');
			} else {
				$this->session->set_flashdata('error', 'Akun Anda Belum Terverifikasi, Cek email anda!');
				redirect('Home/login');
			}
		}
		else{
			$this->session->set_flashdata('error', 'Kombinasi Username dan Password Salah');			
			redirect('Home/login');
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
		$password = md5("~4h5@N;" . $_POST['passdaftar'] . "-13uRh4n,");
		$repassword = md5("~4h5@N;" . $_POST['repassdaftar'] . "-13uRh4n,");
		$nama = $_POST['namadaftar'];
		$email = $_POST['emaildaftar'];
		
		if($password == $repassword && count($x) > 3) {
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
			// send email
        		$this->Home_model->sendEmail($this->input->post('emaildaftar'));
                // successfully sent mail
                $this->session->set_flashdata('success','Silakan buka email anda dan verifikasikan akun anda untuk bisa login');
                redirect('Home/login');
                
		} else {
			$this->session->set_flashdata('error','Cek kembali data inputan anda');
			redirect('Home/login');
		} 
		} else {
			$this->session->set_flashdata('error','Cek kembali data inputan anda');
			redirect('Home/login');
		}
	}

	public function verify($email) {
        	$this->Home_model->verifyEmailID(base64_decode($email));
        	$this->session->set_flashdata('verif','Akun Anda telah sukses diverifikasi');
        	redirect('/');
        }
    }


	public function logout() {
		$this->session->unset_userdata('masukin');
		$this->session->sess_destroy();
		redirect(base_url());
	}


 public function doforget() {
 	$email = $this->input->post('email');
 	$username = $this->input->post('username');
 	$lupa = $this->Home_model->lupauser($username, $email);
 	$nama = $this->Home_model->ambilnama($lupa[0]->username);
 	if(empty($lupa)) {
 		$this->session->set_flashdata('error', 'Kombinasi Username dan Email salah');
 		redirect('Home/signup');
 	} else {
 		$password = $this->Home_model->randomkode();
 		$enpass = md5("~4h5@N;" . $password . "-13uRh4n,");
 		$this->db->where('username', $lupa[0]->username);
 		$this->db->update('user', array('password'=>$enpass));
 		
 		$subject = '[Reset Akun Cicak Corp]';
        $message = 'Dear '. $nama[0]->nama .',<br/><br/>
        Anda telah meminta Password baru. Berikut data login anda:<br/><br/>
        <table>
        <tr>
        <td>Username Anda: </td><td>'. $lupa[0]->username . '</td>
        </tr>
        <tr>
        <td>Password Baru Anda: </td><td>'. $password . '</td>
        </tr>
        </table>
        <br/><br/>Segera ganti password anda dalam menu Profil User.<br/><br/><br/>Thanks<br/>Cicak Corp';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

 		$this->email->from('admin@cicakcorp.com', 'cicakcorp');
 		$this->email->to($lupa[0]->email); 
 		$this->email->subject($subject);
 		$this->email->message($message);
 		$this->email->send();
 		$this->session->set_flashdata('success','Password telah direset. Silakan cek email anda.');
 		redirect('Home/signUp');
 	}
 }

 	public function Sudahditerima($kode) {
		$this->load->model('Product_model');
		$uname = $this->Product_model->ambiluname($kode);
		$user = $this->Home_model->ambildetiluser($uname[0]->username);
		$data = array(
			'statusorder' => 'Sudah Diterima'
			);
		$this->Product_model->updateHarga($kode,$data);

		$subject = '[Pemesanan Cicak Corp]';
        $message = 'Dear '. $user[0]->nama .',<br/><br/>
        Status pemesanan anda telah berubah:<br/><br/>
        <table>
        <tr>
        <td>Kode Booking: </td><td>'. $kode . '</td>
        </tr>
        <tr>
        <td>Status baru: </td><td>Sudah Diterima</td>
        </tr>
        </table>
        <br/><br/>Anda dapat melihat detil pemesanan pada halaman Profil Anda.<br/><br/><br/>Thanks<br/>Cicak Corp';

        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

 		$this->email->from('admin@cicakcorp.com', 'cicakcorp');
 		$this->email->to($user[0]->email); 
 		$this->email->subject($subject);
 		$this->email->message($message);
 		$this->email->send();
		redirect('Home/');
	}

	public function sudahditerima1($kode) {
		$this->load->model('Product_model');
		$uname = $this->Product_model->ambiluname1($kode);
		$user = $this->Home_model->ambildetiluser($uname[0]->customer);
		$data = array(
			'status_bayar' => 'Sudah Diterima'
			);
		$this->Product_model->updateHarga1($kode,$data);

		$subject = '[Pemesanan Cicak Corp]';
        $message = 'Dear '. $user[0]->nama .',<br/><br/>
        Status pemesanan anda telah berubah:<br/><br/>
        <table>
        <tr>
        <td>Kode Booking: </td><td>'. $kode . '</td>
        </tr>
        <tr>
        <td>Status baru: </td><td>Sudah Diterima</td>
        </tr>
        </table>
        <br/><br/>Anda dapat melihat detil pemesanan pada halaman Profil Anda.<br/><br/><br/>Thanks<br/>Cicak Corp';

        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

 		$this->email->from('admin@cicakcorp.com', 'cicakcorp');
 		$this->email->to($user[0]->email); 
 		$this->email->subject($subject);
 		$this->email->message($message);
 		$this->email->send();
 		
		redirect('admin/Pemesanan/Ready');
	}
}
