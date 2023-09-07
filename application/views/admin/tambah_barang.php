<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit Data Barang</h6>
        </div>
        <div class="card-body">

    	<form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data" >

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
            <option value="Baut Mur">Baut Mur</option>
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
        		<input type="file" name="userfile[]" class="form-control" accept=".jpg, .jpeg, .png" multiple />
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