<?php 

class Data_barang extends CI_Controller{
	
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
	    $menu['menu'] = 'barang';
	    $status = 'Menunggu';
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
	        
	        $nama_brg		= $this->input->post('nama_brg');
    		$keterangan		= $this->input->post('keterangan');
    		$kategori		= $this->input->post('kategori');
    		$harga			= $this->input->post('harga');
    		$stok			= $this->input->post('stok');
            $config['upload_path'] = './uploads/'; // Folder tempat menyimpan gambar
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis-jenis file yang diizinkan
            $config['file_name'] = ''.md5($nama_brg).date('YmdHis').'.png';
            $this->load->library('upload', $config); 
            // $this->upload->initialize($config); 
            
            $image_names = md5($nama_brg).date('YmdHis').'.png';
                

            // Setelah unggahan selesai, simpan array nama gambar ke database
            if ($this->upload->do_upload('gambar')) {
                
                $data = array (
        			'nama_brg'		=> $nama_brg,
        			'keterangan'	=> $keterangan,
        			'kategori'		=> $kategori,
        			'harga'			=> $harga,
        			'stok'			=> $stok,
        			'gambar'		=> $image_names
        		);
        
        		$this->model_barang->tambah_barang($data, 'tb_barang');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Barang Berhasil Ditambahkan
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Barang Gagal Ditambahkan
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
            }
        
		redirect('admin/data_barang/index');
	}

	public function edit($id) 
	{
	    $menu['menu'] = 'barang';
		$where = array('id_brg' =>$id);
	    $status = 'Menunggu';
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$data['album'] = $this->model_barang->edit_barang($where, 'tb_album_barang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}
	
	public function detail($id) 
	{
	    $menu['menu'] = 'barang';
		$where = array('id_brg' =>$id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
	    $status = 'Menunggu';
		$menu['jumlah_menunggu'] = $this->model_invoice->filter_jumlah($status)->num_rows();
		$data['album'] = $this->model_barang->edit_barang($where, 'tb_album_barang')->result_array();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $menu);
		$this->load->view('admin/detail_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update(){
	    $this->load->helper('file');
		$id 			= $this->input->post('id_brg');
		$nama_brg 		= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 		= $this->input->post('kategori');
		$harga 			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');
		$gambar         = $_FILES['gambar']['name'];
		if( $gambar == ''){
		    $data = array(

			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
		);
		
		}else{
		    $gambar_lama	= $this->input->post('gambar_lama');
		    $path = './uploads/';
		    if(file_exists($path.$gambar_lama)){
                unlink($path.$gambar_lama);
            } 
		    $image_names = md5($nama_brg).date('YmdHis').'.png';
            
		    $config['upload_path'] = $path; // Folder tempat menyimpan gambar
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis-jenis file yang diizinkan
            $config['file_name'] = ''.md5($nama_brg).date('YmdHis').'.png';
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
            $this->upload->do_upload('gambar');
            
            $data = array (
        			'nama_brg'		=> $nama_brg,
        			'keterangan'	=> $keterangan,
        			'kategori'		=> $kategori,
        			'harga'			=> $harga,
        			'stok'			=> $stok,
        			'gambar'		=> $image_names
        		);
        
        	
		}

		$where = array(
			'id_brg' => $id
		);
		
		$update = $this->model_barang->update_data($where,$data,'tb_barang');
		if($update) {
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Barang Berhasil Diubah
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Barang Gagal Diubah
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
            }
		
		
		redirect('admin/data_barang/index');
	}

	public function hapus ($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Barang Berhasil Dihapus
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
		redirect('admin/data_barang');
	}
	public function hapus_galeri ($id)
	{
	    $this->load->helper('file');
		$where = array('id_album' => $id);
		$data = $this->model_barang->edit_barang($where, 'tb_album_barang')->result();
		if(file_exists('./uploads/galeri/'.$data[0]->gambar)){
                unlink('./uploads/galeri/'.$data[0]->gambar);
        } 
		$this->model_barang->hapus_data($where, 'tb_album_barang');
		return redirect('admin/data_barang/edit/'.$data[0]->id_brg); 
	}


	public function detail_barang ($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->detail_brg($where, 'tb_barang');
		redirect('admin/data_barang');
	}

	public function pdf(){
		$this->load->library('dompdf_gen');

		$data['detail_invoice'] = $this->model_barang->tampil_data('tb_pesanan')->result();

		$this->load->view('laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment' =>0));
	}
	
	
	
	
    public function do_upload()
    {
    
        $files = $_FILES['userfile'];
        $id_brg = $this->input->post('id_brg');
        $images = array();
        $i = 0;
        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];
            $title = ''.$id_brg.md5(date('YmdHis').$i++).'.png';

            $images[] = $title;

            $config = array(
            'upload_path'   => './uploads/galeri/',
            'allowed_types' => 'jpg|gif|png|jpeg',
            'file_name'     => $title
            );
            
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $data = array (
            			'id_brg'	=> $this->input->post('id_brg'),
            			'gambar'    => $title
            		);
            		
                    // Simpan data ke database
                    $this->model_barang->tambah_barang($data, 'tb_album_barang');
              
            }
        }

        return redirect('admin/data_barang/edit/'.$id_brg); 
            // Redirect ke halaman setelah upload berhasil
            
        
    }
}