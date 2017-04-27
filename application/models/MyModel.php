<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

	public function login_auth($usernameAdmin, $passwordAdmin) {
		$this->db->select('*');
		$this->db->where('username', $usernameAdmin);
		$this->db->where('password', $passwordAdmin);
		$this->db->from('admin');
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		}
		else{
			return false;
		}
	}
}
?>