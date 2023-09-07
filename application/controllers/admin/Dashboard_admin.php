<?php 

class Dashboard_admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
        $this->load->model("model_pelanggan");
        $this->load->model("model_barang");
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
	    $menu['menu'] = 'dashboard';
	    $status = 'Menunggu';
	    $data['barang'] = $this->model_barang->tampil_data()->num_rows();
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
	    $data['pelanggan'] = $this->model_pelanggan->tampil_data()->num_rows();
	    $tahun = date('Y');
	    $jan = '-01';
	    $feb = '-02';
	    $mar = '-03';
	    $apr = '-04';
	    $mei = '-05';
	    $jun = '-06';
	    $jul = '-07';
	    $aug = '-08';
	    $sep = '-09';
	    $okt = '-10';
	    $nov = '-11';
	    $des = '-12';

	    $tanggal = '2023-08-08 15:39:25';

	    //$data['jumlah_penjualan'] = $this->model_invoice->jumlah_penjualan($tanggal);

	    $data['jumlah_penjualan1'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$jan%'")->row();

	    $data['jumlah_penjualan2'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$feb%'")->row();

	    $data['jumlah_penjualan3'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$mar%'")->row();

	    $data['jumlah_penjualan4'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$apr%'")->row();

	    $data['jumlah_penjualan5'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$mei%'")->row();


	    $data['jumlah_penjualan6'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$jun%'")->row();

	    $data['jumlah_penjualan7'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$jul%'")->row();

	    $data['jumlah_penjualan8'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$aug%'")->row();

	    $data['jumlah_penjualan9'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$sep%'")->row();

	    $data['jumlah_penjualan10'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$okt%'")->row();

	    $data['jumlah_penjualan11'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$nov%'")->row();

	     $data['jumlah_penjualan12'] = $this->db->query("SELECT SUM(harga) as hitung FROM tb_pesanan JOIN tb_detail_pesanan ON tb_detail_pesanan.id_pesanan = tb_pesanan.id WHERE tgl_pesan LIKE '%$tahun$des%'")->row();

        
        
	    

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}
}