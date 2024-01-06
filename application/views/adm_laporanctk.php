<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>img/favicon.png">
  <title>
    <?= $WEB['namaweb'];?> | Administrator
  </title>
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url();?>css_js/soft-ui-dashboard.css" rel="stylesheet" />
  <link href="<?= base_url();?>css_js/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
	<p class="text-center"><b><?= $WEB['namaweb'];?></b></p>
	<h3 class="text-center">LAPORAN PENDAPATAN</h3>
	<p class="text-center">Dari Tanggal <b><?= $TglA;?></b> Sampai Tanggal <b><?= $TglB;?></b> </p>
     <?php
		if ($JmlPsn==0)
		{
			echo '<div class="alert alert-info">Belum ada pesanan sepeda</div>';
		}
		else
		{
			?>
			
			<table class="table table-sm table-bordered" id="dataTable">
			<thead><tr><th>ID</th><th>Member</th><th>Tgl Pesan</th><th>Jenis</th><th>No Seri</th>
				<th class="text-end">Harga</th><th class="text-end">Lama</th>
				<th class="text-end">Jumlah</th><th>Mulai Jam</th><th>Selesai Jam</th></tr>
			</thead>
			<tbody>
			<?php
			$total=0;
			foreach($DtPsn as $d)
			{
				echo '<tr><td>'.$d->idpesanan.'</td>
						  <td>'.$d->namamember.'</td>
						  <td>'.$d->tglpesanan.'</td>
						  <td>'.$d->jenis.'</td>
						  <td>'.$d->noseri.'</td>
						  <td class="text-end">'.number_format($d->harga,0,',','.').'</td>
						  <td class="text-end">'.$d->lama.' jam</td>
						  <td class="text-end">'.number_format($d->jmlharga,0,',','.').'</td>
						  <td>'.$d->mulaijam.'</td>
						  <td>'.$d->selesaijam.'</td>
						  
					   </tr>';
				$total=$total+$d->jmlharga;
			}						   
			?>
			<tr><td colspan="7" class="text-end">JUMLAH</td>
				<td class="text-end"><?= number_format($total,0,',','.');?></td>
				<td colspan="2"></td></tr>
			</tbody>
			</table>
		 <?php
		}
		?>				
    <p class="small">Dicetak : <?= date('Y-m-d H:i:s');?></p>          
</div>
<script src="<?= base_url();?>css_js/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url();?>css_js/bootstrap.bundle.min.js"></script>  
  <script src="<?= base_url();?>css_js/sweetalert2.all.min.js"></script>
  <script>
	$(document).ready(function() {
			 
	  swal.fire ({
			title: 'Info',
			html: '<p>Tekan tombol <kbd>ctrl<</kbd> <kbd>P</kbd> untuk mencetak laporan</p>',      
			icon: 'info',                 
			  });
	});
  </script>
</body>

</html>