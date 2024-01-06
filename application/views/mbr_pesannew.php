<?php
include('web_awal.php');
?>
<section>
      <div class="page-header min-vh-75">
        <div class="container" style="margin-top: 120px;">
			<h3 class="font-weight-bolder text-info text-gradient">Pemesanan Sepeda</h3>
			<div class="row">
				<div class="col-sm-6">
					<p>Anda akan memesan sepeda :</p>
					<p>Jenis Sepeda : <b><?= $Sepeda['jenis'];?></b></p>
					<p>No. Seri : <b><?= $Sepeda['noseri'];?></b></p>
					<p>Harga : <b>Rp <?= number_format($Sepeda['harga'],0,',','.');?></b> / Jam</p>
					<form name="pinjam" method="post" action="<?= base_url();?>mbr/pesansimpan">
						<fieldset><label>Lama pakai (Jam)</label>
							<input type="text" name="lama" class="form-control" placeholder="Minimal 0.5 jam dan maksmimal 3 jam"
								data-validate="required,decimal(2),minVal(0.5),maxVal(3)"/>
						</fieldset>
							<p class="mt-4 text-center">
								<button type="submit" class="btn btn-primary"> Pesan</button>
							</p>
						<input type="hidden" name="ids" value="<?= $Sepeda['idsepeda'];?>"/>	
					</form>
				</div>
				<div class="col-sm-6">
					<?php
					$f='img/jenis/'.$Sepeda['idjenis'].'.jpg';
					if (file_exists('./'.$f))
					{
						$f=base_url().$f;
					}
					else
					{
						$f=base_url().'img/noimage.jpg';
					}
					?>
					<p class="text-center"><img src="<?= $f;?>" width="300"/></p>
				</div>
			</div>	
        </div>
      </div>
    </section>
<?php
include('web_akhir.php');
?>