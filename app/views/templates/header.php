<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico" type="image/ico" />
	<title>SECURE | <?= $data['WebTitle'] ?></title>
	<!-- jQuery -->
    
	<!-- <link href="<?= BASEURL; ?>/css/bootstrap/bootstrap.css" rel="stylesheet"> -->
	<link href="<?= BASEURL; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= BASEURL; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= BASEURL; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- bootstrap-wysiwyg -->
    <link href="<?= BASEURL; ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?= BASEURL; ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?= BASEURL; ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?= BASEURL; ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?= BASEURL; ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= BASEURL; ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?= BASEURL; ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= BASEURL; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="<?= BASEURL; ?>/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    
    <link href="<?= BASEURL; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= BASEURL; ?>/vendors/build/css/custom.min.css" rel="stylesheet">
    <script src="<?= BASEURL; ?>/vendors/jquery/3.4.1/jquery-3.4.1.min.js"></script>
	<script src="<?= BASEURL; ?>/vendors/google/jquery/3.4.1/jquery.min.js"></script>
	<?php
		if ($data['loadingTitle']!="") {
	?>
	<link href="<?= BASEURL; ?>/vendors/loading/loading.css" rel="stylesheet">
	<?php
		}
	?>
</head>
	<body class="nav-md">
		<div class="bodyLoading" id="loading">
			<div class="wrapper">
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="shadow"></div>
				<div class="shadow"></div>
				<div class="shadow"></div>
				<span><?= $data['loadingTitle'] ?></span>
			</div>
		</div>
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
          			<div class="left_col scroll-view">
			            <div class="navbar nav_title" style="border: 0;">
			              	<a href="<?= BASEURL; ?>" class="site_title"><i class="fa fa-user-secret"></i> <span>SECURE</span></a>
			            </div>

            			<div class="clearfix"></div>

			            <!-- menu profile quick info -->
			            <div class="profile clearfix">
			              	<div class="profile_pic">
			                	<!-- <img src="<?= BASEURL; ?>/img/img.jpg" alt="..." class="img-circle profile_img"> -->
			              	</div>
			              	<div class="profile_info">
			                	<span>Selamat Datang,</span>
			                	<h2><?= $_SESSION['rs_pengguna_nama'] ?></h2>
			              	</div>
			            </div>
            			<!-- /menu profile quick info -->

            			<br />

			            <!-- sidebar menu -->
			            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			              	<div class="menu_section">
			                	<h3>General</h3>
				                <ul class="nav side-menu">
				                  	<li><a href="<?= BASEURL; ?>"><i class="fa fa-home"></i> Beranda </a></li>
				                  	<?php if (($_SESSION['rs_pengguna_id_ex'] == 'admin') || ($_SESSION['rs_pengguna_id_ex'] == 'operator')) { ?>
				                  	<li><a><i class="fa fa-users"></i> Pasien <span class="fa fa-chevron-down"></span></a>
				                    	<ul class="nav child_menu">
				                      		<li><a href="<?= BASEURL; ?>/pasien">Data Pasien</a></li>
				                    	</ul>
				                  	</li>
				                  	<li><a><i class="fa fa-stethoscope"></i> Diagnosis <span class="fa fa-chevron-down"></span></a>
				                    	<ul class="nav child_menu">
				                      		<li><a href="<?= BASEURL; ?>/diagnosis">Data Diagnosis</a></li>
				                    	</ul>
				                  	</li>
				                  	 <?php } ?>
				                  	<?php if (($_SESSION['rs_pengguna_nama'] == 'OPERATOR')) { ?>
				                  	<li><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
				                    	<ul class="nav child_menu">
				                      		<li><a href="<?= BASEURL; ?>/pengguna">Data Pengguna</a></li>
				                    	</ul>
				                  	</li>
				                  	<?php } ?>
				                  	<?php if (($_SESSION['rs_pengguna_id_ex'] == 'admin') || ($_SESSION['rs_pengguna_id_ex'] == 'operator')) { ?>
				                  	<li><a><i class="fa fa-book"></i> Laboratorium <span class="fa fa-chevron-down"></span></a>
				                    	<ul class="nav child_menu">
				                      		<li><a href="<?= BASEURL; ?>/enkripsiLab">Enkripsi Hasil Laboratorium</a></li>
				                      		<li><a href="<?= BASEURL; ?>/dekripsiLab">Dekripsi Hasil Laboratorium</a></li>
				                    	</ul>
				                  	</li>
				                  <?php } ?>	
				                </ul>
			              	</div>
			            </div>
			            <!-- /sidebar menu -->
			            
          			</div>
        		</div>

        		<!-- top navigation -->
		        <div class="top_nav">
		          	<div class="nav_menu">
			            <div class="nav toggle">
			                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
			            </div>
			            <nav class="nav navbar-nav">
			            	<ul class=" navbar-right">
			            		<li class="nav-item dropdown open" style="padding-left: 15px;">
					                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
					                	<?= $_SESSION['rs_pengguna_nama'] ?>
					                </a>
				                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
				                    	<a class="dropdown-item"  href="" onclick="deleteData('Untuk Keluar Dari Program', '<?= BASEURL; ?>/masuk/autkeluar'); return false;"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
				                  </div>
				                </li>
			            	</ul>
			            </nav>
		          	</div>
		        </div>
		        <!-- /top navigation -->

		        <!-- page content -->
        		<div class="right_col" role="main">
        			<div class="">
					    <div class="page-title">
					        <div class="title_left">
					            <h3><?= $data['WebTitle'] ?></h3>
					        </div>
					    </div>
					    <div class="clearfix"></div>
					    <div class="row">

        		