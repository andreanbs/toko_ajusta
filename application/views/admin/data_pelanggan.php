<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Pelanggan</h6>
        </div>
        <div class="card-body">	<!--ini adalah class container-fluid-->
            <div class="table-responsive">
        	<!--buat table data barang-->
        	<table id="dataTable" class="table table-bordered table-hover table-striped">
        	    <thead>
            		<tr>
            			<th>NO</th>
            			<th>NAMA LENGKAP</th>
            			<th>EMAIL</th>
            			<th>NO TELP</th>
            			<th>ALAMAT</th>
            			<th>USERNAME</th>
            			<th>AKSI</th>	<!--urutannya sesuaikan dgn tb_barang database kita, AKSI tambahin colspon="3" karena bakal ada 3 aksi yaitu detail, hapis, dan edit-->
            		</tr>
        		</thead>
            	<tbody>
        		<!--buat masukin datanya dari database ke dlm halaman data_barang kita, buat pengulagan-->
            		<?php 
            		$no=1;	
            		
            		foreach($pelanggan as $plg) : 
            		    if($plg->role_id == 1){
            		        continue;
            		    }
            		?> <!-- : titik dua fungsinya buat tutup-->
            
            		<tr>
            			<td><?php echo $no++ ?></td> <!--masukin nomor dulu-->
            			<td><?php echo $plg->nama ?></td>	<!--masukin nama barang pake $brg trs samain nama field yg ada di database-->
            			<td><?php echo $plg->email ?></td>
            			<td><?php echo $plg->telp ?></td>
            			<td><?php echo $plg->alamat ?></td>
            			<td><?php echo $plg->username ?></td>
            			<td>
            			<?php echo anchor('admin/data_pelanggan/hapus/' .$plg->id, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>

                        <div class="btn btn-primary btn-sm"><i class ="fa fa-edit" data-toggle="modal" data-target="#edit_pelanggan"></i></div>
                   

                        </td>
            		</tr>

                    <!-- Modal -->
<div class="modal fade" id="edit_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT PELANGGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_pelanggan/update/'.$plg->id; ?>" method="post" enctype="multipart/form-data" >

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $plg->nama ?>">
            </div>
              
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $plg->username ?>">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $plg->email ?>">
            </div>

            
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="telpon" class="form-control" value="<?php echo $plg->telp ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $plg->alamat ?>">
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
            
            		<?php endforeach; ?>
                </tbody>
        	</table>
            </div>
        </div>
    </div>
</div>

