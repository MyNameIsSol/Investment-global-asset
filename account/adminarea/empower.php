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
								<li class="breadcrumb-item" aria-current="page">View and Send Empowerment Registrant a Message</li>
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
        <h4 class="box-title">Empowerment Registrants</h4>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto">
                <thead>
                    <tr>
                    <th class="text-end">PASSPORT</th>
                    <th class="text-end">FIRSTNAME</th>
                    <th class="text-end">FAMILY NAME</th>
                    <th class="text-end">EMAIL</th>
                    <th class="text-end">PHONE</th>
                    <th class="text-end">COUNTRY</th>
                    <th class="text-end">STATE</th>
                    <th class="text-end">ADDRESS</th>
                    <th class="text-end">DATE OF BIRTH</th>
                    <th class="text-end">GENDER</th>
                    <th class="text-end">EDUCATIONAL LVL</th>
                    <th class="text-end">OCCUPATION</th>
                    <th class="text-end">ACCOUNT NO</th>
                    <th class="text-end">BANK NAME</th>
                    <th class="text-end">REG DATE</th>
                    <th colspan="3" class="text-end">OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM empowerment ORDER BY id DESC";
                $result= mysqli_query($dbconnec,$sql);
                $result_checker= mysqli_num_rows($result);
                if($result_checker > 0){
                while($data = mysqli_fetch_assoc($result)){
                $image = $data['image'];
                $firstname = $data['firstname'];
                $familyname = $data['familyname'];
                $email= $data['email'];
                $phone= $data['phone'];
                $country= $data['country'];
                $state= $data['state'];
                $address= $data['address'];
                $birth= $data['birth'];
                $gender= $data['gender'];
                $education= $data['education'];
                $occupation= $data['occupation'];
                $acctnumber= $data['acctnumber'];
                $bankname= $data['bankname'];
                $regdate= $data['reg_date'];
                echo'
                <tr>
                    <td class="no-wrap text-end"><img src="../clientarea/empower/'.$image.'" width="50" height="50"></td>
                    <td class="text-end"><p><span></span>'.$firstname.'</p></td>
                    <td class="text-end"><p><span></span>'.$familyname.'</p></td>
                    <td class="no-wrap text-end"> '.$email.'</td>
                    <td class="no-wrap text-end"> '.$phone.'</td>
                    <td class="no-wrap text-end">'.$country.'</td>
                    <td class="text-end"><p><span></span>'.$state.'</p></td>
                    <td class="text-end"><p><span></span>'.$address.'</p></td>
                    <td class="no-wrap text-end"> '.$birth.'</td>
                    <td class="no-wrap text-end"> '.$gender.'</td>
                    <td class="text-end"><p><span></span>'.$education.'</p></td>
                    <td class="no-wrap text-end"> '.$occupation.'</td>
                    <td class="no-wrap text-end"> '.$acctnumber.'</td>
                    <td class="no-wrap text-end"> '.$bankname.'</td>
                    <td class="no-wrap text-end"> '.$regdate.'</td>';
     
                    echo'<td>
                        <form method="POST" action="sendempmail.php">
                            <input type="hidden" name="email" value="'.$email.'">
                            <input class="btn btn-success" type="submit" name="sendempmail" value="Reply">
                        </form>
                    </td>';
                    echo'<td>
                    <form method="POST" action="../configs/deletemp.php">
                        <input type="hidden" name="email" value="'.$email.'">
                        <input class="btn btn-danger" type="submit" name="delete" value="DELETE">
                    </form>
                    </td>';
            echo'</tr>';
            }
        }
        ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
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

	<?php
	if(!empty($_GET['depsuc'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['depsuc']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['deperror'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['deperror']."',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3000,
				stack: 6
			});
			</script>
			";
	}elseif(!empty($_GET['del'])){
		echo "
			<script type='text/javascript'>
			$.toast({
				heading: 'SUCCESS!',
				text: '".$_GET['del']."',
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
