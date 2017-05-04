<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function login_user($usernameUser, $passwordUser) {
		$this->db->select('*');
		$this->db->where('username', $usernameUser);
		$this->db->where('password', $passwordUser);
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
		if ($hasil) {
			return true;
		}else{return false;}
		// return $hasil;
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
}
?>