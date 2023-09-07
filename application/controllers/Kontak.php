<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('header');
		$data= [
					'tombollogin' =>'<a class="btn btn-primary display-4" href="'.base_url().'auth">
                    <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
                        LOGIN</a>',
					'tombolprofil' =>'<a class="btn btn-primary display-4" href="'.base_url().'profil">
                    <span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
                        PROFIL</a>',
                        'iduser' => $this->session->userdata('id_user')
				];
        $this->load->view('navbar', $data);        
        $this->load->view('kontak', $data);
		$this->load->view('footer');
		} else {
			
			$file = [
				'id_user' => $this->session->userdata('id_user'),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'pesan' => htmlspecialchars($this->input->post('pesan', true)),

				];
				// var_dump($file);
			$this->db->insert('bug', $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success col-12">Berhasil dikirim Mohon Tunggu pesan berikutnya!</div>');
			redirect('homepage');
		}
	}

	public function berlangganan()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')] )->row_array();
		if ($user['email'] == $this->session->userdata('email')) {
			$data =[
			'subscribe' => 1,
			'email' => htmlspecialchars($this->input->post('email', true))
		];	
		$kondisi = ['email' => $this->input->post('email')];
		 $this->Global_m->updatedata($kondisi, 'user', $data);
		 redirect('kontak');
		}
		redirect('kontak');
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */