<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Input Data Barang</h6>
        </div>
        <div class="card-body">	<!--ini adalah class container-fluid-->
	<!--buat button tambah barang, btn-sm biar gk kegedean buttonnya, btn-primary biar warna biru, tambah icon font awasome di dalam i fa-plus dan fa-sm biar gk kegedean, mb-3 adalah margin button-->
        	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Produk Baru
        	</button>
            <div class="table-responsive">
        	<!--buat table data barang-->
        	<table id="dataTable" class="table table-bordered table-hover table-striped">
        	    <thead>
            		<tr>
            			<th>NO</th>
            			<th>NAMA BARANG</th>
            			<th>KETERANGAN</th>
            			<th>KATEGORI</th>
            			<th>HARGA</th>
            			<th>STOK</th>
            			<th>AKSI</th>	<!--urutannya sesuaikan dgn tb_barang database kita, AKSI tambahin colspon="3" karena bakal ada 3 aksi yaitu detail, hapis, dan edit-->
            		</tr>
        		</thead>
            	<tbody>
        		<!--buat masukin datanya dari database ke dlm halaman data_barang kita, buat pengulagan-->
            		<?php 
            		$no=1;	
            		
            		foreach($barang as $brg) : ?> <!-- : titik dua fungsinya buat tutup-->
            
            		<tr>
            			<td><?php echo $no++ ?></td> <!--masukin nomor dulu-->
            			<td><?php echo $brg->nama_brg ?></td>	<!--masukin nama barang pake $brg trs samain nama field yg ada di database-->
            			<td><?php echo $brg->keterangan ?></td>
            			<td><?php echo $brg->kategori ?></td>
            			<td><?php echo $brg->harga ?></td>
            			<td><?php echo $brg->stok ?></td>
            			<td> <!--detail pake font awasome yaitu fas fa-search-plus-->
            			<?php echo anchor('admin/data_barang/detail/' .$brg->id_brg, '<div class="btn btn-success btn-sm"><i class ="fa fa-search-plus"></i></div>') ?>
            			<?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
            			<?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?></td>
            		</tr>
            
            		<?php endforeach; ?>
                </tbody>
        	</table>
        	</div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK BARU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/data_barang/tambah_aksi'); ?>" method="post" enctype="multipart/form-data" >

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
            <option value="Alat Pertukangan">Alat Pertukangan</option>
            <option value="Van Belt Mitsuboshi">Perlengkapan Safety</option>
            <option value="Van Belt Mitsuboshi">Van Belt Mitsuboshi</option>
            <option value="Bearing Laher">Bearing Laher</option>
            <option value="Electrical">Electrical</option>  
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
        		<input type="file" name="gambar" class="form-control" accept=".jpg, .jpeg, .png" />
        	</div>

        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </div>

      </form>
	</div>
  </div>
</div>