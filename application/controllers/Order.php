<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->model('Home_model');
            $loggedin = $this->session->userdata('masukin');
        }

	function getKota(){
		$nama = $this->input->post('cari');
		$out = $this->Home_model->cariKota($nama);
		echo json_encode($out);
	}

	public function insertCustomOrder() {
		$config['upload_path'] = './assets/orderan/';
        $config['allowed_types'] = 'cdr';
        $config['max_size'] = '102400';
        $this->upload->initialize($config);

        $this->upload->do_upload('desain');
        $namabarang = $this->Home_model->ambilbarang($this->input->post('brg'));
        $jenisbarang = $this->Home_model->ambiljenis($this->input->post('jnjs'));
        $data = array(
        	'username' => $this->session->userdata('masukin')['user'],
        	'namabarang' => $namabarang[0]->name,
        	'jenisbarang' => $jenisbarang[0]->name,
        	'jumlah' => $this->input->post('jumlahbarang'),
        	'deskripsi' =>$this->input->post('deskripsi'),
        	'desain' => 'assets/orderan/'.$this->upload->data('file_name'),
        	'jenisorder' => 'JASA'
        	);

        $hasil = $this->Home_model->InsertData('shoppingcart', $data);
		if($hasil > 0) {
			redirect('Home/shoppingcart');
		} else {
			echo "Gagal";
		}
	}

	function add(){
		$addtocart = array(
			'id' =>,
			'name'=>,
			'price'=>,
			'qty'=> 
			);
	}
}
