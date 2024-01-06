<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tambah Sepeda
				<span class="float-end">
					<a href="<?= base_url();?>admin/sepeda" class="btn btn-sm btn-danger">
						 Batal</a>
			  </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<form name="jenisnya" method="post" action="<?= base_url();?>admin/sepedanew">
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						<fieldset><label>No seri</label>
							<input type="text" name="noseri" class="form-control" data-validate="required"
								maxlength="10"/>
						</fieldset>
						<fieldset><label>Jenis</label>
							<select name="idjenis" class="form-control">
								<?php
								foreach($Jenis as $j)
								{
									echo '<option value="'.$j->idjenis.'">'.$j->jenis.'</option>';
								}
								?>
							</select>
						</fieldset>
						<fieldset><label>Harga</label>
							<input type="text" name="harga" class="form-control" data-validate="required.number"
								maxlength="10"/>
						</fieldset>
						<p class="text-center mt-4">
							<button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
						</p>
					</div>
				</div>
			</form>	
		   </div>
		</div>
	  </div>
	</div>
  </div>
<?php
	include('adm_akhir.php');
?>	