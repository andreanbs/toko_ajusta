<?php 

class Data_pelanggan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
        $this->load->model("model_pelanggan");
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
	    $menu['menu'] = 'pelanggan';
	    $status = 'Menunggu';
		$data['pelanggan'] = $this->model_pelanggan->tampil_data()->result();
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar',$menu);
		$this->load->view('admin/data_pelanggan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg		= $this->input->post('nama_brg');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');
		$gambar			= $_FILES['gambar']['name'];
		if ($gambar =''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar gagal di Upload!";
			}else {
				$gambar=$this->upload->data('file_name');
			}
		}

		$data = array (
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_pelanggan/index');
	}

	public function update($id){
		$nama_lengkap 			= $this->input->post('nama_lengkap');
		$email 					= $this->input->post('email');
		$no_telp 				= $this->input->post('telpon');
		$alamat 				= $this->input->post('alamat');
		$username 				= $this->input->post('username');
		$password 				= md5($this->input->post('password'));
		$role_id 				= '2';
		
		$data = array(

			'nama'		=> $nama_lengkap,
			'username'	=> $username,
			'password'		=> $password,
			'role_id'			=> $role_id,
			'telp'			=> $no_telp,
			'email'			=> $email,
			'alamat'		=> $alamat,	
		);

		$where = array(
			'id' => $id
		);

		$this->model_pelanggan->update_data($where,$data,'tb_user');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Pelanggan Berhasil Diubah
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('admin/data_pelanggan/index');
	}

	public function hapus ($id)
	{
		$where = array('id' => $id);
		$this->model_pelanggan->hapus_data($where, 'tb_user');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Pelanggan Berhasil Dihapus
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('admin/data_pelanggan');
	}

	public function detail_barang ($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->detail_brg($where, 'tb_barang');
		redirect('admin/data_barang');
	}

	public function pdf(){
		$this->load->library('dompdf_gen');

		$data['detail_invoice'] = $this->model_barang->tampil_data('tb_detail_pesanan')->result();

		$this->load->view('laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment' =>0));
	}

}