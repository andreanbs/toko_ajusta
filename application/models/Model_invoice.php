<?php 

class Model_invoice extends CI_Model{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$jasa_kirim	= $this->input->post('jasa_kirim');
		$bank	= $this->input->post('bank');
        $telp 	= $this->input->post('no_telp');
        $id     = $this->session->userdata('user_id');
        $gambar = $_FILES['gambar']['name'];
        $status = 'Menunggu';
        
        if( $gambar != ''){
            $image = $id.date('YmdHis').'.png'; 
            $config ['upload_path'] = './uploads/bukti';
    	    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
    	    $config ['file_name'] = $image;
    		$this->load->library('upload', $config);
    		if($this->upload->do_upload('gambar')){
    			$gambar = $image; 
    			$invoice = array(
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'jasa_pengiriman' => $jasa_kirim,
			'nomor_telephon' => $telp,
			'pilih_bank'    => $bank,
			'tgl_pesan'		=> date('Y-m-d H:i:s'),
			'batas_bayar'	=> date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
			'id_user' => $id,
			'bukti_transfer' => $gambar,
			'status' => $status
		);
		$this->db->insert('tb_pesanan', $invoice);
		$id_pesanan = $this->db->insert_id();

		foreach ($this->cart->contents() as $item){
		    if($item['id_user'] != $this->session->userdata('user_id') ){
        	      continue;
            }
			$data = array(
				'id_pesanan'		=> $id_pesanan,
				'id_brg'			=> $item['id'],
				'nama_brg'			=> $item['name'],
				'jumlah'			=> $item['qty'],
				'harga'				=> $item['price'],
				'id_user'           => $id
			);
			$this->db->insert('tb_detail_pesanan', $data);
		}

		return TRUE;
    		}else{
    		    return false;
    		}
        }
		
		
	}

	public function tampil_data()
	{
		$result = $this->db->get('tb_pesanan');
			return $result->result();
		
	}

	public function filter($status)
	{
		$this->db->select('*');
        $this->db->from('tb_pesanan');
		$result = $this->db->where('status', $status)->get();
			return $result->result();
		
	}

	public function filter_jumlah($status)
	{
		$this->db->select('*');
        $this->db->from('tb_pesanan');
		$result = $this->db->where('status', $status)->get();
			return $result;
		
	}

	public function ambil_id_pesanan($id_pesanan)
	{
	    $this->db->select('*');
        $this->db->from('tb_pesanan');
		$result = $this->db->where('id', $id_pesanan)->limit(1)->get();
			return $result->row();
		
	}

	public function ambil_id_detail_pesanan($id_pesanan)
	{
	    $this->db->select('tb_detail_pesanan.*, tb_pesanan.nama');
        $this->db->from('tb_detail_pesanan');
	    $this->db->join('tb_pesanan', 'tb_pesanan.id = tb_detail_pesanan.id_pesanan', 'left');
		$result = $this->db->where('tb_detail_pesanan.id_pesanan', $id_pesanan)->get();
			return $result->result();
		
	}

	public function konfirmasi($id,$param)
	{
		$this->db->where('id', $id);
		return $this->db->update('tb_pesanan',$param);
	}



	public function jumlah_penjualan($tanggal){
      $this->db->select('sum(tb_detail_pesanan.harga)');
      $this->db->from('tb_pesanan');
      $this->db->join('tb_detail_pesanan','tb_detail_pesanan.id_pesanan = tb_pesanan.id');      
      return $this->db->where('tb_pesanan.tgl_pesan' , $tanggal)->get();

   }
	
}
