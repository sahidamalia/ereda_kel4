<?php
include('web_awal.php');
?>
<section>
      <div class="page-header min-vh-75">
        <div class="container" style="margin-top: 120px;">
			<h3 class="font-weight-bolder text-info text-gradient">Data Pesanan Sepeda</h3>
			<?php
			if ($JmlPsn==0)
			{
				echo '<div class="alert alert-info">Belum ada pesanan sepeda</div>';
			}
			else
			{
				?>
				<table class="table table-bordered">
				<thead><tr><th>Tgl Pesan</th><th>Jenis</th><th>No Seri</th><th>Harga</th>
					<th>Lama</th><th>Jumlah</th><th>Mulai Jam</th><th>Selesai Jam</th></tr>
				</thead>
				<tbody>
				<?php
				foreach($DtPsn as $d)
				{
					echo '<tr><td>'.$d->tglpesanan.'</td>
							  <td>'.$d->jenis.'</td>
							  <td>'.$d->noseri.'</td>
							  <td>'.number_format($d->harga,0,',','.').'</td>
							  <td>'.$d->lama.' jam</td>
							  <td>'.number_format($d->jmlharga,0,',','.').'</td>
							  <td>'.$d->mulaijam.'</td>
							  <td>'.$d->selesaijam.'</td>
						   </tr>';
				}						   
				?>
				</tbody>
				</table>
				<?php
			}
			?>
        </div>
      </div>
    </section>
<?php
include('web_akhir.php');
?>