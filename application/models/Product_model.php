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
	function getData($tabel){
		$query = $this->db->select('*')
			->from($tabel)->get();
		return $query->result();
	}
	function delete($tabel,$id){
		$this->db->where('id',$id);
		$this->db->delete($tabel);
	}
	function update($kode,$data){
		$this->db->where('kode',$kode);
		$this->db->update('jualan',$data);
	}
}
?>