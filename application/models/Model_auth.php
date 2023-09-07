<?php

class Model_auth extends CI_Model{

	public function cek_login()
	{
		$username	= set_value('username');
		$password	= md5(set_value('password'));

		$result	= $this->db->where('username',$username)
							   ->where('password',$password)
							   ->limit(1)
							   ->get('tb_user');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
	public function user(){
	    $id = $this->session->userdata('user_id');
	    return $this->db->get_where('tb_user', ["id" => $id])->row_array();
	}
}