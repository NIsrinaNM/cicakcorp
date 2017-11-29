<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $loggedin = $this->session->userdata('masukin');
            if (!$this->session->userdata('masukin')) {
            	redirect('Home/login');
            }
        }

	function getKota(){
		$nama = $this->input->post('cari');
		$out = $this->Home_model->cariKota($nama);
		echo json_encode($out);
	}

	public function insertCustomOrder() {
		$user = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
		$config['upload_path'] = './assets/orderan/';
        $config['allowed_types'] = 'zip';
        $config['file_name'] = 'CUSTOM_ORDER_'.$this->input->post('kodebooking').'.zip';
        $config['max_size'] = '102400';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('desain')) {
        	$namabarang = $this->Home_model->ambilbarang($this->input->post('brg'));
	        $jenisbarang = $this->Home_model->ambiljenis($this->input->post('jnjs'));
	        $data = array(
	        	'kode' => $this->input->post('kodebooking'),
	        	'username' => $this->session->userdata('masukin')['user'],
	        	'namabarang' => $namabarang[0]->name.' '.$jenisbarang[0]->name,
	        	'jumlah' => $this->input->post('jumlahbarang'),
	        	'deskripsi' =>$this->input->post('deskripsi'),
	        	'desain' => 'assets/orderan/'.$this->upload->data('file_name'),
	        	'nama' => $this->input->post('namapenerima'),
	        	'alamat' => $this->input->post('alamat'),
	        	'notelp' => $this->input->post('notelp'),
	        	'metod' => $this->input->post('courier'),
	        	'statusorder' => 'Belum Dibayar'
	        	);

	        $hasil = $this->Home_model->InsertData('orderanjasa', $data);
			if($hasil > 0) {
				$subject = '[Pemesanan Cicak Corp]';
        		$message = '
        		Dear '. $user[0]->nama .',<br/><br/>
        		Terima Kasih Atas kepercayaan anda memesan di <strong>Cicak Corp</strong>. Berikut Kami Lampirkan pesanan anda.<br/><br/> 
        		Kode Booking:'. $this->input->post('kodebooking') . '<br/>
        		Nama Barang:'. $namabarang[0]->name.' '.$jenisbarang[0]->name . '<br/>
        		Jumlah Pemesanan:'. $this->input->post('jumlahbarang') . '<br/>
        		Deskripsi:'. $this->input->post('deskripsi') . '<br/><br/>
        		Kami Akan menghubungi anda untuk negosiasi harga.<br/><br/><br/>
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
				
				redirect('Home/successshopping/'.$this->input->post('kodebooking'));
			} else {
				echo "Gagal";
			}
        }else{
        	echo $this->upload->display_errors();
        }
        
        
	}

	function add(){
		$addtocart = array(
			'id' =>$this->input->post('id'),
			'name'=>$this->input->post('name'),
			'price'=>$this->input->post('price'),
			'qty'=> $this->input->post('qty'),
			'deskripsi'=>$this->input->post('deskripsi')
			);
		$this->cart->insert($addtocart);
		redirect('Home/shoppingcart');
	}
	function remove($rowid){
		if ($rowid==="all"){
			$this->cart->destroy();
		}else{
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			$this->cart->update($data);
		}

		redirect('Home/shoppingcart');
	}

	function update_cart(){

	// Recieve post values,calcute them and update
	$cart_info = $_POST['cart'] ;
	foreach( $cart_info as $id => $cart){
		$rowid = $cart['rowid'];
		$price = $cart['price'];
		$amount = $price * $cart['qty'];
		$qty = $cart['qty'];

		$data = array(
		'rowid' => $rowid,
		'price' => $price,
		'amount' => $amount,
		'qty' => $qty
		);

		$this->cart->update($data);
	}
	redirect('Home/shoppingcart');
	// var_dump($cart_info);
	}

	function save_to_db(){
		$user = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
		$this->form_validation->set_rules('alamat','Alamat Penerima','required|trim|min_length[8]');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat').', '.$this->input->post('kota_o').', '.$this->input->post('provinsi_o');
		$telp = $this->input->post('telp');
		$metod = $this->input->post('courier').', '.$this->input->post('services');
		do{
		        $kode = $this->randString(11);
		        $num = $this->Home_model->cekrand($kode);
			}while($num>=1);

		if ($this->form_validation->run()) {
			$order = array(
				
				'customer'=>$this->session->userdata('masukin')['user'],
				'kode_order'=>$kode,
				'metode'=>$metod,
				'biaya'=>$this->input->post('ongkir'),
				'alamat'=>$alamat,
				'subtotal'=>$this->input->post('subtotal'));
			$orid = $this->Home_model->insert_order($order,'order');
			if ($cart = $this->cart->contents()) {
				foreach ($cart as $c) {
					$detil = array(
						'orderid'=>$orid,
						'kode'=>$c['id'],
						'kuantitas'=>$c['qty'],
						'harga'=>$c['price'],
						'deskripsi'=>$c['deskripsi']);
				$this->Home_model->insert_order($detil,'detil_order');
				}

				$subject = '[Pemesanan Cicak Corp]';
        		$message = '
        		Dear '. $user[0]->nama .',<br/><br/>
        		Terima Kasih Atas kepercayaan anda memesan di <strong>Cicak Corp</strong>. Berikut Kami Lampirkan pesanan anda.<br/><br/> 
        		Kode Booking:'. $kode . '<br/>
        		SUbtotal:'.$this->input->post('subtotal') . '<br/>
        		Ongkir: <br/>
        		Total Pembayaran: <br/><br />
        		Pembayaran dapat dilakukan di rekening<br />
        		Bank : BNI<br />
        		No Rekening : 0396119651<br />
        		Atas Nama : Lilik Indriyati<br /><br />
        		Anda juga dapat melihat detil Pemesanan dan melakukan konfirmasi pembayaran pada menu Profil Anda.<br/><br/><br/>
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

			$this->cart->destroy();
			}
		}else{
			echo validation_errors();
			redirect('Home/shoppingcart');
		}
		redirect('Home/review/'.$kode);
	}

	function randString($panjang){
		 $characters = '012345678909876543211234567890';
		 $string = '';
		 $max = strlen($characters) - 1;
		 for ($i = 0; $i < $panjang; $i++) {
		      $string .= $characters[mt_rand(0, $max)];
		 }
		 return $string;
	}

	function getCity($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 67c97ee2507d0cfdc8eaf1c9269dfec2"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
			$data = json_decode($response, true);
		  //echo json_encode($k['rajaongkir']['results']);

		  
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
		  

		    echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>";
		  
		  }
		}
	}

	function getCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array('origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		// var_dump($data);
		$this->load->view('rajaongkir/getCost', $data);
	}
}
