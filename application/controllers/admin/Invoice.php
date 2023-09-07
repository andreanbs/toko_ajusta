<?php 

class Invoice extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Anda Belum Login!
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('auth');
		}
	}

	public function index()
	{
	    $menu['menu'] = 'invoice';
		$data['invoice'] = $this->model_invoice->tampil_data();
	    $status = 'Menunggu';
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/invoice',$data);
		$this->load->view('templates_admin/footer');
	}

	public function filter()
	{
	    $menu['menu'] = 'invoice';
	    $status = 'Menunggu';
		$data['invoice'] = $this->model_invoice->filter($status);
	    $status = 'Menunggu';
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/invoice',$data);
		$this->load->view('templates_admin/footer');
	}

	public function detail($id_pesanan)
	{
	    $menu['menu'] = 'invoice';
		$data['invoice'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
		$data['pesanan'] = $this->model_invoice->ambil_id_detail_pesanan($id_pesanan);
	    $status = 'Menunggu';
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/detail_invoice',$data);
		$this->load->view('templates_admin/footer');
	}
	
	public function konfirmasi ($id)
	{
		$param = array(
			'status' => 1,
		);
		$this->model_invoice->konfirmasi($id, $param);
		redirect('admin/invoice');
	    
	}

	public function cetak_invoice($id_pesanan){
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $data['title_pdf'] = 'Laporan Penjualan Toko Ajusta Tirtamas';
		$data['invoice'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
		$data['pesanan'] = $this->model_invoice->ambil_id_detail_pesanan($id_pesanan);
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_ajusta_tirtamas';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('admin/laporan_invoice',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    
	}

	public function proses_pesanan ($id)
	{
		$param = array(
			'status' => 'Dikirim',
		);
		$this->model_invoice->konfirmasi($id, $param);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pesanan Berhasil Diproses
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('admin/invoice');
	    
	}

	public function batalkan_pesanan ($id)
	{
		$param = array(
			'status' => 'Dibatalkan',
		);
		$this->model_invoice->konfirmasi($id, $param);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Pesanan Berhasil Dibatalkan
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('admin/invoice');
	    
	}
}

