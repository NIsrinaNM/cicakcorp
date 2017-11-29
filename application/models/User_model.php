<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function login_auth($usernameAdmin, $passwordAdmin) {
		$this->db->select('*');
		$this->db->where('username', $usernameAdmin);
		$this->db->where('password', $passwordAdmin);
		$this->db->from('admin');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_id($username){
		$this->db->select('profile.username AS uname ,email,nama, alamat,noTelp,foto,verify');
		// $this->db->where('user.username', $username);
		$this->db->join('profile','profile.username=user.username');
		$this->db->where('user.username',$username);
		$this->db->from('user');
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getUser() {
		$this->db->select('profile.username ,email,nama, alamat,noTelp,foto,verify');
		// $this->db->where('user.username', $username);
		$this->db->join('profile','profile.username=user.username');
		$this->db->from('user');
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function updateData($username,$data){
		$this->db->where('username',$username);
		$this->db->update('admin',$data);
	}
	public function delete($username){
		$this->db->delete('user',array('username'=>$username));
		$this->db->delete('profile', array('username'=>$username));
	}
}
?>