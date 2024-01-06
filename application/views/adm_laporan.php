<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Laporan Pendapatan</h6>
            </div>
            <div class="card-body  pb-2">
				
				<p class="text-center">Silahkan masukan periode laporan:</p>
				<form name="mbredit" method="post" action="<?= base_url();?>admin/laporanctk"
					target="_blank">
					<div class="row">
					<fieldset class="col-sm-3 offset-sm-3"><label>Dari Tanggal</label>
						<input type="date" name="tgla" class="form-control"
							data-validate="required"/>
					</fieldset>
					<fieldset class="col-sm-3"><label>Sampai Tanggal</label>
						<input type="date" name="tglb" class="form-control"
							data-validate="required"/>
					</fieldset>
					</div>
						<p class="mt-4 text-center">
							<button type="submit" class="btn btn-primary"> Cetak</button>
						</p>	
				</form> 
          </div>
        </div>
      </div>
	 </div>
	</div>
</div>
<?php
	include('adm_akhir.php');
?>	