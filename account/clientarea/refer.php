<?php include 'userhead.php'; 

        $tbname = 'reftable';
        $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(22) NOT NULL,
                email VARCHAR(225) NOT NULL,
                phone VARCHAR(22) NOT NULL,
                referee VARCHAR(22) NOT NULL,
                bonus varchar(55) not null,
                status varchar(22) NULL,
                refcode varchar(22) NULL,
                reg_date DATETIME NOT NULL';
        if($dbconnec){
        $Sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
        if(!mysqli_query($dbconnec, $Sql)){
            header ("Location:../signup.php?tableerror");
            die("Error: ".mysqli_error($dbconnec));
            exit();
          }
        }
?>

<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
<?php
if(isset($_SESSION['refbonus'])){
    echo '<script>swal("NOTICE!!!", "Please note that your referal bonus will be added to your wallet for withdrawal when your referal subscribe for the first time...", "success");</script>';
unset($_SESSION['refbonus']);
}
?>
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
                    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                        <div id="listGroupImages" class="col-lg-12 layout-spacing">

                            <div class="statbox widget box box-shadow">
                                <div class="widget-header pl-4 pr-4">
                                    <div class="row p-0">
                                        <div class=" p-0 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                            <h4>Refer users</h4> 
                                            <hr style="border:1px solid #E2E3EA; "> 
                                        </div>    
                                                    
                                    </div>
                                  
                                </div>
                                <div class="widget-content widget-content-area">
                               
                                    <ul class="list-group list-group-media p-3">
                                       
                                        <li class="list-group-item  list-group-item-action" style="background-image: linear-gradient(to right, #ff8838 0%, #ffa938 100%);">
                                            <div class="media align-items-center">
                                                <div class="media-body mt-2">
                                                    <h6 style="color:white; font-weight:700">Your Referral Link: <br> <span class="text-success">https://securedglobalasset.com/account/signup.php?ref=<?php echo $username;?> </span></h6>
                                                </div>
                                            </div>
                                        </li> 

                                                <div class="media-body mt-5 pl-2">
                                                    <h6 class="tx-inverse text-primary" style=" font-family: Georgia, serif; font-weight:700">Refer a friend and get instant 10% bonus on their first deposit</h6>
                                                </div>   
                                    </ul>
                                </div>
                            </div>
                        </div>
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="widget-content widget-content-area br-6">
                    <h5 class="box-title m-3">Below is a list of people you have refer</h5>
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th style='font-family: Georgia, serif;'>USERNAME</th>
                                        <th style='font-family: Georgia, serif;'>EMAIL</th>
                                        <th style='font-family: Georgia, serif;'>BONUS</th>
                                        <th style='font-family: Georgia, serif;'>STATUS</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            $sql = "SELECT * FROM reftable WHERE referee='$username'";
                            $result = mysqli_query($dbconnec,$sql);
                                if(mysqli_num_rows($result) != false){
                                while($data = mysqli_fetch_assoc($result)){
                                    $usd= $data['username'];
                                    $email= $data['email'];
                                    $refbonus= $data['bonus'];
                                    $refstatus= $data['status'];
                                echo ' <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><span class="user-name">'.$usd.'</span></td>  
                                        <td><span class="user-name">'.$email.'</span></td>';
                                        if($refbonus > 0){
                                            echo '<td><span class="user-name">'.$currency.$refbonus.'</span></td>';
                                        }else{
                                            echo '<td><span class="user-name">'.$refbonus.'</span></td>';
                                        }
                                        if($refstatus == "Pending"){
                                            echo '<td><span class="badge outline-badge-warning inv-status">'.$refstatus.'</span></td>';
                                            }elseif($refstatus == "PAID"){
                                            echo '<td><span class="badge outline-badge-success inv-status">'.$refstatus.'</span></td>';	
                                            }else{
                                                echo '<td><span class="badge outline-badge-warning inv-status">Processing</span></td>';
                                            }
                                            echo '</tr>';     
                                }
                                }else{
                                    // echo "<p style='color:white; font-family: Georgia, serif;'>No Referrals yet</p>";
                                    }
                                    ?>                               
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
           <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2024 <a target="_blank" href="https://securedglobalasset.com/">securedglobalasset.com</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Trading with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
 
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
        <!-- toastr -->
        <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
      <!-- END GLOBAL MANDATORY SCRIPTS -->
      <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <?php
	if(!empty($_GET['tableerror'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['tableerror']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#e2a03f'
                });
        </script>
        ";
    }elseif(!empty($_GET['error'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['error']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#e2a03f'
                });
        </script>
        ";
    }elseif(!empty($_GET['suc'])){
        echo "
        <script type='text/javascript'>
                Snackbar.show({
                    text: '".$_GET['suc']."',
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#1abc9c'
                });
        </script>
        ";
    }
	?>
	<?php include 'userfoot.php' ?>
</body>

</html>