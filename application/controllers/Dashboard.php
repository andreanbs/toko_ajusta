<?php 
ob_start();
class dashboard extends CI_Controller{

		public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('role_id') != '2'){
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
	    if(!$this->input->get('search')){
		    $data['barang'] = $this->model_barang->tampil_data()->result();
	    }else{
	        $data['barang'] = $this->model_barang->tampil_data($this->input->get('search'))->result();
		
	    }
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $menu);
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_ke_keranjang($id)
	{
	        $barang = $this->model_barang->find($id);
	        

		$data = array(
		    'rowid'     => md5($barang->id_brg.$barang->harga.$barang->nama_brg.$this->session->userdata('user_id')),
			'id'		=> $barang->id_brg,
			'qty'		=> 1,
			'price'		=> $barang->harga,
			'name'		=> $barang->nama_brg,
			'id_user'   => $this->session->userdata('user_id') 
	);

	$this->cart->insert($data);
	redirect('dashboard');

	}

	public function detail_keranjang()
	{
	    $menu['menu'] = 'keranjang';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $menu);
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang($rowid = null)
	{
	    if($rowid == NULL){
		    $this->cart->destroy();
		    redirect('dashboard');
	    }else{
            $this->cart->remove($rowid);
            $total = 0;
            foreach ($this->cart->contents() as $items) {
        		    if($items['id_user'] != $this->session->userdata('user_id') ){
        		        continue;
        		    }
        		    $total += $items['subtotal'];
	        }
            
            if($total > 0){
                redirect('/dashboard/detail_keranjang', 'refresh');
            }else{
                redirect('dashboard');
            }
            
        }
	}

	public function pembayaran()
	{
	    $menu['menu'] = 'pembayaran';
	    $data['user'] = $this->model_auth->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
	    $this->load->helper('url');
		$is_processed = $this->model_invoice->index();
		if($is_processed){
		    $this->cart->destroy();
		    $menu['menu'] = 'pesanan';
		    $this->load->view('templates/header');
    		$this->load->view('templates/sidebar',$menu);
    		$this->load->view('templates/footer');
		    $this->load->view('proses_pesanan');	
		} else {
			echo "<script>alert('Maaf, Pesanan Anda Gagal diproses!'); </script>";
			return redirect('/dashboard/pembayaran', 'refresh');
		}
		
	}


	public function detail($id_brg)
	{
	    $menu['menu'] = 'detail';
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$where = array('id_brg' =>$id_brg);
		$data['album'] = $this->model_barang->edit_barang($where, 'tb_album_barang')->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('detail_barang',$data);
		$this->load->view('templates/footer');
	}
	
	
	public function riwayat_belanja()
	{
	    $menu['menu'] = 'riwayat';
		$data['invoice'] = $this->model_invoice->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('riwayat_belanja',$data);
		$this->load->view('templates/footer');
	}

	public function detail_belanja($id_pesanan)
	{
	    $menu['menu'] = 'belanja';
		$data['invoice'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
		$data['pesanan'] = $this->model_invoice->ambil_id_detail_pesanan($id_pesanan);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$menu);
		$this->load->view('detail_belanja',$data);
		$this->load->view('templates/footer');
	}
	
	public function konfirmasi ($id)
	{
		$param = array(
			'status' => 2,
		);
		$this->model_invoice->konfirmasi($id, $param);
		redirect('dashboard/riwayat_belanja');
	    
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
        
		$html = $this->load->view('laporan_invoice',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    
	}

	public function terima_pesanan ($id)
	{
		$param = array(
			'status' => 'Diterima',
		);
		$this->model_invoice->konfirmasi($id, $param);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pesanan Telah Diterima
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('dashboard/riwayat_belanja');
	    
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
		redirect('dashboard/riwayat_belanja');
	    
	}
	
}


