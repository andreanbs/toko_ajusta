<?php

class Model_kategori extends CI_Model{

	public function data_alat_pertukangan(){
		return $this->db->get_where("tb_barang",array('kategori' => 'alat pertukangan'));
	}

	public function data_perlengkapan_safety(){
		return $this->db->get_where("tb_barang",array('kategori' => 'perlengkapan safety'));
	}

	public function data_van_belt_mitsuboshi(){
		return $this->db->get_where("tb_barang",array('kategori' => 'van belt mitsuboshi'));
	}

	public function data_bearing_laher(){
		return $this->db->get_where("tb_barang",array('kategori' => 'bearing laher'));
	}

	public function data_electrical(){
		return $this->db->get_where("tb_barang",array('kategori' => 'electrical'));
	}
}