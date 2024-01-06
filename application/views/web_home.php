<?php
include('web_awal.php');
?>
<section>
      <div class="page-header min-vh-75">
        <div class="container" style="margin-top: 120px;">
			<h3 class="font-weight-bolder text-info text-gradient">Penyewaan Sepeda</h3>
			<?php
			if ($JmlJenis==0)
			{
				echo '<div class="alert alert-danger text-white">Belum ada data...</div>';
			}
			else
			{
				?>
			  <div class="row justify-content-center">
			    <?php
				foreach($Sepeda as $a)
				{
					?>
				<div class="col-sm-6">
				  <div class="card border mt-8">
					<div class="card-header pb-0 text-left bg-transparent">
					  <h5><?= $a['jenis'];?></h5>
					</div>
					<?php
					$f='img/jenis/'.$a['idjenis'].'.jpg';
					if (file_exists('./'.$f))
					{
						$f=base_url().$f;
					}
					else
					{
						$f=base_url().'img/noimage.jpg';
					}
					?>
					<p class="text-center"><img src="<?= $f;?>" width="200"/></p>
					
					<div class="card-body">
						<table class="table table-borderless">
						<thead><tr><th>Seri</th><th>Harga</th><th>Status</th><th></th></tr><thead>
						<tbody>
					  <?php
						foreach($a['sepeda'] as $b)
						{
							if ($b['status']==0)
							{
								echo '<tr>';
							}	
							else
							{
								echo '<tr style="background-color: #ffe0e0;">';
							}
							echo '<td>'.$b['noseri'].'</td>
								      <td>'.$b['harga'].'</td>
								      <td>'.$STATUS[$b['status']].'</td>
									  <td>';
							if ( ($b['status']==0) && ($_SESSION['MBR_ID']>0) )
							{
								echo '<a href="'.base_url().'mbr/pesannew/'.$b['idsepeda'].'"
									class="btn btn-sm btn-primary">Pesan</a>';
							}								
							echo '</td>		  
								  </tr>';	  
						}
						?>
						</tbody>
						</table>
					</div>					
				  </div>
				</div>
				<?php
				}
				?>
			  </div>
			<?php
			}
			?>
        </div>
      </div>
    </section>
<?php
include('web_akhir.php');
?>