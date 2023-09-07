<?php

class Kategori extends CI_Controller{

	public function alat_pertukangan()
	{
	    $menu['menu'] = 'tukang';
		$data['alat_pertukangan'] = $this->model_kategori->data_alat_pertukangan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('alat_pertukangan',$data);
		$this->load->view('templates/footer');
	}

	public function perlengkapan_safety()
	{
	    $menu['menu'] = 'perlengkapan_safety';
		$data['perlengkapan_safety'] = $this->model_kategori->data_perlengkapan_safety()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('perlengkapan_safety',$data);
		$this->load->view('templates/footer');
	}

	public function van_belt_mitsuboshi()
	{
	    $menu['menu'] = 'van_belt_mitsuboshi';
		$data['van_belt_mitsuboshi'] = $this->model_kategori->data_van_belt_mitsuboshi()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('van_belt_mitsuboshi',$data);
		$this->load->view('templates/footer');
	}

	public function bearing_laher()
	{
	    $menu['menu'] = 'bearing';
		$data['bearing_laher'] = $this->model_kategori->data_bearing_laher()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('bearing_laher',$data);
		$this->load->view('templates/footer');
	}

	public function electrical()
	{
	    $menu['menu'] = 'elektrik';
		$data['electrical'] = $this->model_kategori->data_electrical()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('electrical',$data);
		$this->load->view('templates/footer');
	}
}