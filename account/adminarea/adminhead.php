<?php
	session_start();
	include '../configs/dbcon.php';
	$adminname = $_SESSION['adminname'];
	if(isset($adminname)){
		$sql = "SELECT * FROM admins WHERE username='$adminname' ";
		$result= mysqli_query($dbconnec,$sql);
		$result_checker= mysqli_num_rows($result);
		if($result_checker > 0){
		while($data = mysqli_fetch_assoc($result)){
		$firstname = $data['firstname'];
		$lastname= $data['lastname'];
		$email= $data['email'];
		$username= $data['username'];
		$pwd= $data['passwd'];
		$type= $data['admintype'];
		$profileimg= $data['profileimg']; 
		}
		}
	}else{
	header("Location:../my_account.php?session_expire");
		exit();
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/x-icon" href="../../images/logo/asset-icon.png"/>
    <title>Securedglobalasset | Dashboard</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/stylee.css">
	<link rel="stylesheet" href="css/skin_color.css">

</head>
<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">	
		<!-- Logo -->
		<a href="../index.html" class="logo">
		  <!-- logo-->
		  <!-- <div class="logo-mini w-50">
			  <span class="light-logo"><img src="../images/logo-letter.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../images/logo-letter.png" alt="logo"></span>
		  </div> -->
		  <div class="logo-lg">
		  <span class="light-logo"><img src="../../images/logo/asset-icon.png" style="width:70px; height:45px;  padding-left:20px;" alt="logo"></span>
			  <span class="dark-logo"><img src="../../images/logo/asset-icon.png" style="width:70px; height:45px; padding-left:20px;" alt="logo"></span>
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i data-feather="align-left"></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form action="dashboard.php" method='POST'>
							<div class="input-group">
							  <input type="search" name="usd" class="form-control" placeholder="Enter username" aria-label="Search">
							  <div class="input-group-append">
								<button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#modal-right" name="edit" id="button-addon3"><i data-feather="search"></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">	
			
			
			<li class="btn-group d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light full-screen btn-warning-light" title="Full Screen">
					<i data-feather="maximize"></i>
			    </a>
			</li>
	
          <!-- Control Sidebar Toggle Button -->
          <li class="btn-group nav-item">
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect full-screen waves-light btn-danger-light">
			  	<i data-feather="settings"></i>
			  </a>
          </li>
		  
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow" data-bs-toggle="dropdown" title="Admin">
				<div class="d-flex pt-5">
					<div class="text-end me-10">
						<p class="pt-5 fs-14 mb-0 fw-700 text-primary"><?= !empty($adminname) ? $adminname : '';?></p>
						<small class="fs-10 mb-0 text-uppercase text-mute">Admin</small>
					</div>
					<?php
                    if(empty($profileimg)){
					echo '<img src="assets/img/avatar/avatar-1.png" class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />';
                     }else{
                    echo '<img src="img/'.$profileimg.'" class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />';
                     }
                     ?>
				</div>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="adminprofile.php"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <?php
                    if(!empty($type) && $type == "super"){
					echo '<a class="dropdown-item" href="setting.php"><i class="ti-settings text-muted me-2"></i> Settings</a>';
                     }
                     ?>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="logout.php"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>	
			
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	

				<li class="dashboard">
				<a href="dashboard.php">
					<i data-feather="monitor"></i><span>Dashboard</span>					  
				</a>
				</li>

				<li class="depositrequest">
				<a href="depositrequest.php">
					<i data-feather="inbox"></i>
					<span>View Deposit Request</span>
				</a>
				</li>

				<!-- <li class="usertrade">
				  <a href="usertrades.php">
					<i data-feather="package"></i>
					<span>View user trades</span>
				  </a>
				</li>   -->
				
				<!-- <li class="empower">
				  <a href="empower.php">
					<i data-feather="users"></i>
					<span>View Empowerment Clients</span>
				  </a>
				</li> -->

				<!-- <li class="endsars">
				  <a href="endsars.php">
					<i data-feather="users"></i>
					<span>View Endsars Clients</span>
				  </a>
				</li> -->

				<li class="withdrawalrequest">
				<a href="withdrawalrequest.php">
					<i data-feather="credit-card"></i>
					<span>View Withdrawal Request</span>
				</a>
				</li>

                <li class="updateuser">
				  <a href="adminupdateuser.php">
					<i data-feather="activity"></i>
					<span>Update and Delete</span>
				  </a>
				</li>

				<!-- <li class="mailalluser">
				  <a href="mailalluser.php">
					<i data-feather="mail"></i>
					<span>Send Mail To All Investors</span>
				  </a>
				</li>  	 -->

				<li class="mailoneuser">
				  <a href="mailoneuser.php">
					<i data-feather="mail"></i>
					<span>Send Mail To One Investor</span>
				  </a>
				</li> 

                <li class="logout">
				  <a href="logout.php">
					<i data-feather="log-out"></i>
					<span>Log out</span>
				  </a>
				</li> 

				
			  
			  <div class="sidebar-widgets">	
				<!-- <div class="mx-25 mb-30 pb-20 side-bx bg-primary rounded20">
					<div class="text-center">
						<img src="assets/img/crypto-join.png" class="sideimg" alt="">
						<h3 class="title-bx">Invest Now!</h3>
						<a href="https://securedglobalasset.com" class="text-white py-10 fs-16 mb-0">
						Buy and Sell Coins<i class="mdi mdi-arrow-right"></i>
						</a>
					</div>
				</div>   -->
				<div class="copyright text-start m-25">
				<p><strong class="d-block">Securedglobalasset</strong> © 2024 All Rights Reserved</p>
				</div>
			  </div>
		  </div>
		</div>
    </section>
  </aside>