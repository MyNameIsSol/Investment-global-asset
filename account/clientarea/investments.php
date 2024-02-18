<?php include 'userhead.php' ?>

<style>
     @media screen and (max-width:768px) {
            .plan {
                font-size: 40px !important;
            }
           
        }
        .planimg{
            background-color: #F7931A;
            color: #fff;
            padding:10px;
            font-weight:400 ;
            font-size: 16px;
            border-radius: 8px;
        }

        .planimg2{
            background-color: #23D5AD;
            color: #fff;
            padding:10px;
            font-weight:400 ;
            font-size: 16px;
            border-radius: 8px;
        }
        .planimg3{
            background-color: #888EA8;
            color: #fff;
            padding:10px;
            font-weight:400 ;
            font-size: 16px;
            border-radius: 8px;
        }
        .invlink button{
            color: #2196F3;
            background: none;
            outline: none;
            border: none;
            padding-bottom: 3px;
            border-bottom-style: solid;
            border-bottom-width: 2px;
            width: fit-content;
        }
</style>

<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
            <div class="col-12 mb-3 mt-4" style="background-image:linear-gradient(to right, #ff8838 0%, #ffa938 100%); padding:15px 10px; border-radius:4px;">
                        <div class="balholder align-items-center">
                            <div class="widget__left ml-3">
                                <p class=" mb-1" style="font-weight:600; color:#fff; font-size:18px">Wallet Balance: <?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($walletbal) ? number_format($walletbal) : '0' ;?>.00</p>
                            </div>
                        </div>
                        </div>
                <div class="row layout-top-spacing">
                  
                <h4 class=" title-name mb-4 mt-2 pl-3" style="font-size:20px;">Please select a plan of your choice by clicking the invest button.</h4> 

                <!-- <div class="col-12 mt-3 mb-5 text-center">
                            <img src="assets/img/blog2.jpg" class="img-fluid" alt="">
                        </div> -->

                <div class="toolbox__left-row row row--xs gutter-bottom-xs mb-5 mr-1 ml-1">
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-account-invoice-three">
        <div class="widget-heading" style="height:50px; margin-bottom:0; padding:20px; min-height:100px">
            <div class="wallet-balance" style="flex-direction:column">
            <h5 style="width:100%; text-align:center; margin-top:-30px; font-size: 22px">Silver Plan</h5>
                <p style="width:100%; text-align:center; font-size:15px; ">5% daily for 7days</p>
            </div>
        </div>

        <div class="widget-content">
            <div class="bills-stats">
                <span>Silver</span>
            </div>

            <div class="invoice-list">
                <div class="inv-detail">
                    <div class="info-detail-1">
                        <p>Minimum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '200' ;?>.00</span></p>
                    </div>
                    <div class="info-detail-2">
                        <p>Maximum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '4,999' ;?>.00</span></p>
                    </div>
                </div>

                <div class="inv-action">
                <form method="post"  action="cryptoinvestments.php" enctype="multipart/form-data">
                                        <input type="hidden" name="investtype"  value="cryptocurrency" >
                                        <input type="hidden" name="plan"  value="Silver" >
                                        <input type="hidden" name="percent"  value="5" >
                    <!-- <a href="javascript:void(0);" class="btn btn-outline-primary view-details">View Details</a> -->
                    <button type="submit" class="btn btn-outline-primary view-details" name="crypto"  value="invest">invest</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>           

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-account-invoice-three">
        <div class="widget-heading" style="height:50px; margin-bottom:0; padding:20px; min-height:100px">
            <div class="wallet-balance" style="flex-direction:column">
            <h5 style="width:100%; text-align:center; margin-top:-30px; font-size: 22px">Gold Plan</h5>
                <p style="width:100%; text-align:center; font-size:15px; ">5.6% daily for 10days</p>
            </div>
        </div>

        <div class="widget-content">
            <div class="bills-stats">
                <span>Gold</span>
            </div>

            <div class="invoice-list">
                <div class="inv-detail">
                    <div class="info-detail-1">
                        <p>Minimum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '5,000' ;?>.00</span></p>
                    </div>
                    <div class="info-detail-2">
                        <p>Maximum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '19,999' ;?>.00</span></p>
                    </div>
                </div>

                <div class="inv-action">
                <form method="post"  action="cryptoinvestments.php" enctype="multipart/form-data">
                        <input type="hidden" name="investtype"  value="cryptocurrency" >
                        <input type="hidden" name="plan"  value="Gold" >
                        <input type="hidden" name="percent"  value="5.6" >
                <button type="submit" class="btn btn-outline-primary view-details" name="crypto"  value="invest">invest</button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>  

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-account-invoice-three">
        <div class="widget-heading" style="height:50px; margin-bottom:0; padding:20px; min-height:100px">
            <div class="wallet-balance" style="flex-direction:column">
            <h5 style="width:100%; text-align:center; margin-top:-30px; font-size: 22px">Diamond Plan</h5>
                <p style="width:100%; text-align:center; font-size:15px; ">7.5% daily for 15days</p>
            </div>
        </div>

        <div class="widget-content">
            <div class="bills-stats">
                <span>Diamond</span>
            </div>

            <div class="invoice-list">
                <div class="inv-detail">
                    <div class="info-detail-1">
                        <p>Minimum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '25,000' ;?>.00</span></p>
                    </div>
                    <div class="info-detail-2">
                        <p>Maximum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '49,999' ;?>.00</span></p>
                    </div>
                </div>

                <div class="inv-action">
                <form method="post"  action="cryptoinvestments.php" enctype="multipart/form-data">
                        <input type="hidden" name="investtype"  value="cryptocurrency" >
                        <input type="hidden" name="plan"  value="Diamond" >
                        <input type="hidden" name="percent"  value="7.5" >
                <button type="submit" class="btn btn-outline-primary view-details" name="crypto"  value="invest">invest</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>  

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-account-invoice-three">
        <div class="widget-heading" style="height:50px; margin-bottom:0; padding:20px; min-height:100px">
            <div class="wallet-balance" style="flex-direction:column">
            <h5 style="width:100%; text-align:center; margin-top:-30px; font-size: 22px">Platinum Plan</h5>
                <p style="width:100%; text-align:center; font-size:15px; ">8% daily for 20days</p>
            </div>
        </div>

        <div class="widget-content">
            <div class="bills-stats">
                <span>Platinum</span>
            </div>

            <div class="invoice-list">
                <div class="inv-detail">
                    <div class="info-detail-1">
                        <p>Minimum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '50,000' ;?>.00</span></p>
                    </div>
                    <div class="info-detail-2">
                        <p>Maximum</p>
                        <p><span class="w-currency"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= '99,999' ;?>.00</span></p>
                    </div>
                </div>

                <div class="inv-action">
                <form method="post"  action="cryptoinvestments.php" enctype="multipart/form-data">
                        <input type="hidden" name="investtype"  value="cryptocurrency" >
                        <input type="hidden" name="plan"  value="Platinum" >
                        <input type="hidden" name="percent"  value="8" >
                <button type="submit" name="crypto" class="btn btn-outline-primary view-details"  value="invest">invest</button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div> 

            </div>


                    <!-- <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                        <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">ATTENTION!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <p class="modal-text">PLEASE...NOTE THAT ALL DEPOSIT, PAYMENTS SHOULD 
                                            BE MADE DIRECTLY TO THE COMPANY ACCOUNT/ WALLET ADDRESS, 
                                            NO PAYMENTS, DEPOSITS SHOULD BE MADE TO ANY ACCOUNT MANAGER. 
                                            THE COMPANY WILL NOT  BE HELD RESPONSIBLE FOR ANY LOSS THAT COMES 
                                            WITH MAKING PAYMENTS TO ANY ACCOUNTS MANAGER...
                                            THANK YOU FOR YOUR UNDERSTANDING AND COOPERATION. <br> <span style="text-align:start; font-size:13px">info@securedglobalasset.com</span></p>
                                </div>
                                <div class="modal-footer md-button">
                                    <button class="btn text-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                   
                                </div>
                            </div>

                        </div>
                    </div> -->

                    
                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing"> -->
                    <div class="col-12 ml-1 mr-1 mb-5" style="background-color: #0E1726; padding:10px 10px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:6px;">
                        <div class="position-relative">
								<iframe src="https://widget.coinlib.io/widget?type=chart&amp;theme=dark&amp;coin_id=859&amp;pref_coin_id=1505" width="100%" height="100%" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px; min-height: 490px" class="lv"></iframe>

								
							</div>
                        </div>
                    <!-- </div> -->
                   
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
        <!--  END CONTENT PART  -->

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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    <script type="text/javascript">
    $(window).on('load',function(){
        $('#zoomupModal').modal('show');
    });
    </script>

    <?php include "userfoot.php" ?>

    <script type="text/javascript">
            window.$crisp=[];window.CRISP_WEBSITE_ID="e155e40f-1061-4663-98a3-53f6f28d9f19";(function(){
              d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";
              s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
              </script>
  
</body>

</html>