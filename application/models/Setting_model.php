<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function tambah($tabel,$data) {
		$this->db->insert($tabel,$data);
	}

	public function getAllData($where){
		$query = $this->db->select('*')
			->from('setting')
			->where('jenis',$where)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function updateData($username,$data){
		$this->db->update('admin',$data);
		$this->db->where('username',$username);
	}
	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('setting');
	}
}
?>