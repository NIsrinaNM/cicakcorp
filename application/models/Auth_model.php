<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function login_auth($usernameAdmin, $passwordAdmin) {
		$this->db->select('*');
		$this->db->where('username', $usernameAdmin);
		$this->db->where('password', $passwordAdmin);
		$this->db->from('admin');
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result_array();
		}
		else{
			return false;
		}
	}
}
?>