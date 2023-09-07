<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary"> Keranjang Belanja</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered table-striped table-hover">
        		<tr>
        			<th>No</th>
        			<th>Nama Produk</th>
        			<th>Jumlah</th>
        			<th>Harga</th>
        			<th>Sub-Total</th>
        		</tr>
        
        		<?php 
        		$no=1;
        		$total = 0;
        		foreach ($this->cart->contents() as $items) : 
        		    
        		    if($items['id_user'] != $this->session->userdata('user_id') ){
        		        continue;
        		    }
        		    $total += $items['subtotal'];
        		    ?>
                    
        			<tr>
        				<td><a href="<?php echo base_url('dashboard/hapus_keranjang/'.$items['rowid']) ?>" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a> <?php echo $no++ ?></td>
        				<td><?php echo $items['name'] ?></td>
        				<td><?php echo $items['qty'] ?></td>
        				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.')  ?></td>
        				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
        			</tr>
        			
        		<?php endforeach; ?>
                    <tr>
                        <td align="right" colspan="4">Pajak :</td>
                        <td align="right">Rp. <?php echo number_format($pajak=$total*0.06, 0,',','.') ?></td>
                    </tr>
    
        			<tr>
        				<td align="right" colspan="4">Grand Total :</td>
        				<td align="right">Rp. <?php echo number_format($pajak + $total, 0,',','.') ?></td>
        			</tr>
        		
        	</table>
        
        	<div align="right">
        		<a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
        		<a href="<?php echo base_url('dashboard') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
        		<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
        	</div>
        </div>
    </div>
</div>