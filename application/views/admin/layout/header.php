<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/dataTables.bootstrap.css">
<link href="<?php echo base_url()?>assets/css/animate-custom.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url()?>assets/css/adminStyle.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?php echo base_url()?>assets/css/style1.css" rel="stylesheet" type="text/css" media="all"/>

<!--icons-css-->
<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>

</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.html"> <h1 style="color: #2395C2;">CICAK CORP.</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
								<?php 
								$num = $this->db->where('read','1')->count_all_results('order');
								$num1 = $this->db->where('read','1')->count_all_results('orderanjasa');


								 ?>
									<li class="dropdown head-dpdn">
										<a onclick="ubah_read1()" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i>
										<?php if (empty($num)) {
											echo '';
										}else{
										echo '<span id="span-rs" class="badge blue">'.$num.'</span>';
										}
										?>
										</a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Anda punya <?php if (empty($num)) {
											echo '0';
										}else{
										echo $num;
										}
										?> ready stok order baru</h3>
												</div>
											</li>
											
											 
											 <li id="ddn-rs">
												<div class="notification_bottom">
													<a href="<?= base_url()?>admin/Pemesanan/Ready	">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<a onclick="ubah_read2()" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><?php if (empty($num1)) {
											echo '';
										}else{
										echo '<span id="span-rs1" class="badge blue">'.$num1.'</span>';
										}
										?></a>
											<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Anda punya <?php if (empty($num1)) {
											echo '0';
										}else{
										echo $num1;
										}
										?> custom order baru</h3>
												</div>
											</li>
										
											 <li id="ddn-rs1">
												<div class="notification_bottom">
													<a href="#">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<!-- <span class="prfil-img"><img src="images/p1.png" alt=""> </span>  -->
												<div class="user-name">
													<p style="color: #2395C2;"><?php echo $this->session->userdata('loggedin')['nama']; ?></p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="<?php echo base_url(); ?>admin/Dashboard/setting"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="<?php echo base_url(); ?>admin/Dashboard/profile"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="<?php echo base_url() ?>admin/Auth/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->