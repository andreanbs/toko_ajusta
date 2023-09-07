<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Pembayaran</h6>
        </div>
        <div class="card-body">

        	<div class="row">
        		<div class="col-md-2"></div>
        		<div class="col-md-8">
        			<div class="btn btn-sm btn-success">
        				<?php 
        				$grand_total = 0;
        				if ($keranjang = $this->cart->contents())
        				{
        					foreach ($keranjang as $item)
        					{
        					    
                		    if($item['id_user'] != $this->session->userdata('user_id') ){
                		        continue;
                		    }
        						$grand_total = $grand_total + $item['subtotal'];
        					}
        
        				echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total + $grand_total*0.06, 0,',','.');
        				 ?>
        			</div>
        			<br>
        			<br>
        
        			<h3>Input Alamat Pengiriman dan Pembayaran</h3>
        
        			<form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?> " enctype="multipart/form-data">
        
        				<div class="form-group">
        					<label>Nama Lengkap</label>
        					<input type="text" name="nama" value="<?= $user['nama'] ?>" placeholder="Nama Lengkap Anda" class="form-control" required>
        				</div>
        
        				<div class="form-group">
        					<label>Alamat Lengkap</label>
        					<textarea name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required><?= $user['alamat'] ?></textarea>
        				</div>
        
        				<div class="form-group">
        					<label>No. Telepon</label>
        					<input type="text" name="no_telp" value="<?= $user['telp'] ?>" placeholder="Nomor Telepon Anda" class="form-control" required>
        				</div>
        
        				<div class="form-group">
        					<label>Jasa Pengiriman</label>
        					<select class="form-control" name="jasa_kirim">
        						<option value="JNE">JNE</option>
        						<option value="TIKI">TIKI</option>
        						<option value="POS Indonesia">POS Indonesia</option>
        						<option value="GOJEK">GOJEK</option>
        						<option value="GRAB">GRAB</option>
        					</select>
        				</div>
        
        				<div class="form-group">
        					<label>Pilih Bank</label>
        					<select class="form-control" name="bank">
        						<option >BCA - 23012910</option>
        						<option >BNI - 290000</option>
        						<option >BRI - 123131</option>
        						<option >MANDIRI - 29101298</option>
        					</select>
        				</div>
        				<div class="form-group">
                    		<label>Bukti Transfer (jpg/png)</label><br>
                    		<input type="file" name="gambar" class="form-control" accept=".png, .jpeg, .jpg" required>
                    	</div>
        				<button type="submit" class="btn btn-sm btn-success mb-3">Pesan</button>
        
        				<br> <?php echo anchor('dashboard','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
        
        			</form>
        
        			<?php
        		}	else
        		{
        			echo "<h4>Keranjang Belanja Anda Masih Kosong";
        		}
        			  ?>
        		</div>
        
        
        		<div class="col-md-2"></div>
        	</div>
        </div>
    </div>
</div>