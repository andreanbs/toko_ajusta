<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	
	public function index()
	{
		$this->load->view('header');
		$data= [
					'tombollogin' =>'<a class="btn btn-primary display-4" href="'.base_url().'auth">
                    <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
                        LOGIN</a>',
					'tombolprofil' =>'<a class="btn btn-primary display-4" href="'.base_url().'profil">
                    <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
                        PROFIL</a>',
									];
		// $data['tombol'] = '<a class="btn btn-primary display-4" href="'.base_url().'auth">
  //                   <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
  //                       LOGIN</a>';
		$this->load->view('navbar', $data);
        $this->load->view('homepage');
		$this->load->view('footer');
	}

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */