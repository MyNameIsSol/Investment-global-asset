<?php include 'userhead.php' ?>

<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
<?php
if(isset($_SESSION['welbonus'])){
    echo '<script>swal("Welcome", "Please note that your welcome bonus will be added to your wallet and will be available for withdrawal upon investment...", "success");</script>';
}
unset($_SESSION['welbonus']);
?>
<style>
    .bal-title{
            font-weight: 600;
            font-size: 18px;
        }
        .bal{
            font-weight:600;
            font-size:18px;
        }
        .balimg img{
            width: 60px;
        }
        .widget-card{
            padding:10px;
        }
        .planimg{
            background-color: #5D6D8C;
            color: #fff;
            padding:10px;
            font-weight:400 ;
            font-size: 16px;
            border-radius: 8px;
        }
        .planimg2{
            background-color: #5D6D8C;
            color: #fff;
            padding:10px;
            font-weight:400 ;
            font-size: 16px;
            border-radius: 8px;
        }
        .planlink{
            font-size: 18px;
            font-weight: 500;
            color: #009688;
            margin-bottom: 18px;
            padding-bottom: 3px;
            border-bottom-style: solid;
            border-bottom-width: 2px;
            width: fit-content;
        }
        .planlink2{
            font-size: 16px;
            font-weight: 500;
            color: #009688;
            margin-bottom: 18px;
            padding-bottom: 3px;
            border-bottom-style: solid;
            border-bottom-width: 2px;
            width: fit-content;
        }
        .planlink2:hover{
            color: #10ACD3;
        }

        .title-nam{
            font-size:25px !important
        }
        .balance{
            font-size: 35px !important;
        }
        div.text-center{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        div.span{
            width: 100px;
            padding: 20px;
            background-color: #000;
            border-radius: 50%;
            text-align: center;
        }
        div.span2{
            width: 100px;
            padding: 12px;
            background-color: #000;
            border-radius: 50%;
            text-align: center;
        }
        .pay .svg1{
            width:60px;
            height:60px;
        }
        .pay .svg2{
            font-size:90px;
            font-weight: 800;
        }
        .pay p{
            font-size:30px !important;
        }
        .actions-div{
            display:flex;
            justify-content:space-between;
        }

        .sizing1-div{
            display:flex;
            overflow:visible;
            overflow-x: auto;
            white-space: nowrap;
        }


        @media screen and (max-width:1330px){
            div.span{
            width: 70px;
            padding: 10px;
            background-color: #000;
            border-radius: 50%;
            text-align: center;
        }
        div.span2{
            width: 70px;
            padding: 10px;
            background-color: #000;
            border-radius: 50%;
            text-align: center;
        }
        .pay .svg1{
            width:40px;
            height:40px;
        }
        .pay .svg2{
            font-size:60px;
            font-weight: 700;
        }
        .pay p{
            font-size:20px !important;
        }
        .actions-div{
            display:flex;
            justify-content:space-between;
        }

        }

        @media screen and (max-width:768px) {
            .bal-title{
                font-weight: 400 !important;
                font-size: 16px !important;
            }
            p{
                font-size: 16px !important;
            }
            .bal{
                font-weight:600;
                font-size:18px;
            }
            .balimg img{
                max-width: 60px;
            }
            .widget-card{
                padding:10px;
            }

            div.text-center{
                flex-direction:column;
            }

            .title-nam {
                font-size: 18px !important;
                font-weight: 500;
            }
            .balance{
                font-weight:500 !important;
            }
            div.span{
                width: 50px;
                padding: 10px;
                background-color: #000;
                border-radius: 50%;
                text-align: center;
            }
            div.span2{
                width: 55px;
                padding: 8px;
                background-color: #000;
                border-radius: 50%;
                text-align: center;
            }
            .pay .svg1{
                width:30px;
                height:30px;
            }
            .pay .svg2{
                font-size:30px;
                font-weight: 700;
            }
            .pay p{
                font-size:14px !important;
            }
            .actions-div{
                display:flex;
                justify-content:space-between;
            }
        }

        
         /* Styles for the slideshow container and images */
         .slideshow-container {
            max-width: 100%;
            position: relative;
            /* margin: auto; */
        }

        .mySlides {
            display: none;
            width: 100%;
        }

        .text1 {
            color: white;
            font-size: 18px;
            text-align:center;
            position: absolute;
            bottom: 40px;
            width:100%;
            font-size:18px;
            font-weight:700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* Style for the navigation dots */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        
        </style>
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
           
                <!-- <div class="row layout-top-spacing"> -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-5">
                        <div class="widget widget-card-one p-2">
                            <div class="widget-content">
                            <p class=" title-nam p-1 mb-1" style=""><span class="text-success">My Wallet</span>  - Account </p>     
                                <h5 class="p-1 balance" style=" color:#fff">$<?= isset($walletbal) ? number_format($walletbal) : "" ?></h5>
                                <div class="actions-div pt-1 pb-1">
                                    <div class="pay text-center" >
                                        <div class="span"><a href="deposit.php"><svg class="svg1" xmlns="http://www.w3.org/2000/svg" id="Layer_1"  data-name="Layer 1" viewBox="0 0 24 24">
                                        <path fill="#ffffff" d="m20,16c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm3-8c-.553,0-1,.448-1,1v12c0,.551-.448,1-1,1H5c-1.654,0-3-1.346-3-3v-10s0-.004,0-.005c.854.64,1.903,1.005,2.999,1.005h10c.553,0,1-.448,1-1s-.447-1-1-1H5c-.856,0-1.653-.381-2.217-1.004.549-.607,1.335-.996,2.217-.996h7c.553,0,1-.448,1-1s-.447-1-1-1h-7c-3,0-5,2.5-5,5v10c0,2.757,2.243,5,5,5h16c1.654,0,3-1.346,3-3v-12c0-.552-.447-1-1-1Zm-6.297-3.789l1.297-1.281v6.07c0,.552.447,1,1,1s1-.448,1-1V2.948l1.303,1.268c.194.189.445.284.697.284.261,0,.521-.101.717-.302.385-.396.377-1.029-.02-1.414l-2.227-2.168c-.821-.819-2.152-.818-2.97-.004l-2.204,2.177c-.393.388-.396,1.021-.009,1.414.39.394,1.021.396,1.415.009Z"/>
                                        </svg></div>
                                        <p class="p-1 mb-1 pay-text">Deposit</p></a>
                                    </div>
                                    <div class="pay text-center" >
                                    <div class="span2"><a href="requestwith.php"><svg class="svg2" fill="#ffffff" version="1.0" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512.000000 512.000000"
                                         preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"  stroke="none"> <path  d="M2335 4786 c-37 -17 -70 -52 -84 -89 -7 -19 -11 -187 -11 -490 l0 -461 -122 121 c-132 130 -156 143 -235 128 -49 -9 -109 -69 -118 -118 -17 -88 -16 -90 283 -389 239 -239 282 -278 314 -283 90 -17 91 -16 390 283 299 299 300 301 283 389 -9 49 -69 109 -118 118 -79 15 -103 2 -234 -128 l-122 -120 -3 476 c-3 462 -4 476 -24 503 -11 15 -32 37 -46 47 -34 25 -113 32 -153 13z"/>
                                            <path d="M1001 3504 c-170 -46 -302 -180 -346 -351 -23 -87 -22 -2380 0 -2468 45 -172 179 -305 352 -350 86 -23 3020 -23 3106 0 173 45 307 178 352 350 13 51 15 179 15 915 0 930 1 909 -56 1023 -35 68 -145 175 -212 206 l-52 24 0 122 c0 188 -35 289 -138 397 -62 65 -159 120 -246 138 -34 7 -135 10 -265 8 -230 -3 -235 -5 -285 -72 -29 -39 -29 -133 0 -172 50 -67 55 -69 294 -74 201 -5 221 -7 246 -26 60 -44 69 -67 72 -185 l4 -109 -1390 2 c-1387 3 -1391 3 -1418 24 -53 39 -69 71 -69 134 0 63 16 95 69 134 25 19 45 21 246 26 239 5 244 7 294 74 29 39 29 133 0 172 -50 68 -54 69 -297 71 -170 2 -235 -1 -276 -13z m1541 -944 c1512 -5 1517 -5 1544 -26 66 -49 69 -58 72 -265 l3 -189 -268 0 c-206 0 -282 -3 -326 -15 -258 -67 -417 -329 -352 -580 45 -172 179 -305 352 -350 44 -12 120 -15 326 -15 l268 0 -3 -189 c-3 -207 -6 -216 -72 -265 -27 -21 -28 -21 -1526 -21 -1498 0 -1499 0 -1526 21 -15 11 -37 33 -48 48 -21 27 -21 36 -24 951 l-2 924 32 -12 c25 -9 425 -13 1550 -17z m1618 -960 l0 -160 -255 0 c-281 0 -301 3 -348 59 -48 57 -48 145 0 202 47 55 63 58 346 59 l257 0 0 -160z"/>
                                            </g></svg></div>
                                        <p class="p-1 mb-1 pay-text" >Withdraw</p></a>
                                    </div>
                                    <div class="pay text-center" >
                                    <div class="span"><a href="investments.php"><svg class="svg1" xmlns="http://www.w3.org/2000/svg"  id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                        <path fill="#ffffff" d="m24,19c0,1.654-1.346,3-3,3v1c0,.552-.447,1-1,1s-1-.448-1-1v-1h-.268c-1.067,0-2.063-.574-2.598-1.499-.277-.478-.113-1.089.364-1.366.48-.278,1.091-.113,1.366.365.179.308.511.5.867.5h2.268c.552,0,1-.448,1-1,0-.378-.271-.698-.644-.76l-3.041-.507c-1.342-.223-2.315-1.373-2.315-2.733,0-1.654,1.346-3,3-3v-1c0-.552.447-1,1-1s1,.448,1,1v1h.268c1.067,0,2.063.574,2.598,1.499.277.478.113,1.089-.364,1.366-.481.276-1.091.112-1.366-.365-.179-.308-.511-.5-.867-.5h-2.268c-.552,0-1,.448-1,1,0,.378.271.698.644.76l3.041.507c1.342.223,2.315,1.373,2.315,2.733ZM7,9c-.552,0-1,.448-1,1v13c0,.552.448,1,1,1s1-.448,1-1v-13c0-.552-.448-1-1-1Zm-5,3c-.552,0-1,.448-1,1v10c0,.552.448,1,1,1s1-.448,1-1v-10c0-.552-.448-1-1-1Zm10-6c-.552,0-1,.448-1,1v16c0,.552.448,1,1,1s1-.448,1-1V7c0-.552-.448-1-1-1Zm10,2c.553,0,1-.448,1-1V1c0-.552-.447-1-1-1s-1,.448-1,1v6c0,.552.447,1,1,1Zm-5,1c.553,0,1-.448,1-1v-4c0-.552-.447-1-1-1s-1,.448-1,1v4c0,.552.447,1,1,1Z"/>
                                        </svg></div>
                                        <p class="p-1 mb-1 pay-text">Invest</p></a>
                                    </div>
                                    <div class="pay text-center" >
                                    <div class="span"><a href="refer.php"><svg class="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><g id="_01_align_center" data-name="01 align center"><path fill="#ffffff" d="M1.444,6.669a2,2,0,0,0-.865,3.337l3.412,3.408V20h6.593l3.435,3.43a1.987,1.987,0,0,0,1.408.588,2.034,2.034,0,0,0,.51-.066,1.978,1.978,0,0,0,1.42-1.379L23.991.021ZM2,8.592l17.028-5.02L5.993,16.586v-4Zm13.44,13.424L11.413,18h-4L20.446,4.978Z"/></g></svg></div>
                                        <p class="p-1 mb-1 pay-text">Refer</p></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div
                    </div>

                    <!-- <div class="col-12 mt-5 text-center">
                            <img src="assets/img/single-blog-big.jpg" class="img-fluid" alt="">
                        </div> -->

                    <div id="alertCustom" class="col-lg-12 mt-3 p-0">
                            <div class="statbox widget box box-shadow ">

                        <?php
                        if($welbonus_notice == 1){
                            echo '<div class="alert alert-arrow-right alert-icon-right alert-light-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                <strong>Notice!</strong> Your deposit is been processed and will be approved soon.
                            </div>';
                        }
                        
                       if($welbonus_notice == 2){
                          echo '<div class="alert alert-arrow-left alert-icon-left alert-light-success " role="alert">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> -->
                                    <div class="media">
                                    <!-- <div class="alert-icon"> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                    <!-- </div> -->
                                    <div class="media-body" style="display: flex; justify-content:space-between">
                                        <div class="alert-text">
                                            <strong>Congrats! </strong><span> Your deposit has been approved. You can now enjoy our flexible investment plans and other features</span> 
                                        </div>
                                        <div class="alert-btn">
                                        <form  method="POST" action="../configs/setwelbonus.php">
                                        <input type="hidden" name="username" value="<?= $username ?>">
                                            <!-- <input type="text" class="form-control" name="welbonus_notice" value="0"> -->
                                            <!-- <button type="button" class="btn btn-default btn-dismiss mr-0">Ok</button> -->
                                            <button type="submit" name="set_welbonus" class="btn btn-default  mr-0">Ok</button>
                                        </div>
                                    </div>
                                    </div>
                            </div>';
                        }
                        ?>
                            </div>
                        </div>


                        <h5 style="margin-top: 10px; font-weight:700">Dashboard</h5>
                        <div class=" layout-top-spacing pl-0 pr-1 sizing1-div">
                            
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-5 col-8 sizing1 layout-spacing p-0">
                                <div class="widget widget-card">
                                    <div class="widget-content">
                                    <div class="balholder d-flex align-items-center">
                                            <div class="balimg">
                                                <img src="../blue/download-bitcoin-purple.png" alt="">
                                            </div>
                                               <div class=" ml-2">
                                                    <h3 class=" bal-title mb-2">Wallet Balance</h3>
                                                    <span class="bal widget__title "><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($walletbal) ? number_format($walletbal) : '0' ;?>.00</span>
                                                </div>
                                            </div>
                                            <p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 sizing1 layout-spacing">
                                <div class="widget widget-card">
                                    <div class="widget-content">
                                    <div class="balholder d-flex align-items-center">
                                            <div class="balimg">
                                                <img src="../blue/cost-efficiency-green.png" alt="">
                                            </div>
                                               <div class=" ml-2">
                                                    <h3 class=" bal-title mb-2">Current Investment</h3>
                                                    <span class="bal widget__title "><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($totalwith) ? number_format($totalwith) : '0' ;?>.00</span>
                                                </div>
                                            </div>
                                            <?php if($totalwith == 0 || $totalwith == "0"){
                                            echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">You have no running investment</p>';
                                            }else{
                                                echo '<p style="margin-top: 30px; font-size:18px; color:#09B66D; margin-bottom:0">Running ...</p>';
                                            }?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 sizing1 layout-spacing">
                                <div class="widget widget-card">
                                    <div class="widget-content">
                                    <div class="balholder d-flex align-items-center">
                                            <div class="balimg">
                                                <img  src="../blue/add-bitcoins-blue.png" alt="">
                                            </div>
                                               <div class=" ml-2">
                                                    <h3 class=" bal-title mb-2">Bonus</h3>
                                                    <span class="bal widget__title "><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($total_bonus) ? number_format($total_bonus) : '0' ;?>.00</span>
                                                </div>
                                            </div>
                                            <?php if($total_bonus == 0 || $total_bonus == "0"){
                                            echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">Refer a friend or make your first deposit</p>';
                                            }else{
                                                echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">Your bonus will be added to your wallet</p>';
                                            }?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 sizing1 layout-spacing">
                                <div class="widget widget-card">
                                    <div class="widget-content">
                                    <div class="balholder d-flex align-items-center">
                                            <div class="balimg">
                                                <img src="../blue/h1-custom-icon-hover-img-5.png" alt="">
                                            </div>
                                               <div class=" ml-2">
                                                    <h3 class=" bal-title mb-2">Earnings</h3>
                                                    <span class="bal widget__title "><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($earns) ? number_format($earns) : '0' ;?>.00</span>
                                                </div>
                                            </div>
                                            <?php if($earns == 0 || $earns == "0"){
                                            echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">Subscribe a plan to start earning</p>';
                                            }else{
                                                echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">Your earnings will appear in your <br> wallet for withdrawal at the end <br> of each investment</p>';
                                            }?>
                                    </div>
                                </div>
                            </div>

        
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 sizing1 layout-spacing">
                                <div class=" widget widget-card">
                                    <div class="widget-content">
                                    <div class="balholder d-flex align-items-center">
                                            <div class="balimg">
                                                <img src="../blue/payment-options-or.png" alt="">
                                            </div>
                                               <div class=" ml-2">
                                                    <h3 class=" bal-title mb-2">Withdrawals</h3>
                                                    <span class="bal widget__title "><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($withdrawal) ? number_format($withdrawal) : '0' ;?>.00</span>
                                                </div>
                                            </div>
                                            <?php if($withdrawal == 0 || $withdrawal == "0"){
                                            echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">You have\'nt made a withdrawal</p>';
                                            }else{
                                                echo '<p style="margin-top: 30px; font-size:18px; color:gray; margin-bottom:0">You can make withdrawals</p>';
                                            }?>
                                    </div>
                                </div>
                            </div>
 
                        </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-four">
                            <div class="widget-heading">
                                <h5 class="">Market Trade</h5>
                            </div>
                            <div class="widget-content">
                                <div class="vistorsBrowser">
                                                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Financial Markets</span></a> by Securedglobalasset</div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                            {
                            "colorTheme": "dark",
                            "dateRange": "12M",
                            "showChart": false,
                            "locale": "en",
                            "width": "100%",
                            "height": "600",
                            "largeChartUrl": "",
                            "isTransparent": false,
                            "showSymbolLogo": true,
                            "showFloatingTooltip": false,
                            "tabs": [
                                {
                                "title": "Indices",
                                "symbols": [
                                    {
                                    "s": "FOREXCOM:DJI",
                                    "d": "Dow 30"
                                    },
                                    {
                                    "s": "INDEX:DEU40",
                                    "d": "DAX Index"
                                    },
                                    {
                                    "s": "FOREXCOM:UKXGBP",
                                    "d": "UK 100"
                                    },
                                    {
                                    "s": "INDEX:BTCUSD",
                                    "d": "BTC/USD"
                                    },
                                    {
                                    "s": "BITSTAMP:BTCUSDT",
                                    "d": "BTC/USDT"
                                    },
                                    {
                                    "s": "ETHBTC",
                                    "d": "ETH/BTC"
                                    },
                                    {
                                    "s": "BITTREX:DOGEUSD",
                                    "d": "DOGE/USD"
                                    },
                                    {
                                    "s": "BINANCE:SHIBUSDT",
                                    "d": "SHIB/USDT"
                                    },
                                    {
                                    "s": "BINANCE:TRXUSDT",
                                    "d": "TRS/USDT"
                                    }
                                ],
                                "originalTitle": "Indices"
                                },
                                {
                                "title": "Futures",
                                "symbols": [
                                    {
                                    "s": "CME_MINI:ES1!",
                                    "d": "S&P 500"
                                    },
                                    {
                                    "s": "CME:6E1!",
                                    "d": "Euro"
                                    },
                                    {
                                    "s": "COMEX:GC1!",
                                    "d": "Gold"
                                    },
                                    {
                                    "s": "NYMEX:CL1!",
                                    "d": "Crude Oil"
                                    },
                                    {
                                    "s": "NYMEX:NG1!",
                                    "d": "Natural Gas"
                                    },
                                    {
                                    "s": "CBOT:ZC1!",
                                    "d": "Corn"
                                    }
                                ],
                                "originalTitle": "Futures"
                                },
                                {
                                "title": "Bonds",
                                "symbols": [
                                    {
                                    "s": "CME:GE1!",
                                    "d": "Eurodollar"
                                    },
                                    {
                                    "s": "CBOT:ZB1!",
                                    "d": "T-Bond"
                                    },
                                    {
                                    "s": "CBOT:UB1!",
                                    "d": "Ultra T-Bond"
                                    },
                                    {
                                    "s": "EUREX:FGBL1!",
                                    "d": "Euro Bund"
                                    },
                                    {
                                    "s": "EUREX:FBTP1!",
                                    "d": "Euro BTP"
                                    },
                                    {
                                    "s": "EUREX:FGBM1!",
                                    "d": "Euro BOBL"
                                    }
                                ],
                                "originalTitle": "Bonds"
                                },
                                {
                                "title": "Forex",
                                "symbols": [
                                    {
                                    "s": "FX:EURUSD"
                                    },
                                    {
                                    "s": "FX:GBPUSD"
                                    },
                                    {
                                    "s": "FX:USDJPY"
                                    },
                                    {
                                    "s": "FX:USDCHF"
                                    },
                                    {
                                    "s": "FX:AUDUSD"
                                    },
                                    {
                                    "s": "FX:USDCAD"
                                    }
                                ],
                                "originalTitle": "Forex"
                                }
                            ]
                            }
                            </script>
                            </div>
                            <!-- TradingView Widget END -->

                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="widget__left ">
                                <h3 class="card__header-title  mb-1" style="font-weight:500; font-size:16px">Exchange</p>
                            </div>
                        
                        <div class="box-body mb-5">							
                        <!-- Crypto Converter ⚡ Widget --><crypto-converter-widget shadow symbol live background-color="#0E1726" color="#303A50" box-shadow="0 8px 16px rgba(169, 194, 209, 0.1)" border-radius="0.60rem" fiat="united-states-dollar" crypto="bitcoin" amount="1" decimal-places="2"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script><!-- /Crypto Converter ⚡ Widget -->
                        </div>
                        
                        
                    
                        <!-- <div class="balholder align-items-center">
                            <div class="" style="margin:20px auto; width:90%; background-image:linear-gradient(to right, #ff8838 0%, #ffa938 100%); padding:20px 0;text-align:center;">
                                <h4 class="card__header-title title-name mb-0" style="font-weight:500; color:#fff;font-size:16px">Trading/Investment Chart View.</h4>
                            </div>
                        </div> -->

            <div class="col-12 " style="background-color: #0E1726; margin-bottom:20px; height:auto; padding:10px 10px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:6px;">
                <div class="slideshow-container">
                    <!-- Slides -->
                        <div class="mySlides">
                        <img style="min-width: 100%; 
                              height: 250px;
                              " alt="Elite Expert Properties" 
                                          src="../../images/slider/home-slider1.jpg" />
                              <!-- <div class="text1">Find Your Dream Home Here.</div> -->
                        </div>
        
                        <div class="mySlides">
                        <img style="max-width: 100%; 
                              height: 250px;
                              " alt="Elite Expert Properties" 
                                          src="../../images/slider/home-slider2.jpeg" />
                            <!-- <div class="text1">Contact Our Agents For a Suitable Home.</div> -->
                        </div>
        
                        <div class="mySlides">
                        <img style="max-width: 100%; 
                              height: 250px;
                              " alt="Elite Expert Properties" 
                                          src="../../images/slider/home-slider3.jpg" />
                          <!-- <div class="text1">Find out your monthly payment to own your dream home.</div> -->
                        </div>
        
                        <!-- Navigation dots -->
                        <div style="text-align:center; margin-top:5px">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                   </div>           	
            </div>
                     

            <div id="modalBasic"  class="col-lg-12 layout-spacing d-none">
                            <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Phone Number</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <form  method="POST" action="../configs/changephone.php">
                            <div class="modal-body">
                                <div class="form-row mb-2 ">
                                    <div class="form-group col-12 ">
                                            <label class="label" for="phone">Enter New Phone no: *</label>
                                            <input type="hidden" name="username" value="<?= $username ?>">
                                            <input type="text" class="form-control" name="phone" value="<?= isset($phone) ? $phone : ""?>" id="phone" placeholder="Enter Your Phone No" required>
                                        </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                <button type="submit" name='changeno' class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                   
            <!-- Modal End -->
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
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- <script src="assets/js/libs/jquery-3.1.1.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
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
    <script src="assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
   
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
       <!-- toastr -->
       <script src="assets/js/components/notification/custom-snackbar.js"></script>
       <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <?php
	if(!empty($_GET['suc'])){
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

<script>
     var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 4000); // Change slide every 2 seconds
    }
</script>
</body>

</html>