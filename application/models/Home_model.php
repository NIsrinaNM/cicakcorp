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

	public function lupauser($username, $email) {
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('email', $email);
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

	public function updateDataA($namaTabel, $data, $where) {
		$hasil = $this->db->update($namaTabel, $data, $where);
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


	public function getdetilKategori($kategori,$number,$offset) {
	$query = $this->db->limit($number,$offset)
			->select('*')
			->from('jualan')
			->where('kategori', $kategori)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function data_category_record($kate){
		$query = $this->db->select('*')
			->from('jualan')
			->where('kategori', $kate)
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
		$this->db->where('kode', $kode);
		$this->db->from('orderanjasa');
		$num = $this->db->count_all_results();
        return $num;
	}

	public function getOrderJasa($user) {
		$this->db->select('*');
		$this->db->where('username', $user);
		$this->db->from('orderanjasa');
		$this->db->order_by('tanggal', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_order($user){
		$this->db->select('*');
		$this->db->where('customer', $user);
		$this->db->from('order');
		$this->db->order_by('order.date', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_order_id($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('order');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getDetilOrder($id) {
		$this->db->select('jualan.judul,kuantitas,detil_order.harga,detil_order.deskripsi,detil_order.kode');
		$this->db->join('jualan','jualan.kode=detil_order.kode');
		$this->db->where('orderid', $id);
		$this->db->from('detil_order');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getOrderJasa1($kode) {
		$this->db->select('*');
		$this->db->where('kode', $kode);
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

	public function getOrder1($kode) {
		$this->db->select('order.date, order.customer, order.kode_order, order.metode, order.subtotal, order.status_bayar, detil_order.kode, detil_order.kuantitas, detil_order.deskripsi');
		$this->db->where('order.kode_order', $kode);
		$this->db->join('detil_order', 'order.id=detil_order.orderid');
		$this->db->from('order');
		$this->db->order_by('order.date', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function latestorder($kode) {
		$this->db->select('*');
		$this->db->where('kode', $kode);
		$this->db->from('orderanjasa');
		// $this->db->order_by('tanggal', 'desc');
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

	//send verification email to user's email id
    public function sendEmail($to_email)
    {
        $from_email = 'admin@cicakcorp.com'; //change this to yours
        $subject = '[Verifikasi Pendaftaran Akun Cicak Corp]';
        $message = 'Dear,<br /><br />Please click on the below activation link to verify your account.<br /><br /> http://www.cicakcorp.com/Home/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Cicak Corp';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'srv28.niagahoster.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'cicakITS1kopma'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Mydomain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($email)
    {
        $data = array('verify' => 1);
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

}
?>