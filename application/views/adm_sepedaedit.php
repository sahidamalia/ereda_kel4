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
				<form name="jenisnya" method="post" action="<?= base_url();?>admin/sepedaedit">
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						<fieldset><label>No seri</label>
							<input type="text" name="noseri" class="form-control" data-validate="required"
								maxlength="10" value="<?= $Sepeda['noseri'];?>"/>
						</fieldset>
						<fieldset><label>Jenis</label>
							<select name="idjenis" class="form-control">
								<?php
								foreach($Jenis as $j)
								{
									echo '<option value="'.$j->idjenis.'"';
									if ($Sepeda['idjenis']==$j->idjenis)
									{
										echo ' selected="selected"'; 
									}
									echo '>'.$j->jenis.'</option>';
								}
								?>
							</select>
						</fieldset>
						<fieldset><label>Harga</label>
							<input type="text" name="harga" class="form-control" data-validate="required.number"  value="<?= $Sepeda['harga'];?>"
								maxlength="10"/>
						</fieldset>
						<fieldset><label>Status</label>
							<select name="status" class="form-control">
								<?php
								for($a=0; $a<3; $a++)
								{
									echo '<option value="'.$a.'"';
									if ($Sepeda['status']==$a)
									{
										echo ' selected="selected"'; 
									}
									echo '>'.$STATUS[$a].'</option>';
								}
								?>
							</select>
						</fieldset>
						<input type="hidden" name="id" value="<?= $Sepeda['idsepeda'];?>"/>
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