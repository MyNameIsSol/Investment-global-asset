<?php
session_start();
include '../configs/dbcon.php';
$username = $_SESSION['username'];
if(!isset($username)){
    header("Location:../my_account.php?session_expire");
    exit();
}else{
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($dbconnec, $sql);
    $result_checker = mysqli_num_rows($result);
    if ($result_checker > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $phone = $data['phone'];
            $usd = $data['username'];
            $country = $data['country'];
            $state = $data['state'];
            $addrs = $data['street'];
            $addrs = $data['street'];
            $walletbal = $data['walletbal'];
            $totalwith = $data['totalwith'];
            $earns = $data['earns'];
            $tearns = $data['tearns'];
            $currency = $data['currency'];
            $welbonus = $data['welbonus'];
            $voucher = $data['voucher'];
            $access = $data['access'];
            $total_bonu = $data['refpaid'];
            $withdrawal = $data['withdrawal'];
            $active = $data['active'];
            $profileimg = $data['profileimg'];
            $statusofinvest = $data['statusofinvest'];  
        }
    }

    $sql = "SELECT * FROM notifications WHERE username='$username'";
    $result = mysqli_query($dbconnec, $sql);
    $result_checker = mysqli_num_rows($result);
    if ($result_checker > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $welbonus_notice = $data['welbonus_notice'];
            $refbonus_notice = $data['refbonus_notice'];
            $voucher_notice = $data['voucher_notice'];
            $sub_notice = $data['sub_notice'];
            $deposit_notice = $data['deposit_notice'];
            $invest_notice = $data['invest_notice'];
            $withdraw_notice = $data['withdraw_notice'];
        }
    }
}
if($total_bonu = 0 || $total_bonu = ''){
    $total_bonu = 0;
}
$total_bonus = $total_bonu + $welbonus;
$ndate = date("d/m/Y");
$day = date("d, Y");
$month = date("F");
$date = $month." ".$day;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Securedglobalasset | Dashboard </title>
    <link rel="icon" type="image/x-icon" href="../../images/logo/asset-icon.png"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
        }
    </script>
   <script type="text/javascript" src="translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit">
    </script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <!-- <link href="assets/css/dashboard/dash_11.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/dashboard/dash_21.css" rel="stylesheet" type="text/css" /> -->

    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/elements/alert.css">

    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
     <!-- toastr -->
     <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    
     <script src="//code.tidio.co/ktyo8pcguhb03sihedvpwgtvff0rbshz.js" async></script>
</head>
<body>
    <!-- BEGIN LOADER -->
    <!-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div> -->
    
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="../index.php">
                        <img src="../../images/logo/asset-icon.png"  style="width:50px; height:42px;  margin-left:10px;" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <!-- <li class="nav-item theme-text">
                    <a href="../index.php" class="nav-link"> ELONFX </a>
                </li> -->
            </ul>
            <!-- <ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul> -->

            <!-- <ul class="navbar-item  flex-row  text-center">
                <li class="nav-item ">hello
                </li>
            </ul> -->

            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item dropdown message-dropdown">
                <div class="media">
                    <div class="media-body">
                        <div class="">
                            <h4 class="usr-name  mb-1" style="color:gray; font-size:18px;">Welcome back! <?= !empty($username) ? ucfirst($username) : '';?></h4>
                            <p class="msg-title mt-1 mb-1" style="color:gray; font-size:12px; text-align:end">USER</p>
                        </div>
                    </div>
                </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php
                    if(empty($profileimg)){
					echo '<img src="assets/img/profile-16.jpg" alt="profile image">';
                     }else{
                    echo '<img src="img/'.$profileimg.'" class=" bg-primary-light h-40 w-40" alt="" />';
                     }
                     ?>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="userprofile.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="../index.php"><span>home</span></a></li>

                                <li class="nav-item " style="margin-left:40px">
                                    <div class="header__">
                                <!-- <div class="lang" style="margin:0 auto; width:200px;">
                                    <div id="google_translate_element"></div>
                                </div> -->

                                <div id="google_translate_element">
                                    <div class="skiptranslate goog-te-gadget" dir="ltr" s="">
                                        <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"></div> 
                                    </div>
                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({pageLanguage: 'en', 
                                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
                                    </script>   
                                    <script type="text/javascript" src="translate_a/element.js?cb=googleTranslateElementInit"></script>
                                </div>
                            </div>

                                </li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme" style="">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">

              <li class="menu">
                    <a href="dashboard.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>   
                    </li>
                  
                    <li class="menu">
                    <a href="deposit.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Make Deposit</span>
                            </div>
                        </a>
                    </li>
                  
                   
                    <li class="menu">
                        <a href="investments.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Investment Plans</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="investhistory.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Investment History</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="requestwith.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span>Request Withdrawal</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="deposithistory.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <span>Deposit History</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="withdrawhistory.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span>Withdrawal History</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="refer.php"  aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                <span>Refer a Friend</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
       
        <!--  END SIDEBAR  -->