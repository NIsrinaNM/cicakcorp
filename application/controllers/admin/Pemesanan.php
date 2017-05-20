<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	public function Jasa(){
		$data['title'] = 'Daftar Pemesanan Custom Order';
		$detil = array(
			'orderjasa' => $this->Product_model->getOrderJasa()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesanan',$detil);
    	$this->load->view('admin/layout/slider');
	}

	public function orderjasainfo($kode) {
		$output = $this->Product_model->getIdOrder($kode);
		echo json_encode($output);
	}

	public function Ready(){
		$data['title'] = 'Daftar pemesanan Ready Stock';
		$detil = array(
			'order' => $this->Product_model->getOrder()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesananReady',$detil);
    	$this->load->view('admin/layout/slider');
	}

	public function orderbaranginfo($id) {
		$this->load->model('Home_model');
        $order = $this->Home_model->get_order_id($id);
        $order_det = $this->Home_model->getDetilOrder($id);
        $hasil =array(
            'kode'=>$order[0]->kode_order,
            'tanggal'=>$order[0]->date,
            'alamat'=>$order[0]->alamat,
            'total'=>$order[0]->biaya + $order[0]->subtotal,
            'ongkir'=>$order[0]->biaya,
            'subtotal'=>$order[0]->subtotal,
            'status'=>$order[0]->status_bayar,
            'metode'=>$order[0]->metode,
            'barang'=>$order_det
            );
        echo json_encode($hasil);
	}

	function edit(){
		$data['title'] = 'Edit Status';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/editPemesanan');
    	$this->load->view('admin/layout/slider');
	}

	public function updateHarga($kode) {
		$data = array(
			'total' => $this->input->post('ubahharga')
			);
		$this->Product_model->updateHarga($kode,$data);
		redirect('admin/Pemesanan/Jasa');
	}

	public function updatestatus($kode) {
		$data = array(
			'statusorder' => $this->input->post('status')
			);
		$this->Product_model->updateHarga($kode,$data);
		redirect('admin/Pemesanan/Jasa');
	}

	function statusread1(){
		$orderan = $this->Product_model->order_limit('order');
		$orderan1 = $this->Product_model->order_limit_date();
		$this->Product_model->updateRead('order');
		$hasil = array(
			'notif'=>$orderan,
			'date'=>$orderan1
			);
		echo json_encode($orderan);
	}

	function statusread2(){
		$orderan = $this->Product_model->order_limit('orderanjasa');
		$orderan1 = $this->Product_model->order_limit_date();
		$this->Product_model->updateRead('orderanjasa');
		$hasil = array(
			'notif'=>$orderan,
			'date'=>$orderan1
			);
		echo json_encode($orderan);
	}

	// function humanTiming($time)
	// {

	//     $time = time() - $time; // to get the time since that moment
	//     $time = ($time<1)? 1 : $time;
	//     $tokens = array (
	//         31536000 => 'year',
	//         2592000 => 'month',
	//         604800 => 'week',
	//         86400 => 'day',
	//         3600 => 'hour',
	//         60 => 'minute',
	//         1 => 'second'
	//     );

	//     foreach ($tokens as $unit => $text) {
	//         if ($time < $unit) continue;
	//         $numberOfUnits = floor($time / $unit);
	//         return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	//     }

	// }
}