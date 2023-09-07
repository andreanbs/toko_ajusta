<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Pesanan Produk</h6>
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
                        <th>Bukti Transfer</th>
            			<th>Status</th>
            			<th>Aksi</th>
            		</tr>
            	</thead>
            	<tbody>
        
            		<?php foreach ($invoice as $inv) : 
            		    if(empty($inv->nama)) {
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
            			<td><?php echo anchor('admin/invoice/detail/' .$inv->id, '<div class="btn btn-sm btn-primary" title="Detail"><i class ="fa fa-search-plus"></i></div>') ?>
                            <?php if($inv->status == 'Menunggu'){ ?>
                            <?php echo anchor('admin/invoice/proses_pesanan/' .$inv->id, '<div class="btn btn-sm btn-success" title="Proses"><i class ="fa fa-check"></i></div>') ?>
                           <?php } ?>
                           <br/>
                           <?php if($inv->status == 'Menunggu'){ ?>
                            <?php echo anchor('admin/invoice/batalkan_pesanan/' .$inv->id, '<div class="btn btn-sm btn-danger" title="Batalkan"><i class ="fa fa-trash"></i></div>') ?>
                           <?php } ?>
            			    
            			</td>
            		</tr>
            
            	<?php endforeach; ?>
        		</tbody>
        	</table>
        	</div>
        </div>
    </div>
</div>