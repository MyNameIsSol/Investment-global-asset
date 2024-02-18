<?php 
include 'userhead.php'; 
include '../configs/dbcon.php';
$tbname = 'withdrawalrequest';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(22) NOT NULL,
        email VARCHAR(225) NOT NULL,
        withdrawalid VARCHAR(225) NOT NULL,
        btcaddr VARCHAR(22) NOT NULL,
        acctname VARCHAR(22) NOT NULL,
        acctnumber VARCHAR(22) NOT NULL,
        bankname VARCHAR(22) NOT NULL,
        amount VARCHAR(22) NOT NULL,
        transtype VARCHAR(22) NOT NULL,
        statusofwith VARCHAR(22) NOT NULL,
        walletbal VARCHAR(225) NOT NULL,
        with_date DATETIME NOT NULL';
if($dbconnec){
$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
if(!mysqli_query($dbconnec, $sql)){
    $error = "could'nt send withdrawal request";
    header ("Location:requestwithdrawal.php?tableerror=".$error);
    exit();
  }
}
?>

<script type="text/javascript">                    
function checkamountbal_with(){
// var walletbals = document.forms['withdrawal']['walletbal'].value;
var walletbals = document.forms['withdrawal']['walletbal'].value;

var amounwith = document.forms['withdrawal']['amount'].value;

var amountinvestnumber = parseInt(amounwith,10);
            
    if(amountinvestnumber > walletbals){
    swal("Error!", "Insufficient fund", "error");                 
    return false;  
    }else if(amountinvestnumber < 500){
    swal("Sorry!", "Minimum withdrawal is $500", "error");                 
    return false;  
    }else {
    swal("PROCESSING!", "Please wait while your request is been processed...", "success");
    return true;
    }
    }
    </script>
                                   
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
                    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                    <div id="listGroupImages" class="col-lg-12 layout-spacing">

                            <div class="statbox widget box box-shadow">
                                <div class="widget-header pl-4 pr-4">
                                    <div class="row p-0">
                                        <div class=" p-0 mt-2 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                            <h4 style="font-size: 20px; font-weight:600">Request withdrawal</h4> 
                                        </div>    
                                                       
                                    </div>
                                    <hr style="border:1px solid #E2E3EA; ">
                                </div>
                                <div class="widget-content widget-content-area">
                               
                                    <ul class="list-group list-group-media ">
                                       
                                    <div class="" style="background-color:#030514; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); padding:10px;">
                                            <div class="media d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img alt="avatar" src="../blue/payment-options-or.png" class="img-fluid  " style="width:50px; height50px;">
                                                </div>
                                                <div class="media-body mt-2">
                                                    <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount in USD you wish to request for. Your withdrawal will be <br>
                                                    processed.</h6>
                                                </div>
                                            </div>
                                        </div> 

                                    <form class="mt-5" name="withdrawal" method="POST" action="../configs/withdrawalscript.php" onsubmit="return checkamountbal_with()">
                                    <li class="list-group-item  list-group-item-action" style="background-color:#030514;">
                                            <div class="media d-flex align-items-center">
                                                
                                                <div class="media-body mt-2">
                                                    <h6 class="tx-inverse " style="color:white; font-weight:700">Withdrawable Balance: <?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($walletbal) ? $walletbal : '0';?> </h6>
                                                </div>
                                            </div>
                                        </li> 

                                    <div class="form-group mt-5 mb-4">
                                            <label for="formGroupExampleInput">Wallet Address:</label>
                                            <input  type="text" name="btcaddr" <?= !empty($btcaddr) ? $btcaddr : '';?> class="form-control" placeholder="Btc Wallet Address only" >
                                            <input type="hidden" name="walletbal" value="<?= !empty($walletbal) ? $walletbal : '';?>">
                                            <input type="hidden" name="earn" value="<?= !empty($earns) ? $earns : '';?>">
                                        </div>
                                        <div class="form-group mt-5 mb-4">
                                            <h6 style="text-align:center; width:90%; margin:0 auto;">OR <br>Bank Transfer</h6>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput">Account Name:</label>
                                            <input  type="text" name="acctname" <?= !empty($firstname) ? $firstname.' '.$lastname : '';?> class="form-control" placeholder="Enter Your Account Name" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput">Account Number: </label>
                                            <input  type="text" name="acctnumber" <?= !empty($acctnumber) ? $acctnumber : '';?> class="form-control" placeholder="Enter Your Account Number" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput">Bank Name: </label>
                                            <input  type="text" name="bankname" <?= !empty($bankname) ? $bankname : '';?> class="form-control" placeholder="Enter Your Bank Name" >
                                        </div>
                                    
                                        <label for="basic-url" style="font-weight:500">Enter Amount: *</label>
                                            <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                      </div>
                                      <input type="number" name="amount" value="" class="form-control" placeholder="0" required>
                                      <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                      </div>
                                    </div>
                                    <input type="hidden" name="usd" value="<?php echo $username;?>">
                                   <input type="hidden" name="email" value="<?php echo $email;?>">
                                   <input type="hidden" name="firstname" value="<?php echo $firstname;?>">
                                   <input type="hidden" name="lastname" value="<?php echo $lastname;?>">
                                    <div class="form-group row mt-5">
                                            <div class="col-sm-10">
                                                <button type="submit" name='withdrawal' class="btn btn-primary">Withdraw</button>
                                            </div>
                                        </div>
                                    </form>
                                        
                                    </ul>
                                </div>
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