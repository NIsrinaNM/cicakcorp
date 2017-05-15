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
        	'kodebooking' => $this->input->post('kodebooking'),
        	'username' => $this->session->userdata('masukin')['user'],
        	'namabarang' => $namabarang[0]->name,
        	'jenisbarang' => $jenisbarang[0]->name,
        	'jumlah' => $this->input->post('jumlahbarang'),
        	'deskripsi' =>$this->input->post('deskripsi'),
        	'desain' => 'assets/orderan/'.$this->upload->data('file_name'),
        	'nama' => $this->input->post('namapenerima'),
        	'alamat' => $this->input->post('alamat'),
        	'notelp' => $this->input->post('notelp'),
        	'jenisorder' => 'JASA'
        	);

        $hasil = $this->Home_model->InsertData('orderanjasa', $data);
		if($hasil > 0) {
			redirect('Home/successshopping');
		} else {
			echo "Gagal";
		}
	}


}
