<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            $this->load->library('pagination');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	function index(){
		$jumlah = $this->Product_model->count_data();
		$data['title'] = 'Daftar barang';
		
		$config['base_url'] = base_url().'admin/Product/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 2;
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
		$dataModel['jualan'] = $this->Product_model->_getData($config['per_page'],$offset);

		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tableProduct',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function search(){
		$input = $this->input->post('cari');
		$data['title'] = 'Pencarian '.$this->input->post('cari');
		$config['base_url'] = base_url().'admin/Product/search';
		$config['total_rows'] = count($this->Product_model->data_rec($input));
		$config['per_page'] = 2;
		$offset = $this->uri->segment(4);
		$this->pagination->initialize($config);	
		$dataModel['jualan'] = $this->Product_model->data_on_search($input,$config['per_page'],$offset);

		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tableProduct',$dataModel);
    	$this->load->view('admin/layout/slider');

	}

	function add(){
		$data['title'] = 'Tambah Produk';
		$dataModel['kategori'] = $this->Product_model->getData('kategori');
		$dataModel['reset'] = true;
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/addProduct',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function tambahkan(){
		$this->form_validation->set_rules('nama','Nama barang','required|trim|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('kode','Kode barang','required|trim|is_unique[jualan.kode]');
		$this->form_validation->set_rules('kategori','Kategori barang','required');
		$this->form_validation->set_rules('harga','Harga barang','required');
		$this->form_validation->set_rules('berat','Berat barang','required');
		$this->form_validation->set_rules('stok','Stok barang','required');
		$this->form_validation->set_rules('desc','Deskripsi barang','required|trim|min_length[20]|max_length[255]');
		$this->form_validation->set_rules('status','Status barang','required');
		// if ($_FILES['filethumb'] == '') {
		// 	$this->session->set_flashdata('error','Thumbnail harus diisi');
		// }

		if ($this->form_validation->run()) {
			$config = array(
				'upload_path'=> './uploads/',
				'allowed_types'=>'gif|jpg|png|jpeg',
				'max_size'=>2048,
				'overwrite'=>false,
				'file_name'=>'JUALAN_'.$this->input->post('kode'));
			$this->upload->initialize($config);
			$do = $this->upload->do_upload('filethumb');
			if ($do) {
				$data = array(
				'judul'=> ucfirst($this->input->post('nama')),
				'kategori'=> $this->input->post('kategori'),
				'harga'=> $this->input->post('harga'),
				'berat'=> $this->input->post('berat'),
				'deskripsi'=> $this->input->post('desc'),
				'stok'=> $this->input->post('stok'),
				'kode'=> $this->input->post('kode'),
				'status_barang'=> $this->input->post('status'),
				'thumbnail'=>'uploads/'.$this->upload->data('file_name'));
			$this->Product_model->insertData('jualan',$data);		
			$this->session->set_flashdata('success','Berhasil menambahkan barang');
			redirect('admin/Product');
			}else{
				$this->session->set_flashdata('error','Tidak dapat mengupload gambar thumbnail');
				$data['reset'] = false;
				$data['kategori'] = $this->Product_model->getData('kategori');
				$var['title'] = 'Tambah produk';
				$this->load->view('admin/layout/header',$var);
				$this->load->view('admin/addProduct',$data);
				$this->load->view('admin/layout/slider');
			}
		}else{
			$this->session->set_flashdata('error',''.validation_errors().'');
			$data['reset'] = false;
			$var['title'] = 'Tambah produk';
			$data['kategori'] = $this->Product_model->getData('kategori');
				$this->load->view('admin/layout/header',$var);
				$this->load->view('admin/addProduct',$data);
				$this->load->view('admin/layout/slider');
		}
	}
	
	function category(){
		$data['title'] = 'Kategori barang';
		$dataModel['kate'] = $this->Product_model->getData('kategori');
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/kategori',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function addKategori(){
		$this->form_validation->set_rules('nama','Nama Kategori','required|is_unique[kategori.nama]');
		$data['nama'] = strtoupper($this->input->post('nama'));
		
			if ($this->form_validation->run()==false) {
				// $this->session->set_flashdata('error','Gagal menambahkan kategori baru');
				$out['error'] = validation_errors();
			}else{
			$do = $this->Product_model->insertData('kategori',$data);
			if ($do) {
				// $this->session->set_flashdata('success','Berhasil menambahkan kategori baru');
				$out['success'] = 'Berhasil menambahkan kategori baru';
			}else{
				// $this->session->set_flashdata('error','Gagal menambahkan kategori baru');
				$out['error'] = 'Gagal menambahkan kategori baru';
			}
		}
		// redirect('admin/Product/category');
		echo json_encode($out);
	}
	function _hapus($id){
		$this->Product_model->delete('jualan',$id);
		redirect('admin/Product');
	}
	function hapus($tabel,$id){
		$this->Product_model->delete($tabel,$id);
		redirect('admin/Product/category');
	}
	function edit_barang($kode){
		$data['title'] = 'Edit barang';
		$getID = $this->Product_model->getData_byKode($kode);
		$dataModel = array(
			'headtitle'=> 'Edit #'.$kode,
			'barang'=> $this->Product_model->getData_byID($getID[0]->id),
			'kategori' => $this->Product_model->getData('kategori'));
		// var_dump($this->Product_model->getData_byID($getID[0]->id));
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/editBarang',$dataModel);
    	$this->load->view('admin/layout/slider');
	}
	function updateHarga($kode){
		$input =  array(
			'harga'=> $this->input->post('harga'));
		$this->Product_model->update($kode,$input);
		redirect('admin/Product');
	}
	function hapus_multi(){
		foreach ($this->input->post('del') as $delete) {
			$this->Product_model->delete('jualan',$delete);
		}
		redirect('admin/Product');
	}
}