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
	        	'metod' => $this->input->post('kirim'),
	        	'statusorder' => 'Belum Dibayar'
	        	);

	        $hasil = $this->Home_model->InsertData('orderanjasa', $data);
			if($hasil > 0) {
				redirect('Home/successshopping');
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
		
		$this->form_validation->set_rules('alamat','Alamat Penerima','required|trim|min_length[8]');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$metod = $this->input->post('kirim');
		do{
		        $kode = $this->randString(11);
		        $num = $this->Home_model->cekrand($kode);
			}while($num>=1);

		if ($this->form_validation->run()) {
			$order = array(
				
				'customer'=>$this->session->userdata('masukin')['user'],
				'kode_order'=>$kode,
				'metode'=>$metod,
				'biaya'=>'0',
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
}
