<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>img/favicon.png">
  <title>
    <?= $WEB['namaweb'];?> | Administrator
  </title>
  <!-- Font Awesome Icons -->
  <link href="<?= base_url();?>fonts/font-awesome.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url();?>css_js/soft-ui-dashboard.css" rel="stylesheet" />
  <link href="<?= base_url();?>css_js/sweetalert2.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>dttable/dataTables.bootstrap5.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fa fa-close p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" <?= base_url();?>admin" >
        <img src="<?= base_url();?>img/ereda.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold"><?= $WEB['namaweb'];?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin">
            <i class="fa fa-home"></i>
            <span class="nav-link-text ms-1"> Home</span>
          </a>
        </li>
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/jenis">
            <i class="fa fa-th"></i>
            <span class="nav-link-text ms-1"> Jenis Sepeda</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/sepeda">
            <i class="fa fa-bicycle"></i>
            <span class="nav-link-text ms-1"> Sepeda</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/member">
            <i class="fa fa-users"></i>
            <span class="nav-link-text ms-1"> Member</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/pesanan">
            <i class="fa fa-shopping-cart"></i>
            <span class="nav-link-text ms-1"> Pesanan</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/laporan">
            <i class="fa fa-print"></i>
            <span class="nav-link-text ms-1"> Laporan</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/logout">
            <i class="fa fa-sign-out"></i>
            <span class="nav-link-text ms-1"> Logout</span>
          </a>
        </li>
     </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <ul class="navbar-nav ms-auto">
           
            <li class="nav-item ">
              <a href="<?= base_url();?>admin/akun" class="nav-link text-body font-weight-bold">
                <i class="fa fa-user"></i>
                <span class="d-sm-inline d-none">Akun</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a href="<?= base_url();?>admin/logout" class="nav-link text-body font-weight-bold">
                <i class="fa fa-sign-out"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
			
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
	