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
								<li class="breadcrumb-item" aria-current="page">All trades executed by users</li>
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
						  <h4 class="box-title">User Trades</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto">
								<tr>
									  <th class="text-end">USERNAME</th>
									  <th class="text-end">TRADING AMOUNT</th>
                                      <th class="text-end">SYMBOL</th>
                                      <th class="text-end">TRADE TYPE</th>
                                      <th class="text-end">PERCENTAGE TO GAIN</th>
									  <th class="text-end">WALLET BALANCE</th>
                                      <th class="text-end">PROFIT</th>
                                      <th class="text-end">LOSS</th>
									  <th class="text-end">TRANSACTION STATUS</th>
                                      <th class="text-end">TRANSACTION ID</th>
                                      <th class="text-end">TRADE EXECUTION DATE</th>
                                      <th class="text-end" colspan="3">OPERATIONS</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php
								$sql = "SELECT * FROM tradings ORDER BY id DESC";
								$result = mysqli_query($dbconnec,$sql);
								$result_check = mysqli_num_rows($result);
								if($result_check > 0){
								while($data = mysqli_fetch_assoc($result)){
								$usd = $data['username'];
								$amount = $data['amount'];
								$symbol = $data['symbol'];
								$trade_type = $data['trade_type'];
								$percent = $data['percent'];
								$walletbal = $data['walletbal'];
								$profit = $data['profit'];
								$loss = $data['loss'];
								$status = $data['statusoftrade'];
								$tradeid = $data['tradeid'];
								$trade_date = $data['trade_date'];
								echo'	<tr>
									  <td>'.$usd.'</td>
									  <td>'.$amount.'</td>
									  <td>'.$symbol.'</td>
									  <td>'.$trade_type.'</td>
									  <td>'.$percent.'</td>
                                      <td>'.$walletbal.'</td>
									  <td>'.$profit.'</td>
									  <td>'.$loss.'</td>
									  <td>'.$status.'</td>
                                      <td>'.$tradeid.'</td>
                                      <td>'.$trade_date.'</td>
									  <td><form method="POST" action="usertrades.php">    
									  <input type="hidden" name="usd" value="'.$usd.'"> 
                                      <input type="hidden" name="tradeid" value="'.$tradeid.'"> 
									  <input type="submit" name="edit" value="EDIT TRADE" class="btn btn-success"> 
									  </form></td>';
                                    if($profit == "" && $loss == ""){
                                      echo '<td><form method="POST" action="../configs/closeusertrade.php">    
									  <input type="hidden" name="usd" value="'.$usd.'"> 
                                      <input type="hidden" name="tradeid" value="'.$tradeid.'"> 
									  <input type="submit" name="closetrade" value="CLOSE TRADE" class="btn btn-success"> 
									  </form></td>';
                                    }else{
                                        echo '<td>Trade Closed</td>';
                                    } 
								echo '<td><form method="POST" action="../configs/admindeletetrade.php">    
									  <input type="hidden" name="usd" value="'.$usd.'"> 
                                      <input type="hidden" name="tradeid" value="'.$tradeid.'">
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
      $tradeid =  mysqli_real_escape_string($dbconnec,$_POST['tradeid']);
		$sql = "SELECT * FROM users WHERE username ='$usd';";
		$result = mysqli_query($dbconnec,$sql);
		$result_checker = mysqli_num_rows($result);
    if($result_checker > 0){
	while($data = mysqli_fetch_assoc($result)){
	  $us = $data['username'];
	  $walletba = $data['walletbal'];
	  $earns = $data['earns'];
    }
    $sql = "SELECT * FROM tradings WHERE tradeid ='$tradeid';";
		$result = mysqli_query($dbconnec,$sql);
		$result_checker = mysqli_num_rows($result);
    if($result_checker > 0){
	while($data = mysqli_fetch_assoc($result)){
	    $symbol = $data['symbol'];
        $percent = $data['percent'];
        $tradeid = $data['tradeid'];
        $profit = $data['profit'];
        $loss = $data['loss'];
	  echo'
	  <div  class="modal modal-right fade show" style="display:block;" id="modal-right" tabindex="-1">
	  <div  class="modal-dialog">
		<div style="overflow-y:auto"   class="modal-content">
		<form action="../configs/adminedittrade.php" method="post">	
		  <div class="modal-header">
			<h5 class="modal-title">Investor Trade Details</h5>
			<a href="usertrades.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
		  </div>
		
		  <div class="modal-body">
			<p>Edit '.$us.' Trade</p>
			
			<div class="row">
				<div class="col-12">						
					<div class="form-group">
						<h5>Symbol </h5>
						<div class="controls">
							<input type="text" name="symbol" value="'.$symbol.'" class="form-control" > 
						</div>
					</div>				
					<div class="form-group">
						<h5>Percentage to gain </h5>
						<div class="controls">
							<input type="number" name="percent" value="'.$percent.'" class="form-control" > 
						</div>
					</div>
                    <div class="form-group">
						<h5>Profit to make </h5>
						<div class="controls">
							<input type="number" name="profit" value="'.$profit.'" class="form-control" > 
						</div>
					</div>
					<div class="form-group">
						<h5>UserName </h5>
						<div class="controls">
							<input type="text" name="us" value="'.$us.'" class="form-control" > 
                            <input type="hidden" name="tradeid" value="'.$tradeid.'" class="form-control">
                            <input type="hidden" name="earns" value="'.$earns.'" class="form-control">
						</div>
					</div>
			</div>
	       </div>
		  </div>
		  <div class="modal-footer modal-footer-uniform ">
			<button type="button" class="btn btn-danger float-start close-m" data-bs-dismiss="modal">Close</button>
			<button type="submit" name="edittrade" class="btn btn-primary float-end">Save changes</button>
		  </div>
		  </form>
		</div>
		
	  </div>
	</div>
	  ';
    }
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
	}elseif(!empty($_GET['deltr'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['deltr']."',
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
