<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>img/favicon.png">
  <title>
    <?= $WEB['namaweb'];?>
  </title>
  
  <!-- Font Awesome Icons -->
  <link href="<?= base_url();?>fonts/font-awesome.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url();?>css_js/soft-ui-dashboard.css" rel="stylesheet" />
  <link href="<?= base_url();?>css_js/sweetalert2.min.css" rel="stylesheet">
	<link href="<?= base_url();?>css_js/font-awesome.min.css" rel="stylesheet">
</head>

<body class="">
<section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Administrator</h3>
                  <p class="mb-0">Silahkan login Administrator</p>
                </div>
                <div class="card-body">
                  <form role="form" name="login" method="post" action="<?= base_url();?>adminlogin">
                    <label>Nama User</label>
                    <div class="mb-3">
                      <input type="text" name="nama" class="form-control" placeholder="Nama User" data-validate="required" maxlength="20">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="passwd" class="form-control" placeholder="Password" data-validate="required" maxlength="10">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Log In</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url();?>img/banner_admlogin.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	<footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <?= date('Y');?>. Ereda. UBSI Purwokerto
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?= base_url();?>css_js/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url();?>css_js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>css_js/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>css_js/smooth-scrollbar.min.js"></script>
  
  <script src="<?= base_url();?>css_js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url();?>css_js/id.verify.notify.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
	
	<?php 
        if ($_SESSION['PopUpMsg']!='')
        {
            ?>
          swal.fire ({
				title: 'Info',
				html: '<?= $_SESSION['PopUpMsg'];?>',      
				icon: '<?= $_SESSION['PopUpClr'];?>',                 
				  })
			<?php
            $_SESSION['PopUpMsg']='';
        }
        ?>
  </script>
  
  <script src="<?= base_url();?>css_js/soft-ui-dashboard.js"></script>
</body>

</html>