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
								<li class="breadcrumb-item" aria-current="page">Approve user withdrawal request </li>
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
						  <h4 class="box-title">Withdrawal request</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto">
								<thead>
									 <tr>
										<th class="text-end">USERNAME</th>
										<th class="text-end">WITHDRAWAL ID</th>
										<th class="text-end">BTC ADDR</th>
										<th class="text-end">ACCT NAME</th>
										<th class="text-end">ACCT NUMBER</th>
										<th class="text-end">BANK NAME</th>
										<th class="text-end">WALLET BAL</th>
										<th class="text-end">REQUESTED AMOUNT</th>
										<th class="text-end">EARNINGS</th>
										<th class="text-end">DATE OF WITHDRAWAL</th>
										<th class="text-end">EDIT WITHDRAWAL DATE</th>
										<th class="text-end">TRANSACTION STATUS</th>
										<th colspan="3" class="text-end">OPERATION</th>
									 </tr>
								  </thead>
								  <tbody>
								  <?php

									$sql = "SELECT * FROM withdrawalrequest ORDER BY id DESC";
									$result= mysqli_query($dbconnec,$sql);
									$result_checker= mysqli_num_rows($result);

									if($result_checker > 0){
									while($data = mysqli_fetch_assoc($result)){

									$btcaddr = $data['btcaddr'];
									$acctname = $data['acctname'];
									$acctnumber = $data['acctnumber'];
									$bankname = $data['bankname'];
									$usd = $data['username'];
									$amount= $data['amount'];
									$dateofwith= $data['with_date'];
									$statusofwith= $data['statusofwith'];
									$withdrawalid= $data['withdrawalid'];
									$walletbal= $data['walletbal'];
									$email= $data['email'];
			

                                    echo '
									<tr>
									   <td class="no-wrap text-end">'.$usd.'</td>
									   <td class="no-wrap text-end">'.$withdrawalid.'</td>
									   <td class="no-wrap text-end">'.$btcaddr.'</td>
									   <td class="no-wrap text-end">'.$acctname.'</td>
									   <td class="no-wrap text-end">'.$acctnumber.'</td>
									   <td class="no-wrap text-end">'.$bankname.'</td>
									   <td class="no-wrap text-end">$'.$walletbal.'</td>
									   <td class="text-end"><p><span>$</span>'.$amount.'</p></td>
									   <td class="text-end"><p><span>$</span>'.$walletbal.'</p></td>
									   <td class="no-wrap text-end"> '.$dateofwith.'</td>';
									   echo '<td> 
									   <form method="POST" action="withdrawalrequest.php">   
								 
										<input type="hidden" name="usd" value="'.$usd.'">
										<input type="hidden" name="usdemail" value="'.$email.'">
										<input type="hidden" name="walletbal" value="'.$walletbal.'">
										<input type="hidden" name="btcaddr" value="'.$btcaddr.'">
										<input type="hidden" name="statusofwith" value="'.$statusofwith.'">
										<input type="hidden" name="withid" value="'.$withdrawalid.'">
										<input type="hidden" name="amount" value="'.$amount.'">
										
										<input class="btn btn-info" type="submit" name="editdate" value="EDIT DATE" > 
								 
										 </form>  
										 </td>';
								 
									   echo '<td>'.$statusofwith. '</td>';

									   if($statusofwith == "PAID"){
										 echo '<td>withdrawal has been Approved</td>';
									   }else{
										echo '<td> 
										<form method="POST" action="../configs/withdrawpayscript.php">   

										<input type="hidden" name="usd" value="'.$usd.'">
										<input type="hidden" name="usdemail" value="'.$email.'">
										<input type="hidden" name="walletbal" value="'.$walletbal.'">
										<input type="hidden" name="btcaddr" value="'.$btcaddr.'">
										<input type="hidden" name="statusofwith" value="'.$statusofwith.'">
										<input type="hidden" name="withid" value="'.$withdrawalid.'">
										<input type="hidden" name="dateofwith" value="'.$dateofwith.'">
										<input type="hidden" name="amount" value="'.$amount.'">

										<input class="btn btn-success" type="submit" name="ccpay" value="PAY" > 

										</form></td>';
									   }
									   echo '<td>
									   <form method="POST" action="../configs/withdelete.php">   
									   <input type="hidden" name="usd" value="'.$usd.'">
										<input type="hidden" name="withid" value="'.$withdrawalid.'">
										<input type="hidden" name="usd" value="'.$username.'">
										<input type="hidden" name="usdemail" value="'.$email.'">
										<input type="hidden" name="btcaddr" value="'.$btcaddr.'">
										<input type="hidden" name="statusofwith" value="'.$statusofwith.'">
										<input type="hidden" name="amount" value="'.$amount.'">
										<input class="btn btn-warning" type="submit" name="ccpay" value="DELETE"> 

										</form> 
										  </td>';

						       echo '</tr>';

								}

							}
							?>
								  </tbody>
								</table>
							</div>
						</div>
						<!-- /.box-body -->

							<?php
								
								if(isset($_POST['editdate'])){
								$withid = $_POST['withid'];
								$sql = "SELECT * FROM withdrawalrequest WHERE withdrawalid = '$withid'";
								$result= mysqli_query($dbconnec,$sql);
								$result_checker= mysqli_num_rows($result);

								if($result_checker > 0){
								while($data = mysqli_fetch_assoc($result)){
								$btcaddr = $data['btcaddr'];
								$usd = $data['username'];
								$amount= $data['amount'];
								$dateofwith= $data['with_date'];
								$statusofwith= $data['statusofwith'];
								$walletbal= $data['walletbal'];

								$withid = $data['withdrawalid'];
								$usdemail = $data['email'];
								echo '
								<div  class="modal modal-right fade show" style="display:block" id="modal-right" tabindex="-1">
								<div  class="modal-dialog">
								<form action="../configs/editdate.php" method="post">
								  <div style="overflow-y:auto"  class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title">Investor Details</h5>
									  <a href="dashboard.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
									</div>
										
									<div class="modal-body">
									  <p>Edit withdrawal date</p>
						  
									  <div class="row">
										  <div class="col-12">						
									<input type="hidden" name="withid" value="'.$withdrawalid.'" class="form-control"></span> 
									<div class="form-group">
										<h5>Date of Withdrawal</h5>
										<div class="input-group"> <span class="input-group-addon">$</span>
											<input type="text" name="dateofwith" value="'.$dateofwith.'" class="form-control" ></span> 
										</div>
									</div>
						  
									  </div>
									 </div>
									</div>
									<div class="modal-footer  modal-footer-uniform">
									  <button type="button" class="btn btn-danger close-m" data-bs-dismiss="modal">Close</button>
									  <button type="submit" name="updatedate" class="btn btn-primary float-end">Save changes</button>
									</div>
								  
						  
								  </div>
								  </form>
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
	if(!empty($_GET['witsuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['witsuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['witerror'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'ERROR!',
				text: '".$_GET['witerror']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'warning',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['datesuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['datesuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['dateerror'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'ERROR!',
				text: '".$_GET['dateerror']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'warning',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['paysuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['paysuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['payerror'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'ERROR!',
				text: '".$_GET['datesuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'warning',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['delwitsuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['delwitsuc']."',
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
