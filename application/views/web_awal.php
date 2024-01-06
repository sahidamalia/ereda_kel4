
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
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= base_url();?>web">
              <img src="<?= base_url();?>img/favicon.png" height="36"/> <?= $WEB['namaweb'];?>
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2" href="<?= base_url();?>web/home">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Beranda
                  </a>
                </li>
                
				<?php
				if ($_SESSION['MBR_ID']==0)
				{
					?>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url();?>web/daftar">
                    <i class="fa fa-pencil opacity-6 text-dark me-1"></i>
                    Daftar
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url();?>web/login">
                    <i class="fa fa-key opacity-6 text-dark me-1"></i>
                    Login
                  </a>
                </li>
				<?php
				}
				else
				{
					?>
				<li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url();?>mbr/pesanan">
                    <i class="fa fa-shopping-cart opacity-6 text-dark me-1"></i>
                    Pesanan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url();?>mbr/profil">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profil
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url();?>mbr/logout">
                    <i class="fa fa-key opacity-6 text-dark me-1"></i>
                    Logout
                  </a>
                </li>
				<?php
				}	
				?>
				
              </ul>
              <li class="nav-item d-flex align-items-center">
                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" href="<?= base_url();?>web/syarat">S&K Berlaku</a>
              </li>
              <li class="nav-item d-flex align-items-center">
                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank" href="<?= base_url();?>admin">Dashboard</a>
              </li>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">