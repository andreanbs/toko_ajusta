<dvi class="container-fluid">
	<h4> Invoice Pemesanan Produk</h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Id Pesanan</th>
			<th>Nama Pemesan</th>
			<!-- <th>Alamat Pengiriman</th> -->
			<!-- <th>Jasa Pengiriman</th>
			<th>Nomor Telephon</th>
			<th>Pilih Bank</th> -->
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th>Aksi</th>
		</tr>

		<?php foreach ($invoice as $inv) : ?>
		<tr>
			<td><?php echo $inv->id ?></td>
			<td><?php echo $inv->nama ?></td>
			<!-- <td><?php echo $inv->alamat ?></td> -->
			<!-- <td><?php echo $inv->jasa_pengiriman ?></td>
			<td><?php echo $inv->nomor_telephon ?></td>			
			<td><?php echo $inv->pilih_bank ?></td> -->
			<td><?php echo $inv->tgl_pesan ?></td>
			<td><?php echo $inv->batas_bayar ?></td>
			<td><?php echo anchor('admin/invoice/detail/' .$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
		</tr>

	<?php endforeach; ?>
		
	</table>
</dvi>