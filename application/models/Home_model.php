<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function login_user($usernameUser, $passwordUser) {
    	$p = md5("1Qaz" . $passwordUser . "-Pl,");
		$this->db->select('*');
		$this->db->where('username', $usernameUser);
		$this->db->where('password', $p);
		$this->db->from('user');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
	public function ambilnama($username) {
		$this->db->select('profile.nama');
		$this->db->where('user.username', $username);
		$this->db->join('profile','profile.username=user.username');
		$this->db->from('user');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function ambildetiluser($username) {
		$this->db->select('user.username,profile.uid,profile.alamat, profile.noTelp, profile.foto, profile.prop, profile.kotkab, profile.kec, profile.kodepos, user.email');
		$this->db->where('user.username', $username);
		$this->db->join('profile','profile.username=user.username');
		$this->db->from('user');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function ambilprop($id) {
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('provinces');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function ambilkota($id) {
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('regencies');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
	function cariKota(){
		$this->db->select('name');
		// $this->db->like('name',$like);
		$this->db->from('regencies');
		$query = $this->db->get();
		return $query->result();
	}

	public function ambilkec($id) {
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('districts');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

    public function insertData($namaTabel, $data) {
		$hasil = $this->db->insert($namaTabel, $data);
		return $hasil;
	}

	public function getColomn($user){
		$query = $this->db->select('*')
			->from('user')
			->where('username',$user)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function updateData($username,$data){
		$this->db->where('username',$username);
		$this->db->update('user',$data);
	}

	public function updateProfil($username,$data){
		$this->db->where('username',$username);
		$this->db->update('profile',$data);
	}

	public function provinsi(){
		$this->db->order_by('name','ASC');
		$provinces= $this->db->get('provinces');

		return $provinces->result_array();
	}

	public function kabupaten($provId){
		$kabupaten="<option value='0'>-- Pilih Kabupaten--</pilih>";
		$this->db->order_by('name','ASC');
		$kab = $this->db->get_where('regencies',array('province_id'=>$provId));

		foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
		}

		return $kabupaten;
	}

	public function kecamatan($kabId){
		$kecamatan="<option value='0'>-- Pilih Kecamatan --</pilih>";
		$this->db->order_by('name','ASC');
		$kec= $this->db->get_where('districts',array('regency_id'=>$kabId));

		foreach ($kec->result_array() as $data ){
			$kecamatan.= "<option value='$data[id]'>$data[name]</option>";
		}

		return $kecamatan;
	}

	public function getAllData($where){
		$query = $this->db->select('*')
			->from('setting')
			->where('jenis',$where)
			->order_by('id','desc')
			->limit(3)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getKategori() {
	$query = $this->db->select('*')
			->from('kategori')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}


	public function getdetilKategori($kategori) {
	$query = $this->db->select('*')
			->from('jualan')
			->where('kategori', $kategori)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getJualan() {
	$query = $this->db->select('*')
			->from('jualan')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getbarang($id) {
		$query = $this->db->select('*')
			->from('jualan')
			->where('id', $id)
			->limit(1)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function jasa(){
		$this->db->order_by('name','ASC');
		$jasa= $this->db->get('jasa');

		return $jasa->result_array();
	}

	public function jenisjasa($idjasa){
		$jenisjasa="<option value='0'>-- Pilih Jenis Barang --</pilih>";
		$this->db->order_by('name','ASC');
		$jnsjs = $this->db->get_where('jenisjasa',array('idjasa'=>$idjasa));

		foreach ($jnsjs->result_array() as $data ){
			$jenisjasa.= "<option value='$data[id]'>$data[name]</option>";
		}

		return $jenisjasa;
	}

	public function ambilbarang($id) {
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('jasa');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function ambiljenis($id) {
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('jenisjasa');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function randomkode() {
		$karakter ='ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
		$string = '';
		for($i =0; $i<7; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}

	public function cekkodebooking($kode) {
		$this->db->select('kodebooking');
		$this->db->where('kodebooking', $kode);
		$this->db->from('orderanjasa');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
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

	public function latestorder() {
		$this->db->select('*');
		$this->db->from('orderanjasa');
		$this->db->order_by('tanggal', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
	function cekrand($kode){
		$this->db->where('kode_order', $kode);
        $this->db->from('order');
        $num = $this->db->count_all_results();
        return $num;
	}

	function insert_order($data,$tabel){
		$this->db->insert($tabel,$data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	function getSomeOrder_byKode($param){
		$query = $this->db->select('order.id,order.date,customer,metode,order.alamat AS addrr,status_bayar,profile.username,nama, noTelp,email,biaya')
			->join('profile','profile.username=order.customer')
			->join('user','user.username=order.customer')
			->where('kode_order',$param)
			->from('order')
			->get();
		return ($query->num_rows() >0)? $query->result() : false;
	}

	function hasil_beli($id){
		$query = $this->db->select('judul, detil_order.kode, jualan.harga,kuantitas')
			->join('jualan','jualan.kode=detil_order.kode')
			->where('orderid',$id)
			->from('detil_order')
			->get();
		return ($query->num_rows() >0)? $query->result() : false;
	}

}
?>