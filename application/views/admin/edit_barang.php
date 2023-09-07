<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Edit Data Barang</h6>
                </div>
                <div class="card-body">
        
            	<?php foreach($barang as $brg) : ?>
            
            
            		<form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>" enctype="multipart/form-data">
            
            			<div class="for-group">
            				<label>Nama Barang</label>
            				<input type="text" name="nama_brg" class="form-control"
            				value="<?php echo $brg->nama_brg ?>">
            			</div>
            
            			<div class="for-group">
            				<label>Keterangan</label>
            				<input type="hidden" name="id_brg" class="form-control"
            				value="<?php echo $brg->id_brg ?>">
            				<textarea name="keterangan" class="form-control"
            				><?php echo $brg->keterangan ?></textarea>
            			</div>
            
            			<div class="for-group">
            				<label>Kategori</label>
            				<input type="text" name="kategori" class="form-control"
            				value="<?php echo $brg->kategori ?>">
            			</div>
            
            			<div class="for-group">
            				<label>Harga</label>
            				<input type="text" name="harga" class="form-control"
            				value="<?php echo $brg->harga ?>">
            			</div>
            
            			<div class="for-group">
            				<label>Stok</label>
            				<input type="text" name="stok" class="form-control"
            				value="<?php echo $brg->stok ?>">
            			</div>
            			<div class="form-group">
                    		<label>Gambar Produk</label><br>
                    		<input type="hidden" name="gambar_lama" value="<?= $brg->gambar ?>">
                    		<input type="file" name="gambar" class="form-control" accept=".jpg, .jpeg, .png" />
                    	</div>

            
            			<button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan</button>
            			<?php echo anchor('admin/data_barang','<div class="btn btn-sm btn-danger mt-3">Kembali</div>') ?>
            			
            		</form>
            
            
            	<?php endforeach; ?>
            	</div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Galeri Foto Barang</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/data_barang/do_upload'); ?>" method="post" enctype="multipart/form-data" >
                    	<div class="form-group">
                    		<label>Upload Gambar</label><br>
                    		<input type="hidden" name="id_brg" value="<?php echo $barang[0]->id_brg ?>">
                    		<input type="file" name="userfile[]" class="form-control" accept=".jpg, .jpeg, .png" multiple />
                    	</div>
            
            			<button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan</button>
            			<?php echo anchor('admin/data_barang','<div class="btn btn-sm btn-danger mt-3">Kembali</div>') ?>
            			
            		</form>
            		<div class="mt-5">
            		<div class="table-responsive">
        	<!--buat table data barang-->
        	<table id="dataTable" class="table table-bordered table-hover table-striped" data-searching="false">
        	    <thead>
            		<tr>
            			<th>NO</th>
            			<th>Gambar</th>
            			<th>AKSI</th>	<!--urutannya sesuaikan dgn tb_barang database kita, AKSI tambahin colspon="3" karena bakal ada 3 aksi yaitu detail, hapis, dan edit-->
            		</tr>
        		</thead>
            	<tbody>
        		<!--buat masukin datanya dari database ke dlm halaman data_barang kita, buat pengulagan-->
            		<?php 
            		$no=1;	
            		
            		foreach($album as $alb) : ?> <!-- : titik dua fungsinya buat tutup-->
            
            		<tr>
            			<td><?php echo $no++ ?></td> <!--masukin nomor dulu-->
            			<td style="text-align:center"><?php if(!empty($alb->gambar)) { ?> <a href="<?php echo base_url().'/uploads/galeri/'.$alb->gambar ?>" target="_blank"><img style="max-width:50px !important" src="<?php echo base_url().'/uploads/galeri/'.$alb->gambar ?>"></a> <?php } ?></td>
            			<td> <!--detail pake font awasome yaitu fas fa-search-plus-->
            			<?php echo anchor('admin/data_barang/hapus_galeri/' .$alb->id_album, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?></td>
            		</tr>
            
            		<?php endforeach; ?>
                </tbody>
        	</table>
        	</div>
            	</div>
            	</div>
            </div>
            </div>
        </div>
    </div>
</div>