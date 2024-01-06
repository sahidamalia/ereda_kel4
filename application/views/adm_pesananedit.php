<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Pesanan</h6>
            </div>
            <div class="card-body  pb-2">
				<div class="row">
					<div class="col-sm-6">
						<table class="table">
						<tr><td>ID Pesanan</td><td><b><?= $DtPsn['idpesanan'];?></b></td></tr>
						<tr><td>Tanggal Pesanan</td><td><b><?= $DtPsn['tglpesanan'];?></b></td></tr>
						<tr><td>Jenis Sepeda</td><td><b><?= $DtPsn['jenis'];?></b></td></tr>
						<tr><td>No. Seri</td><td><b><?= $DtPsn['noseri'];?></b></td></tr>
						<tr><td>Harga</td><td><b>Rp <?= number_format($DtPsn['harga'],0,',','.');?></b> / Jam</td></tr>
						<tr><td>Lama</td><td><b><?= $DtPsn['lama'];?></b></td></tr>
						<tr><td>Jumlah Harga</td><td><b>Rp <?= number_format($DtPsn['jmlharga'],0,',','.');?></b></td></tr>
						</table>
					</div>
					<div class="col-sm-6">
						<form name="pinjam" method="post" action="<?= base_url();?>admin/pesananedit">
							<fieldset><label>Lama pakai (Jam)</label>
								<input type="text" name="lama" class="form-control" placeholder="Minimal 0.5 jam dan maksmimal 3 jam" value="<?= $DtPsn['lama'];?>"
									data-validate="required,decimal(2),minVal(0.5),maxVal(3)"/>
							</fieldset>
							<fieldset><label>Mulai Jam</label>
								<input type="text" name="mulaijam" class="form-control" value="<?= $DtPsn['mulaijam'];?>" maxlength="5"
								placeholder="HH:MM" data-validate="size(5)"/>
							</fieldset>
							<fieldset><label>Selesai Jam</label>
								<input type="text" name="selesaijam" class="form-control" value="<?= $DtPsn['selesaijam'];?>"  maxlength="5"
								placeholder="HH:MM" data-validate="size(5)"/>
							</fieldset>
							<input type="hidden" name="idp"value="<?= $DtPsn['idpesanan'];?>"/>
								<p class="mt-4 text-center">
									<button type="submit" class="btn btn-primary"> Simpan</button>
								</p>
						</form>  
				  	</div>
				</div>	
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
	include('adm_akhir.php');
?>	