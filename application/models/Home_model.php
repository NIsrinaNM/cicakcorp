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
		$this->db->select('profile.alamat, profile.noTelp, profile.foto');
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
}
?>