<?php include 'userhead.php' ?>

<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
<script type="text/javascript">
		function CheckValid(){
		var fundamount = document.forms['depos']['fundamount'].value;
		if(fundamount < 200){
		swal("Error!", "Minimum deposit is $200", "error");
		return false;

		}else{
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
                                            <h4 style="font-size: 20px; font-weight:600">Fund Wallet</h4> 
                                        </div>   
                                                       
                                    </div>
                                    <hr style="border:1px solid #E2E3EA; margin-top:0;">
                                </div>
                                <div class="widget-content widget-content-area">
                               
                                    <ul class="list-group list-group-media ">
                                       
                                        <div class="" style=" box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); width:100% ">
                                            <!-- <div class="media d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img alt="avatar" src="../blue/h1-custom-icon-hover-img-61.png" class="img-fluid  " style="width:50px; height50px;">
                                                </div>
                                                <div class="media-body mt-2">
                                                    <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount in USD you wish to deposit to your wallet.<br>
                                                        You'll be redirect to make payment using your preferred method</h6>
                                                </div>
                                            </div> -->
                                            <img src="assets/img/color-modern.jpg" style="border-radius:6px; width:inherit" alt="">
                                        </div> 
                                       
                                    <form class="mt-5" method="POST" action="fundaccount.php" id="fundform" name="depos" onsubmit="return CheckValid()">
                                    
                                        <label for="basic-url" style="font-weight:500">Enter Amount</label>
                                            <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                      </div>
                                      <input type="number" placeholder="USD" name="fundamount" onkeyup="toBTC();" class="form-control" required  aria-label="Amount (to the nearest dollar)">
                                      <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                      </div>
                                    </div>

                                    <label class="col-form-label pt-3" style="font-size:18px">Method Of Payment</label>
                                    <div class="">
                                        <!-- <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-info">
                                                <input type=radio name="paytype" value="Btc" id="radio_1"  class="custom-control-input">
                                                <label class="custom-control-label" for="radio_1" style="font-weight:500">Deposit via Bitcoin</label>
                                            </div>
                                        </div> -->
                                        <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-info">
                                                <input type=radio name="paytype" value="Eth" id="radio_2" checked class="custom-control-input">
                                                <label class="custom-control-label" for="radio_2"  style="font-weight:500">Deposit via Ethereum</label>
                                            </div>
                                        </div>
                                        <!-- <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type=radio name="paytype" value="Ltc" id="radio_3" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_3" style="font-weight:500">Deposit via Litecoin</label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type=radio name="paytype" value="Bnb" id="radio_4" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_4" style="font-weight:500">Deposit via Binance coin</label>
                                            </div>
                                        </div> -->
                                        <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type=radio name="paytype" value="Usdt" id="radio_5" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_5" style="font-weight:500">Deposit via Tether coin (USDT)</label>
                                            </div>
                                        </div>

                                        <!-- <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type=radio name="paytype" value="None" disabled id="radio_4"  class="custom-control-input">
                                                <label class="custom-control-label" for="radio_4" style="font-weight:500">Others ( Coming Soon...)</label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-check mb-2 pl-0">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type=radio name="paytype" value="Trx" id="radio_6"  class="custom-control-input">
                                                <label class="custom-control-label" for="radio_6" style="font-weight:500">Deposit via Tron</label>
                                            </div>
                                        </div> -->
                                    </div>
                    <input type="hidden" name="usd" value="<?= !empty($username) ? $username : '';?>">
                    <input type="hidden" name="email" value="<?= !empty($email) ? $email : '';?>">
                    <input type="hidden" name="firstname" value="<?= !empty($firstname) ? $firstname : '';?>">
                    <input type="hidden" name="lastname" value="<?= !empty($lastname) ? $lastname : '';?>">
                    <br>
                    <br>
                                    <div class="form-group row ">
                                            <div class="col-sm-10">
                                                <button type="submit" name="fundpay" class="btn btn-warning mt-3">Deposit</button>
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
                    <p class="">Copyright © 2024 <a target="_blank" href="https://securedglobalasset.com/">securedglobalasset.com</a>. All rights reserved.</p>
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
   
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script> -->

    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>

    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
        <!-- toastr -->
       
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
  
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
    }
	?>

	<?php include 'userfoot.php' ?>

</body>

</html>