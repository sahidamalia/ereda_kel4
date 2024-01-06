<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Akun</h6>
            </div>
            <div class="card-body  pb-2">
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						
						<form name="mbredit" method="post" action="<?= base_url();?>admin/akun">
							<fieldset><label>Nama Admin</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $DtAdm['nama_adm'];?>"
									data-validate="required"/>
							</fieldset>
							<fieldset><label>Nama Pengguna</label>
								<input type="text" name="namauser" class="form-control" 
									value="<?= $DtAdm['username'];?>" maxlength="20" data-validate="required"/>
							</fieldset>
							<fieldset><label>Password <span class="text-danger">(Kosongkan jika tidak akan merubah)</span></label>
								<input type="password" name="passwd" class="form-control" 
									maxlength="10"/>
							</fieldset>
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