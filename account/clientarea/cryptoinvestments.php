<?php include 'userhead.php' ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
<?php
  if(isset($_POST["crypto"])){
    $plan=mysqli_real_escape_string($dbconnec,$_POST["plan"]);
    $percent=mysqli_real_escape_string($dbconnec,$_POST["percent"]);
    $investtype=mysqli_real_escape_string($dbconnec,$_POST["investtype"]);
    if($_POST["plan"] == "Silver"){
                        echo ' <script type="text/javascript">
                        //form one 
                        function checkamountbal_1(){
                        var walletbals = document.forms["myform_1"]["walletbal"].value;
        
                        var amouninvested = document.forms["myform_1"]["invest_amount"].value;
        
                        var statusofinvest = document.forms["myform_1"]["statusofinvest"].value;
        
                        var amountinvestnumber = parseInt(amouninvested,10);
        
                        if(amouninvested == ""){
                        swal("Error!", "Please enter an amount", "error");
                        return false;
        
                        }else if(amountinvestnumber > walletbals){
                        swal("Error!", "Insufficient fund", "error");
                        return false;
        
                        }else if(amountinvestnumber < 200 ){
                        swal("Error!", "Minimum investment is $200", "error");
                        return false;
        
                        }else if(amountinvestnumber > 4999){
        
                        swal("Error!", "Maximum investment is $4,999", "error");
                        return false;
        
                        }else if(statusofinvest == "Processing"){
        
                        swal("Error!", "Sorry, you can not make a new investment now, you have an ongoing current invstment.", "error");
                        return false;
        
                        }else{
        
                        swal("Processing!", "Please wait while your request is been processed...", "success");
                        return true;
                        }
                        }
                        </script>
                                           
                            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
        
                                <div id="listGroupImages" class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header pl-4 pr-4">
                                            <div class="row p-0">
                                                <div class=" p-0 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                                    <h4>Silver Plan</h4> 
                                                </div>                     
                                            </div>
                                            <hr style="border:1px solid #E2E3EA; ">
                                        </div>
                                        <div class="widget-content widget-content-area">
                                       
                                            <ul class="list-group list-group-media ">
                                               
                                                    <div class="" style="background-color:#030514; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); padding:15px;">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <img alt="avatar" src="../blue/cost-efficiency-green.png" class="img-fluid  " style="width:50px; height50px;">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount  you wish to invest and click invest <br> to proceeed. </h6>
                                                        </div>
                                                    </div>
                                                </div> 
        
                                            <form class="mt-5" method="post" action="../configs/investscript.php" onsubmit="return checkamountbal_1()" name="myform_1">
                                                <li class="list-group-item  list-group-item-action" style="background-color:#030514;">
                                                <div class="media d-flex align-items-center">
                                                    
                                                    <div class="media-body mt-2">
                                                        <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Available Balance: '.$currency.number_format($walletbal).'</h6>
                                                    </div>
                                                </div>
                                            </li> 
        
        
                                            <div class="form-group mt-5 mb-4">
                                            <h6 class="sub-title" style="font-family: Georgia, serif;">Min Deposit: <span style="color:#00f87a">$200</span></h6>
                             <h6 class="sub-title" style="font-family: Georgia, serif;">Max Deposit : <span style="color:#00f87a">$4,999</span></h6>
                             <h6 class="sub-title" style="font-family: Georgia, serif;">Duration: 5% daily for 7days.</h6>  
                                                </div>
                                            
                                                <label for="basic-url" style="font-weight:500">Enter Amount</label>
                                                    <div class="input-group mb-4">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                              </div>
                                              <input type="number" name="invest_amount" value="200" class="form-control" placeholder="0" oninput="investone()" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                              </div>
                                            </div>
                                                <input  type="hidden" name="investtype" value="'.$investtype.'">
                                                <input  type="hidden" name="plan" value="'. $plan.'">
                                                <input  type="hidden" name="percent" value="'. $percent.'">
                                                <input type="hidden" name="walletbal" value="'.$walletbal.'">
                                                    <input type="hidden" name="usd" value="'. $username.'">
                                                <input type="hidden" name="email" value="'.$email.'">
                                                <input type="hidden" name="firstname" value="'.$firstname.'">
                                                <input type="hidden" name="lastname" value="'.$lastname.'">
                                                <input type="hidden" name="welbonus" value="'.$welbonus.'">
                                                <input type="hidden" name="statusofinvest" value="'.$statusofinvest.'">
                                                <div class="form-group">
                                                <p class="sub-title" id="showval" style="font-weight:bold;"> </p>
                                                    </div>
                                            <div class="form-group row mt-5">
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="invest" class="btn btn-warning">Invest</button>
                                                    </div>
                                                </div>
                                            </form>  
                                            </ul>
                                        </div>
                                    </div>
                                </div>
        
                            </div>';
                        }elseif($_POST["plan"] == "Gold"){
                            echo ' <script type="text/javascript">
                            //form one 
                            function checkamountbal_1(){
                            var walletbals = document.forms["myform_1"]["walletbal"].value;
            
                            var amouninvested = document.forms["myform_1"]["invest_amount"].value;
            
                            var statusofinvest = document.forms["myform_1"]["statusofinvest"].value;
            
                            var amountinvestnumber = parseInt(amouninvested,10);
            
                            if(amouninvested == ""){
                            swal("Error!", "Please enter an amount", "error");
                            return false;
            
                            }else if(amountinvestnumber > walletbals){
                            swal("Error!", "Insufficient fund", "error");
                            return false;
            
                            }else if(amountinvestnumber < 5000 ){
                            swal("Error!", "Minimum investment is $5,000", "error");
                            return false;
            
                            }else if(amountinvestnumber > 19999 ){
                            swal("Error!", "Maximum investment is $19,999", "error");
                            return false;
            
                            }else if(statusofinvest == "Processing"){
            
                            swal("Error!", "Sorry, you can not make a new investment now, you have an ongoing current invstment.", "error");
                            return false;
            
                            }else{
            
                            swal("Processing!", "Please wait while your request is been processed...", "success");
                            return true;
                            }
                            }
                            </script>              
                                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                    <div id="listGroupImages" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header pl-4 pr-4">
                                                <div class="row p-0">
                                                    <div class=" p-0 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                                        <h4>Gold Plan</h4> 
                                                    </div>                     
                                                </div>
                                                <hr style="border:1px solid #E2E3EA; ">
                                            </div>
                                            <div class="widget-content widget-content-area">
                        
                                                <ul class="list-group list-group-media ">
                                                   
                                                    <div class="" style="background-color:#030514; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); padding:15px;">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <img alt="avatar" src="../blue/cost-efficiency-green.png" class="img-fluid  " style="width:50px; height50px;">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount  you wish to invest and click invest <br> to proceeed. </h6>
                                                        </div>
                                                    </div>
                                                </div> 
            
                                                <form class="mt-5" method="post" action="../configs/investscript.php" onsubmit="return checkamountbal_1()" name="myform_1">
                                                    <li class="list-group-item  list-group-item-action" style="background-color:#030514;">
                                                    <div class="media d-flex align-items-center">
                                                        
                                                        <div class="media-body mt-2">
                                                            <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Available Balance: '.$currency.number_format($walletbal).'</h6>
                                                        </div>
                                                    </div>
                                                </li> 
            
            
                                                <div class="form-group mt-5 mb-4">
                                                <h6 class="sub-title" style="font-family: Georgia, serif;">Min Deposit: <span style="color:#00f87a">$5,000.00</span></h6>
                                 <h6 class="sub-title" style="font-family: Georgia, serif;">Max Deposit : <span style="color:#00f87a">$19,999.00</span></h6>
                                 <h6 class="sub-title" style="font-family: Georgia, serif;">Duration: 5.6% daily for 10days.</h6>  
                                                    </div>
                                                
                                                    <label for="basic-url" style="font-weight:500">Enter Amount</label>
                                                        <div class="input-group mb-4">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                  </div>
                                                  <input type="number" name="invest_amount" value="5000" class="form-control" placeholder="0" oninput="secondinvest()" required>
                                                  <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                  </div>
                                                </div>  
                                                    <input  type="hidden" name="investtype" value="'.$investtype.'">
                                                    <input  type="hidden" name="plan" value="'. $plan.'">
                                                    <input  type="hidden" name="percent" value="'. $percent.'">
                                                    <input type="hidden" name="walletbal" value="'.$walletbal.'">
                                                        <input type="hidden" name="usd" value="'. $username.'">
                                                    <input type="hidden" name="email" value="'.$email.'">
                                                    <input type="hidden" name="firstname" value="'.$firstname.'">
                                                    <input type="hidden" name="lastname" value="'.$lastname.'">
                                                    <input type="hidden" name="welbonus" value="'.$welbonus.'">
                                                    <input type="hidden" name="statusofinvest" value="'.$statusofinvest.'">
                                                    <div class="form-group">
                                                    <p class="sub-title" id="showval" style="font-weight:bold;"> </p>
                                                        </div>
                                                <div class="form-group row mt-5">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="invest" class="btn btn-warning">Invest</button>
                                                        </div>
                                                    </div>
                                                </form>   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }elseif($_POST["plan"] == "Platinum"){
                                echo ' <script type="text/javascript">
                                //form one 
                                function checkamountbal_1(){
                                var walletbals = document.forms["myform_1"]["walletbal"].value;
                
                                var amouninvested = document.forms["myform_1"]["invest_amount"].value;
                
                                var statusofinvest = document.forms["myform_1"]["statusofinvest"].value;
                
                                var amountinvestnumber = parseInt(amouninvested,10);
                
                                if(amouninvested == ""){
                                swal("Error!", "Please enter an amount", "error");
                                return false;
                
                                }else if(amountinvestnumber > walletbals){
                                swal("Error!", "Insufficient fund", "error");
                                return false;
                
                                }else if(amountinvestnumber < 50000 ){
                                swal("Error!", "Minimum investment is $50,000", "error");
                                return false;
                
                                }else if(amountinvestnumber > 99999 ){
                                swal("Error!", "Maximum investment is $99,999", "error");
                                return false;
                
                                }else if(statusofinvest == "Processing"){
                
                                swal("Error!", "Sorry, you can not make a new investment now, you have an ongoing current invstment.", "error");
                                return false;
                
                                }else{
                
                                swal("Processing!", "Please wait while your request is been processed...", "success");
                                return true;
                                }
                                }
                                </script>              
                                    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                        <div id="listGroupImages" class="col-lg-12 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header pl-4 pr-4">
                                                    <div class="row p-0">
                                                        <div class=" p-0 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                                            <h4>Platinum Plan</h4> 
                                                        </div>                     
                                                    </div>
                                                    <hr style="border:1px solid #E2E3EA; ">
                                                </div>
                                                <div class="widget-content widget-content-area">
                            
                                                    <ul class="list-group list-group-media ">
                                                       
                                                            <div class="" style="background-color:#030514; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); padding:15px;">
                                                            <div class="media d-flex align-items-center">
                                                                <div class="mr-3">
                                                                    <img alt="avatar" src="../blue/cost-efficiency-green.png" class="img-fluid  " style="width:50px; height50px;">
                                                                </div>
                                                                <div class="media-body mt-2">
                                                                    <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount  you wish to invest and click invest <br> to proceeed. </h6>
                                                                </div>
                                                            </div>
                                                        </div> 
                
                                                    <form class="mt-5" method="post" action="../configs/investscript.php" onsubmit="return checkamountbal_1()" name="myform_1">
                                                        <li class="list-group-item  list-group-item-action" style="background-color:#030514;">
                                                        <div class="media d-flex align-items-center">
                                                            
                                                            <div class="media-body mt-2">
                                                                <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Available Balance: '.$currency.number_format($walletbal).'</h6>
                                                            </div>
                                                        </div>
                                                    </li> 
                
                
                                                    <div class="form-group mt-5 mb-4">
                                                    <h6 class="sub-title" style="font-family: Georgia, serif;">Min Deposit: <span style="color:#00f87a">$50,000.00</span></h6>
                                     <h6 class="sub-title" style="font-family: Georgia, serif;">Max Deposit : <span style="color:#00f87a">$99,999.00</span></h6>
                                     <h6 class="sub-title" style="font-family: Georgia, serif;">Duration: 8% daily for 20days.</h6>  
                                                        </div>
                                                    
                                                        <label for="basic-url" style="font-weight:500">Enter Amount</label>
                                                            <div class="input-group mb-4">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                      </div>
                                                      <input type="number" name="invest_amount" value="50000" class="form-control" placeholder="0" oninput="forthinvest()" required>
                                                      <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                      </div>
                                                    </div>  
                                                        <input  type="hidden" name="investtype" value="'.$investtype.'">
                                                        <input  type="hidden" name="plan" value="'. $plan.'">
                                                        <input  type="hidden" name="percent" value="'. $percent.'">
                                                        <input type="hidden" name="walletbal" value="'.$walletbal.'">
                                                            <input type="hidden" name="usd" value="'. $username.'">
                                                        <input type="hidden" name="email" value="'.$email.'">
                                                        <input type="hidden" name="firstname" value="'.$firstname.'">
                                                        <input type="hidden" name="lastname" value="'.$lastname.'">
                                                        <input type="hidden" name="welbonus" value="'.$welbonus.'">
                                                        <input type="hidden" name="statusofinvest" value="'.$statusofinvest.'">
                                                        <div class="form-group">
                                                        <p class="sub-title" id="showval" style="font-weight:bold;"> </p>
                                                            </div>
                                                    <div class="form-group row mt-5">
                                                            <div class="col-sm-10">
                                                                <button type="submit" name="invest" class="btn btn-warning">Invest</button>
                                                            </div>
                                                        </div>
                                                    </form>   
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                        }elseif($_POST["plan"] == "Diamond"){
                            echo ' <script type="text/javascript">
                            //form one 
                            function checkamountbal_1(){
                            var walletbals = document.forms["myform_1"]["walletbal"].value;
            
                            var amouninvested = document.forms["myform_1"]["invest_amount"].value;
            
                            var statusofinvest = document.forms["myform_1"]["statusofinvest"].value;
            
                            var amountinvestnumber = parseInt(amouninvested,10);
            
                            if(amouninvested == ""){
                            swal("Error!", "Please enter an amount", "error");
                            return false;
            
                            }else if(amountinvestnumber > walletbals){
                            swal("Error!", "Insufficient fund", "error");
                            return false;
            
                            }else if(amountinvestnumber < 25000 ){
                            swal("Error!", "Minimum investment is $25,000", "error");
                            return false;
            
                            }else if(amountinvestnumber > 49999 ){
                            swal("Error!", "Maximum investment is $49,999", "error");
                            return false;
            
                            }else if(statusofinvest == "Processing"){
            
                            swal("Error!", "Sorry, you can not make a new investment now, you have an ongoing current invstment.", "error");
                            return false;
            
                            }else{
            
                            swal("Processing!", "Please wait while your request is been processed...", "success");
                            return true;
                            }
                            }
                            </script>              
                                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                    <div id="listGroupImages" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header pl-4 pr-4">
                                                <div class="row p-0">
                                                    <div class=" p-0 col-xl-12 col-md-12 col-sm-12 col-12 ">
                                                        <h4>Diamond Plan</h4> 
                                                    </div>                     
                                                </div>
                                                <hr style="border:1px solid #E2E3EA; ">
                                            </div>
                                            <div class="widget-content widget-content-area">
                        
                                                <ul class="list-group list-group-media ">
                                                    
                                                        <div class="" style="background-color:#030514; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); padding:15px;">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <img alt="avatar" src="../blue/cost-efficiency-green.png" class="img-fluid  " style="width:50px; height50px;">
                                                            </div>
                                                            <div class="media-body mt-2">
                                                                <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Enter an amount  you wish to invest and click invest <br> to proceeed. </h6>
                                                            </div>
                                                        </div>
                                                    </div> 
            
                                                <form class="mt-5" method="post" action="../configs/investscript.php" onsubmit="return checkamountbal_1()" name="myform_1">
                                                    <li class="list-group-item  list-group-item-action" style="background-color:#030514;">
                                                    <div class="media d-flex align-items-center">
                                                        
                                                        <div class="media-body mt-2">
                                                            <h6 class="tx-inverse " style="color:#5D6064; font-weight:700">Available Balance: '.$currency.number_format($walletbal).'</h6>
                                                        </div>
                                                    </div>
                                                </li> 
            
                                                <div class="form-group mt-5 mb-4">
                                                <h6 class="sub-title" style="font-family: Georgia, serif;">Min Deposit: <span style="color:#00f87a">$25,000.00</span></h6>
                                    <h6 class="sub-title" style="font-family: Georgia, serif;">Max Deposit : <span style="color:#00f87a">$49,999.00</span></h6>
                                    <h6 class="sub-title" style="font-family: Georgia, serif;">Duration: 7.5% daily for 15days.</h6>  
                                                    </div>
                                                
                                                    <label for="basic-url" style="font-weight:500">Enter Amount</label>
                                                        <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" name="invest_amount" value="100000" class="form-control" placeholder="0" oninput="thirdinvest()" required>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>  
                                                    <input  type="hidden" name="investtype" value="'.$investtype.'">
                                                    <input  type="hidden" name="plan" value="'. $plan.'">
                                                    <input  type="hidden" name="percent" value="'. $percent.'">
                                                    <input type="hidden" name="walletbal" value="'.$walletbal.'">
                                                        <input type="hidden" name="usd" value="'. $username.'">
                                                    <input type="hidden" name="email" value="'.$email.'">
                                                    <input type="hidden" name="firstname" value="'.$firstname.'">
                                                    <input type="hidden" name="lastname" value="'.$lastname.'">
                                                    <input type="hidden" name="welbonus" value="'.$welbonus.'">
                                                    <input type="hidden" name="statusofinvest" value="'.$statusofinvest.'">
                                                    <div class="form-group">
                                                    <p class="sub-title" id="showval" style="font-weight:bold;"> </p>
                                                        </div>
                                                <div class="form-group row mt-5">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="invest" class="btn btn-warning">Invest</button>
                                                        </div>
                                                    </div>
                                                </form>   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                      ?>

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

	<?php include 'userfoot.php' ?>

    <script>
    function investone(){
        var invest_amount = document.forms["myform_1"]["invest_amount"].value;
        var amountToEarn = invest_amount * 0.05;
        var result = document.getElementById("showval").innerHTML = "You will earn <span class='text-primary'>$" + amountToEarn + "</span> daily for 7 days";
    }
    function secondinvest(){
        var invest_amount = document.forms["myform_1"]["invest_amount"].value;
        var amountToEarn = invest_amount * 0.056;
        var result = document.getElementById("showval").innerHTML = "You will earn <span class='text-primary'>$" + amountToEarn + "</span> daily for 10 days";
    }
    function thirdinvest(){
        var invest_amount = document.forms["myform_1"]["invest_amount"].value;
        var amountToEarn = invest_amount * 0.075;
        var result = document.getElementById("showval").innerHTML = "You will earn <span class='text-primary'>$" + amountToEarn + "</span> daily for 15 days";
    }
    function forthinvest(){
        var invest_amount = document.forms["myform_1"]["invest_amount"].value;
        var amountToEarn = invest_amount * 0.08;
        var result = document.getElementById("showval").innerHTML = "You will earn <span class='text-primary'>$" + amountToEarn + "</span> daily for 20 days";
    }
</script>


</body>

</html>