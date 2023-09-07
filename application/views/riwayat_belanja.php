<div class="container-fluid">
  <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Riwayat Belanja</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            	<table id="dataTable" class="table table-bordered table-hover table-striped">
            	    <thead>
                		<tr>
                			<th>Id Pesanan</th>
                			<th>Nama Pemesan</th>
                			<th>Alamat Pengiriman</th>
                			<th>Jasa Pengiriman</th>
                			<th>Nomor Telephon</th>
                			<th>Pilih Bank</th>
                			<th>Tanggal Pemesanan</th>
                      <th>Bukti transfer</th>
                			<th>Status</th>
                			<th>Aksi</th>
                		</tr>
                	</thead>
                	<tbody>
            
                		<?php foreach ($invoice as $inv) :
                		    if($inv->id_user != $this->session->userdata('user_id') ){
                		        continue;
                		    }
                		    ?>
                		<tr>
                			<td><?php echo $inv->id ?></td>
                			<td><?php echo $inv->nama ?></td>
                			<td><?php echo $inv->alamat ?></td>
                			<td><?php echo $inv->jasa_pengiriman ?></td>
                			<td><?php echo $inv->nomor_telephon ?></td>			
                			<td><?php echo $inv->pilih_bank ?></td>
                			<td><?php echo $inv->tgl_pesan ?></td>
                			 <td style="text-align:center"><?php if(!empty($inv->bukti_transfer)) { ?> <a href="<?php echo base_url().'/uploads/bukti/'.$inv->bukti_transfer ?>" target="_blank"><img style="max-width:50px !important" src="<?php echo base_url().'/uploads/bukti/'.$inv->bukti_transfer ?>"></a> <?php } ?></td>
                      <td><?php echo $inv->status ?></td>

                			<td>
                			    <a class="btn btn-sm btn-primary" title="Detail" href="<?php echo base_url('dashboard/detail_belanja/' .$inv->id) ?>" ><i class ="fa fa-search-plus"></i></a>
                          <?php if($inv->status == 'Dikirim'){ ?>
                            <?php echo anchor('dashboard/terima_pesanan/' .$inv->id, '<div class="btn btn-sm btn-success" title="Diterima"><i class ="fa fa-check"></i></div>') ?>
                           <?php } ?>

                           <?php if($inv->status == 'Menunggu'){ ?>
                            <?php echo anchor('dashboard/batalkan_pesanan/' .$inv->id, '<div class="btn btn-sm btn-danger" title="Batalkan"><i class ="fa fa-trash"></i></div>') ?>
                           <?php } ?>
                			    
                		</tr>
                
                	<?php endforeach; ?>
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" >

        	<div class="form-group">
        		<label>Nama Barang</label>
        		<input type="text" name="nama_brg" class="form-control">
        	</div>
        	  
        	<div class="form-group">
        		<label>Keterangan</label>
        		<textarea type="text" name="keterangan" class="form-control"></textarea>
        	</div>
        	
        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
            <!-- <option>Elektronik</option> -->
            <option>Alat Pertukangan</option>
            <option>Baut Mur</option>
            <option>Bearing Laher</option>
            <option>Electrical</option>  
            </select>
        	</div>

        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>  

        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Gambar Produk</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>

        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
	</div>
  </div>
</div>