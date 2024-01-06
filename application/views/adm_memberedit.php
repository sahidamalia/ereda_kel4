<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Member</h6>
            </div>
            <div class="card-body  pb-2">
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						
						<form name="mbredit" method="post" action="<?= base_url();?>admin/memberedit">
							<fieldset><label>Nama Member</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $Member['namamember'];?>"
									data-validate="required"/>
							</fieldset>
							<fieldset><label>Telepon</label>
								<input type="text" name="telepon" class="form-control" value="<?= $Member['telepon'];?>" maxlength="20" data-validate="required,number"/>
							</fieldset>
							<fieldset><label>Password <span class="text-danger">(Kosongkan jika tidak akan merubah)</span></label>
								<input type="password" name="passwd" class="form-control" 
									maxlength="10"/>
							</fieldset>
								<p class="mt-4 text-center">
									<button type="submit" class="btn btn-primary"> Simpan</button>
								</p>
							<input type="hidden" name="idm" value="<?= $Member['idmember'];?>"/>	
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