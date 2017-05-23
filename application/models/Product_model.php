<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function getData_byKode($kode) {
		$this->db->select('id');
		$this->db->where('kode',$kode);
		$this->db->from('jualan');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getData_byID($id) {
		$this->db->select('judul,kategori,harga,berat,deskripsi,status_barang,stok,thumbnail,kode');
		// $this->db->join('jualan_review','jualan_review.jid=jualan.id');
		$this->db->where('jualan.id',$id);
		$this->db->from('jualan');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

    public function insertData($namaTabel, $data) {
		$hasil = $this->db->insert($namaTabel, $data);
		if ($hasil) {
			return true;
		}else{return false;}
		// return $hasil;
	}
	function count_data(){
		return $this->db->get('jualan')->num_rows();
	}
	function _getData($number, $offset){
		return $query = $this->db->get('jualan',$number,$offset)->result();
	}
	function data_rec($cari){
		$query = $this->db->select('*')
			->from('jualan')
			->like('judul',$cari)
			->or_like('kode',$cari)
			->get();
		return $query->result();
	}
	function data_on_search($cari,$number,$offset){
		$query = $this->db->limit($number,$offset)
			->select('*')
			->from('jualan')
			->like('judul',$cari)
			->or_like('kode',$cari)
			->get();
		return $query->result();
	}
	function getData($tabel){
		$query = $this->db->select('*')
			->from($tabel)->get();
		return $query->result();
	}
	function delete($tabel,$id){
		$this->db->where('id',$id);
		$this->db->delete($tabel);
	}

	function deleteGambar($kode){
		$this->db->where('jid',$kode);
		$this->db->delete('jualan_review');
	}

	function update($kode,$data){
		$this->db->where('kode',$kode);
		$this->db->update('jualan',$data);
	}

	function updateRead($tabel){
		$this->db->where('read','1');
		$this->db->update($tabel, array('read'=>'0'));
	}

	public function getOrderJasa() {
		$this->db->select('*');
		$this->db->from('orderanjasa');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getOrder() {
		$this->db->select('*');
		//$this->db->join('detil_order', 'order.id=detil_order.orderid');
		$this->db->from('order');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function order_limit($tabel) {
		$this->db->limit(5);
		$this->db->select('*');
		//$this->db->join('detil_order', 'order.id=detil_order.orderid');
		$this->db->from($tabel);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function order_limit_date() {
		$this->db->limit(5);
		$this->db->select('date');
		//$this->db->join('detil_order', 'order.id=detil_order.orderid');
		$this->db->from('order');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getIdOrder($kode) {
		$this->db->select('*');
		$this->db->where('kode',$kode);
		$this->db->from('orderanjasa');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function updateHarga($kode,$data){
		$this->db->where('kode',$kode);
		$this->db->update('orderanjasa',$data);
	}

	public function updateHarga1($kode,$data){
		$this->db->where('kode_order',$kode);
		$this->db->update('order',$data);
	}

	public function getIdBuy($orderid) {
		$this->db->select('*');
		$this->db->where('orderid',$orderid);
		$this->db->from('detil_order');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getIdOrderR($orderid) {
		$this->db->select('*');
		$this->db->where('id',$orderid);
		$this->db->from('order');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function gambarDet($kode) {
		$this->db->select('*');
		$this->db->where('jid',$kode);
		$this->db->from('jualan_review');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function cekrand($kode){
		$this->db->where('kode', $kode);
        $this->db->from('jualan');
        $num = $this->db->count_all_results();
        return $num;
	}

	public function ambiluname($kode) {
		$this->db->select('*');
		$this->db->where('kode', $kode);
		$this->db->from('orderanjasa');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
}
?>