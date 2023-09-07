<div class="container-fluid">
	<h5 calss="card-header"> Detail Produk</h5>
	<div class="card">
		
		<div class="card-body">

			
			<div class="row">
				<div class="col-md-4">
				        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                foreach ($album as $key => $value) {
                                    $active = ($key == 0) ? 'active' : '';
                                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                                } ?>
                            </ol>
                          <div class="carousel-inner">
                            <?php
                            foreach ($album as $key => $value) {
                                $active = ($key == 0) ? 'active' : '';
                                echo '<div class="carousel-item ' . $active . '"><img src="' . base_url() . '/uploads/galeri/'.$value['gambar'].'"style="height:300px;width:100%;object-position: center;object-fit: cover;" alt="…"></div>';
                            }
                            ?>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" 
                          data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
				    
				    
				    
			
				</div>
				<?php foreach($barang as $brg): ?>
				<div class="col-md-8">
					<table class="table">
						<tr>
							<td>Nama Produk</td>
							<td><strong><?php echo $brg->nama_brg ?></strong></td>
						</tr>

						<tr>
							<td>Keterangan</td>
							<td><strong><?php echo nl2br($brg->keterangan) ?></strong></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td><strong><?php echo $brg->kategori ?></strong></td>
						</tr>

						<tr>
							<td>Stok</td>
							<td><strong><?php echo $brg->stok ?></strong></td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg-> harga,0,',','.')  ?></div></strong></td>
						</tr>
					</table>

			
					<?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
					<?php echo anchor('dashboard','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>