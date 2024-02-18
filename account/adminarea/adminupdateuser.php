<?php include 'adminhead.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Update user details/account</li>
								<li class="breadcrumb-item active" aria-current="page"></li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Main content -->
		<section class="content">			
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Update Client</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto">
								<tr>
									  <th class="text-end">FIRST NAME</th>
									  <th class="text-end">LAST NAME</th>
									  <th class="text-end">EMAIL</th>
									  <th class="text-end">USERNAME</th>
									  <th class="text-end">WALLET BALANCE</th>
									  <th class="text-end">CURRENT INVESTMENT</th>
									  <th class="text-end">INVESTMENT DATE</th>
									  <th class="text-end">DAILY EARNING</th>
									  <th class="text-end">TOTAL WITHDRAWAL</th>
										<th class="text-end">TOTAL EARNINGS</th>
										<th class="text-end" colspan="3">OPERATIONS</th>
									</tr>
								  </thead>
								  <tbody>
									 
								  <?php
								$sql = "SELECT * FROM users ORDER BY id DESC";
								$result = mysqli_query($dbconnec,$sql);
								$result_check = mysqli_num_rows($result);

								if($result_check > 0){
								while($data = mysqli_fetch_assoc($result)){
								$firstname = $data['firstname'];
								$lastname = $data['lastname'];
								$email = $data['email'];
								$phone = $data['phone'];
								$usd = $data['username'];
								
								$country = $data['country'];
								$state = $data['state'];
								$city = $data['city'];
								$walletbal = $data['walletbal'];
								$totalwith = $data['totalwith'];
								$investdate = $data['timeofinvest'];
								$monthearn = $data['earning_amount'];
								$btcaddr = $data['btcaddr'];

								$earns = $data['earns'];
								// $tearns = $data['tearns'];
								$withdrawal = $data['withdrawal'];

								
								echo '	<tr>
									  <td>'.$firstname.'</td>
									  <td>'.$lastname.'</td>
									  <td>'.$email.'</td>
									  <td>'.$usd.'</td>
									  <td>'.$walletbal.'</td>
									  <td>'.$totalwith.'</td>
									  <td>'.$investdate.'</td>
									  <td>'.$monthearn.'</td>
									  <td>'.$withdrawal.'</td>
									  <td>'.$earns.'</td>
									 
									  <td><form method="POST" action="adminupdateuser.php">    
									  <input type="hidden" name="usd" value="'.$usd.'"> 
									  <input type="submit" name="edit" value="UPDATE" class="btn btn-success"> 
									  </form></td>
									  
									  <td><form method="POST" action="../configs/deleteuser.php">    
									  <input type="hidden" name="usd" value="'.$usd.'"> 
									  <input type="submit" name="delete" value="DELETE" class="btn btn-danger"> 
									  </form></td>

									</tr>';
								
								}
							}
						?>
						</tbody>
								</table>
							</div>
						</div>
						<!-- /.box-body -->

						<?php
				if(isset($_POST['edit'])){

      $usd =  mysqli_real_escape_string($dbconnec,$_POST['usd']);

	//   $sql = "SELECT * FROM investments WHERE username ='$usd'";
	//   $result = mysqli_query($dbconnec,$sql);
	//   if(mysqli_num_rows($result)>0){
	// 	while($data = mysqli_fetch_assoc($result)){

	// 	}
	//   }
		$sql = "SELECT * FROM users WHERE username ='$usd';";
		$result = mysqli_query($dbconnec,$sql);
		$result_checker = mysqli_num_rows($result);
    if($result_checker > 0){
	while($data = mysqli_fetch_assoc($result)){

	  $firstnam = $data['firstname'];
	  $lastnam = $data['lastname'];
	  $emai = $data['email'];
	  $phon = $data['phone'];
	  $us = $data['username'];
	  $pw = $data['passwd'];
	  $countr = $data['country'];
	  $stat = $data['state'];
	  $cit = $data['city'];
	  $walletba = $data['walletbal'];
	  $totalwit = $data['totalwith'];
	  $btcadd = $data['btcaddr'];
	  $earns = $data['earns'];
	  $withdrawal = $data['withdrawal'];


	  echo '
	  <div  class="modal modal-right fade show" style="display:block" id="modal-right" tabindex="-1">
	  <div  class="modal-dialog">
	 
		<div style="overflow-y:auto"  class="modal-content">
		<form action="../configs/updateuserscript.php" method="post">	
		  <div class="modal-header">
			<h5 class="modal-title">Investor Details</h5>
			<a href="adminupdateuser.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
		  </div>
		
		  <div class="modal-body">
			<p>Update '.$us.' Details</p>
			
			<div class="row">
				<div class="col-12">						
					<div class="form-group">
						<h5>First Name </h5>
						<div class="controls">
							<input type="text" name="firstnam" value="'.$firstnam.'" class="form-control" > 
						</div>
					</div>				
					<div class="form-group">
						<h5>Last Name </h5>
						<div class="controls">
							<input type="text" name="lastnam" value="'.$lastnam.'" class="form-control" > 
						</div>
					</div>
					<div class="form-group">
						<h5>UserName </h5>
						<div class="controls">
							<input type="text" name="us" value="'.$us.'" class="form-control" > 
							<input type="hidden" name="countr" value="'.$countr.'" class="form-control" > 
							<input type="hidden" name="stat" value="'.$stat.'" class="form-control" > 
							<input type="hidden" name="cit" value="'.$cit.'" class="form-control" > 
						</div>
					</div>
				<div class="form-group">
					<h5>Email</h5>
					<div class="controls">
						<input type="email" name="emai" value="'.$emai.'" class="form-control"> 
					</div>
				</div>
				<div class="form-group">
					<h5>Phone </h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="phon" value="'.$phon.'" class="form-control" > <span class="input-group-addon">.00</span> 
					</div>
				</div>
				<div class="form-group">
					<h5>Password </h5>
					<div class="controls">
						<input type="password" name="pw" value="'.$pw.'" class="form-control" > 
					</div>
				</div>
				<div class="form-group">
						<h5>BTC Address <span class="text-danger"></span></h5>
						<div class="controls">
							<input type="text" name="btcadd" value="'.$btcadd.'" class="form-control" > 
						</div>
				</div>
				<div class="form-group">
					<h5>Wallet Balance </h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="walletba" value="'.$walletba.'" class="form-control" > <span class="input-group-addon">.00</span> 
					</div>
				</div>
				<div class="form-group">
					<h5>Current Investment</h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="totalwit" value="'.$totalwit.'" class="form-control" > <span class="input-group-addon">.00</span> 
					</div>
				</div>
				<div class="form-group">
					<h5>Subsequent Earning </h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="subearn" class="form-control"> <span class="input-group-addon">.00</span> 
					</div>
				</div>
				<div class="form-group">
					<h5>Close Investment </h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="earns" class="form-control"> <span class="input-group-addon">.00</span> 
					</div>
				</div>
				<div class="form-group">
					<h5>Total Withdrawals</h5>
					<div class="input-group"> <span class="input-group-addon">$</span>
						<input type="number" name="withdrawal" value="'.$withdrawal.'" class="form-control" > <span class="input-group-addon">.00</span> 
					</div>
				</div>

			</div>
	       </div>
		  </div>
		  <div class="modal-footer modal-footer-uniform ">
			<button type="button" class="btn btn-danger float-start close-m" data-bs-dismiss="modal">Close</button>
			<button type="submit" name="updateuser" class="btn btn-primary float-end">Save changes</button>
		  </div>
		  </form>
		</div>
		
	  </div>
	</div>
	  ';

	
		   }
		 }
		}   
	  ?>

					  </div>
				</div>
			  </div>	
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ  /</a>
		  </li>
		</ul>
    </div>
	  &copy; 2019 <a target="_blank" href="https://securedglobalasset.com/">Securedglobalasset</a>, All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger" data-toggle="control-sidebar"><i class="ion ion-close text-white"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>
	<script src="assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>

	<script src="assets/vendor_components/datatable/datatables.min.js"></script>
	<script src="js/pages/market-capitalizations.js"></script>
	
	<!-- Specie Admin Admin App -->
	<script src="js/demo.js"></script>
	<script src="js/template.js"></script>
	
	<script src="js/pages/toastr.js"></script> 
    <script src="js/pages/notification.js"></script>

	
	<script>
	$(document).ready(function(){
			$('.modal-footer').find('.close-m').click(function(){
			$('#modal-right').removeClass('show');
			$('#modal-right').hide();
			})
		});
	</script>

<?php
	if(!empty($_GET['updatesuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['updatesuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['updateerr'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'ERROR!',
				text: '".$_GET['updateerr']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'warning',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['delusr'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['delusr']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}
	?>
</body>

</html>
