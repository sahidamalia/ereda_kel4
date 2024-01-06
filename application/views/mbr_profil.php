<?php
include('web_awal.php');
?>
<section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Data Profil</h3>
                  <p class="mb-0">Silahkan ubah data profil Anda</p>
                </div>
                <div class="card-body">
                  <form role="form" name="login" method="post" action="<?= base_url();?>mbr/profil">
					<label>Nama Lengkap</label>
                    <div class="mb-2">
                      <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" data-validate="required" maxlength="30" value="<?= $DtMbr['namamember'];?>">
                    </div>
					<label>Telepon</label>
                    <div class="mb-2">
                      <input type="text" name="telepon" class="form-control" placeholder="Email" data-validate="required,number" maxlength="20" value="<?= $DtMbr['telepon'];?>">
                    </div>
                    <label>Email</label>
                    <div class="mb-2">
                      <p class="text-primary"><b><?= $DtMbr['email'];?></b></p>
                    </div>
                    <label>Password <span class="text-danger">(kosongkan jika tidak ingin mengubah)</span></label>
                    <div class="mb-2">
                      <input type="password"  name="passwd" class="form-control" placeholder="Password"  maxlength="10">
                    </div>
					
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url();?>img/banner_daftar.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
include('web_akhir.php');
?>