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
		$this->db->select('profile.alamat, profile.noTelp, profile.foto, profile.prop, profile.kotkab, profile.kec, profile.kodepos, user.email');
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

}
?>