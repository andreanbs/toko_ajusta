<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Detail Pesanan <div class="btn btn-sm btn-success">No. Pesanan: <?php echo $invoice->id ?></div></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            	<table class="table table-bordered table-hover table-striped">
            
            		<tr>
            			<th>ID BARANG</th>
            			<th>NAMA PEMESAN</th>
            			<th>NAMA PRODUK</th>
            			<!-- <th>Alamat Pengiriman</th> -->
            			<!-- <th>Jasa Pengiriman</th>
            			<th>Nomor Telephon</th>
            			<th>Pilih Bank</th> -->
            			<th>JUMLAH PESANAN</th>
            			<th>HARGA SATUAN</th>
            			<th>SUB-TOTAL</th>
            		</tr>
            
            		<?php 
            		$total = 0;
            		foreach ($pesanan as $psn) :
            			$subtotal = $psn->jumlah * $psn->harga;
            			$total += $subtotal;
            		 ?>
            
            		 <tr>
            		 	<td><?php echo $psn->id_brg ?></td>
            		 	<td><?php echo $psn->nama ?></td>
            		 	<td><?php echo $psn->nama_brg ?></td>
            		 	<!-- <td><?php echo $psn->alamat_pengiriman ?></td> -->
            		 	<!-- <td><?php echo $psn->jasa_pengiriman ?></td>
            		 	<td><?php echo $psn->nomor_telephon ?></td>
            		 	<td><?php echo $psn->pilih_bank ?></td> -->
            		 	<td><?php echo $psn->jumlah ?></td>
            		 	<td><?php echo number_format($psn->harga, 0,',','.') ?></td>
            		 	<td><?php echo number_format($subtotal, 0,',','.') ?></td>
            		 </tr>
            
            		<?php endforeach; ?>
                    <tr>
                        <td align="right" colspan="5">Pajak :</td>
                        <td align="right">Rp. <?php echo number_format($pajak=$total*0.06   , 0,',','.') ?></td>
                    </tr>
        
            
            		<tr>
            			<td colspan="5" align="right">Grand Total</td>
            			<td align="right">Rp. <?php echo number_format($pajak+$total, 0,',','.') ?></td>
            		</tr>
            		
            	</table>
            
            	<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
            	<a class="btn btn-warning" target="_blank" href=" <?php echo base_url('admin/invoice/cetak_invoice/'.$invoice->id) ?>"> <i class="fa fa-file"></i> Export PDF</a>
            </div>
        </div>
    </div>


</div>	