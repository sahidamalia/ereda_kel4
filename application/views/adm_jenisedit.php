<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Jenis Sepeda
				<span class="float-end">
					<a href="<?= base_url();?>admin/jenis" class="btn btn-sm btn-danger">
						 Batal</a>
			  </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<form name="jenisnya" method="post" action="<?= base_url();?>admin/jenisedit"
					enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						<fieldset><label>Nama Jenis</label>
							<input type="text" name="jenis" class="form-control" data-validate="required"
								maxlength="20" value="<?= $Jenis['jenis'];?>"/>
						</fieldset>
						<fieldset><label>Gambar</label>
							<input type="file" name="gambar" class="form-control" data-validate="required"
								/>
						</fieldset>
						<input type="hidden" name="idjenis" value="<?= $Jenis['idjenis'];?>"/>
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