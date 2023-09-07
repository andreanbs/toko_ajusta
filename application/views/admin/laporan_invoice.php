<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Bukti Pembelian Barang </h3>
        </div>
        <table style="border:none;width: 100%;">
            <tbody>
                <tr>
                    <td style="vertical-align:top;" class="data">No.Pesanan</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->id ?></td>
                    <td style="vertical-align:top;" class="data">Nama Pembeli</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->nama ?></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;" class="data">Tgl Pembelian</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->tgl_pesan ?></td>
                    <td style="vertical-align:top;" class="data">Telp Pembeli</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->nomor_telephon ?></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;" class="data">Jasa Pengiriman</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->jasa_pengiriman ?></td>
                    <td style="vertical-align:top;" class="data">Alamat Tujuan</td>
                    <td style="vertical-align:top;" class="isi">: <?php echo $invoice->alamat ?></td>
                </tr>
            </tbody>
        </table>
        
        <table id="table">
            <thead>
                <tr>
                    <th style="width:20px;text-align:center">No.</th>
        			<th  style="width:300px;text-align:center">Nama Produk</th>
        			<th style="width:40px;text-align:center">Qty</th>
        			<th style="text-align:center">Harga Satuan</th>
        			<th style="text-align:center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        		$total = 0;
        		$no = 1;
        		foreach ($pesanan as $psn) :
        			$subtotal = $psn->jumlah * $psn->harga;
        			$total += $subtotal;
        		 ?>
        
        		 <tr>
        		 	<td style="text-align:center"><?= $no++ ?></td>
        		 	<td><?php echo $psn->nama_brg ?></td>
        		 	<td style="text-align:center"><?php echo $psn->jumlah ?></td>
        		 	<td align="right"><?php echo number_format($psn->harga, 0,',','.') ?></td>
        		 	<td align="right"><?php echo number_format($subtotal, 0,',','.') ?></td>
        		 </tr>
        
        		<?php endforeach; ?>

                 <tr>
                    <td align="right" colspan="4">Pajak :</td>
                    <td align="right">Rp. <?php echo number_format($pajak=$total*0.06, 0,',','.') ?></td>
                </tr>
    
        		<tr>
        			<td colspan="4" align="right">Grand Total</td>
        			<td align="right">Rp. <?php echo number_format($pajak+$total, 0,',','.') ?></td>
        		</tr>
            </tbody>
        </table>
    </body>
</html>