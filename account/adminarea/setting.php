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
								<li class="breadcrumb-item active" aria-current="page">Settings</li>
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
					<h4 class="text-dark">Admin Settings</h4>
					<h6>NOTE: only super admin can see this page</h6>
					<hr>

					<div class="box box-slided-up">
						<div class="box-header">
							<div class="d-md-flex justify-content-between align-items-center">
								<div>
									<h5 class="text-primary fw-500">Change any admin Password</h5>
									<p class="mb-0">Set a unique password to protect your account.</p>
								</div>
								<a href="#" class="box-btn-slide btn btn-info">Change Password</a>
							</div>
						</div>

                        	<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="../configs/editprofile.php" enctype="multipart/form-data">
					  <div class="row">
						<div class="col-12">						
							<div class="form-group">
								<h5>Enter Admin Username <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="adname" class="form-control" required data-validation-required-message="This field is required"> 
								</div>
								
							</div>
						<br>
                        <div class="form-group">
								<h5>Enter New Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="adpass" data-validation-match-match="password" class="form-control" required> 
								</div>
							</div>
						</div>
					  </div>
						<br>
						
						<div class="text-xs-right">
							<button type="submit" name="changeadminpass" class="btn btn-info">Change</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->

          </div>
		</div>	
        
        <div class="col-12">
					<h4 class="text-dark">Add new Admin</h4>
					<hr>
                    <div class="box">
					<div class="box-body">
			  <div class="row">
				<div class="col">
					<form  method="post" action="../configs/editprofile.php" enctype="multipart/form-data">
					  <div class="row">
						<div class="col-12">
                        <div class="form-group">
								<h5>Enter First Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="firstname" class="form-control" required data-validation-required-message="This field is required"> 
								</div>
							
							</div>	
                            <div class="form-group">
								<h5>Enter Last Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="lastname" class="form-control" required data-validation-required-message="This field is required"> 
								</div>
							
							</div>					
							<div class="form-group">
								<h5>Enter Username <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="username" class="form-control" required data-validation-required-message="This field is required"> 
								</div>
							
							</div>
							<div class="form-group">
								<h5>Enter Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> 
								</div>
							
							</div>
							<div class="form-group">
								<h5>Admin Type <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="admintype" id="select" required class="form-select">
										<option value="admin">admin</option>
										<option value="super">super</option>
									</select>
								</div>
							</div>
						<br>
                        <div class="form-group">
								<h5>Enter Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password" class="form-control" required> 
								</div>
                                
							</div>
						</div>
					  </div>
						<br>
						
						<div class="text-xs-right">
							<button type="submit" name="addadmin" class="btn btn-info">Add Admin</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
</div>
				</div>

				<div class="col-12">
					<h4 class="text-dark">Admin List</h4>
					<hr>
					<div class="box">
						<div class="box-body p-0">
							<div class="table-responsive">
							  <table class="table mb-0">
								  <thead>
									<tr>
									  <th scope="col">FIRST NAME</th>
									  <th scope="col">LAST NAME</th>
									  <th scope="col">EMAIL</th>
									  <th scope="col">USERNAME</th>
									  <th scope="col">ADMIN TYPE</th>
									  <th scope="col">Action</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php
								$sql = "SELECT * FROM admins ORDER BY id DESC";
								$result = mysqli_query($dbconnec,$sql);
								$result_check = mysqli_num_rows($result);

								if($result_check > 0){
								while($data = mysqli_fetch_assoc($result)){
								$firstname = $data['firstname'];
								$lastname = $data['lastname'];
								$email = $data['email'];
							
								$usd = $data['username'];
								
								$adtype = $data['admintype'];
								echo '	<tr>
									  <td>'.$firstname.'</td>
									  <td>'.$lastname.'</td>
									  <td>'.$email.'</td>
									  <td>'.$usd.'</td>
									  <td>'.$adtype.'</td>
									  
									  <td><form method="POST" action="../configs/deleteadmin.php">    
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
	  &copy; 2019 <a target="_blank" href="https://securedglobalasset.com/">Securedglobalasset</a>. All Rights Reserved.
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

	<!-- Specie Admin Admin App -->
	<script src="js/demo.js"></script>
	<script src="js/template.js"></script>

	<script src="js/pages/toastr.js"></script> 
    <script src="js/pages/notification.js"></script>

	<?php
	if(!empty($_GET['updatedpas'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['updatedpas']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['adminadded'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['adminadded']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['deladmin'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['deladmin']."',
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
