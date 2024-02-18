<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Securedglobalasset | Signup</title>
    <link rel="icon" type="image/x-icon" href="../images/logo/asset-icon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />


</head>

<script>
        function jsvalidater(){
            var uname = document.forms['reg']['uname'].value;
            var email = document.forms['reg']['email'].value;
            var country = document.forms['reg']['country'].value;
            var phone = document.forms['reg']['phone'].value;
            var pwd = document.forms['reg']['pwd'].value;
		      	var cpwd = document.forms['reg']['cpwd'].value;
		      	var terms = document.forms['reg']['agree'].value;
            
          if(uname == ''){
          alert("Error! Please enter your user name");
          return false;

          }else if(email == ''){
          alert("Error! Please enter your Email address");
          return false;

          }else if(phone == ''){
          alert("Error! Please enter your phone number");
          return false;

          }else if(country == ''){
          alert("Error! Please enter your country name");
          return false;

          }else if(pwd == ''){
          alert("Error! Please enter your password");
          return false;

          }else if(pwd != cpwd){
          alert("Error! Your password does not match.");
          return false;

          }else if(terms == ''){
          alert("Error! You have to agree with the Terms and Condition!");
          return false;

          }else{ 
          return true;
          }
        }
    </script>

<body class="form">
<div style="text-align:center; width:80%; margin:15px auto 0;">
<?php

$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($url, 'session_expire') == true){
    echo "<p class='suc alert alert-danger'>Warning! Session expired, please login again</p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
}
if(strpos($url, 'tempty') == true){
    echo "<p class='suc alert alert-danger'>Warning! You have to agree with the Terms and Condition</p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
}
  if(strpos($url, 'tableerror') == true){ 
    echo "<p class='suc alert alert-danger'>Server down! error creating database table  </p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
  }

	if(strpos($url, 'signupempty') == true){
		echo "<p class='suc alert alert-danger'>Warning! Please, fill out all inputs</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}
    if(strpos($url, 'error') == true){
		echo "<p class='suc alert alert-danger'>Invalid Process...  </p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}
	if(strpos($url, 'invalidemail') == true){
		echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'>Error! Invalid Email Address</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}

	if(strpos($url, 'uidtaken') == true){
		echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'>Warning! Email or Username already exit</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}

	if(strpos($url, 'signupsuc') == true){
		echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'> Registration successfully...Please <a href='my_account.php'> LOGIN </a> </p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
	 }

     if(strpos($url, 'loginempty') == true){
        echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'> Warning! Please fill out all inputs</p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
      }
      if(strpos($url, 'invalidpwd') == true){
        echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'>Error! Invalid Password</p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
      }
      if(strpos($url, 'deactiveacct') == true){
        echo '<script>alert("Warning! Your Investment Account has been deactivated, please contact our support service.");</script>';
      }

?>
</div>

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                    <a href="../index.html"> <img style="width:90px" src="../images/logo/asset-icon.png" alt="Securedglobalasset Logo"></a>

                        <h1 class="mt-3">Register</h1>
                        <p class="signup-link register">Already have an account? <a href="my_account.php">Log in</a></p>
                        <form class="text-left" method="post" action="configs/regscript.php" name="reg" onsubmit="return jsvalidater()">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <input id="username" name="uname" type="text" class="form-control" placeholder="Username">
                                </div>

                                <div id="email-field" class="field-wrapper input">
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email Address">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <input id="username" name="phone" type="text" class="form-control" placeholder="Phone">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <input id="username" name="country" type="text" class="form-control" placeholder="Country">
                                </div>

                                <div id="password-field" class="field-wrapper input ">
                                <div class="d-flex justify-content-between">
                                        <span class="forgot-pass-link">Please provide a strong password</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="pwd" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <input id="password" name="cpwd" type="password" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                <?php
                            $url="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if(isset($_GET['ref'])){
                            $refname = mysqli_real_escape_string($dbconnec,$_GET['ref']);
                            }
                        ?> 
                                    <input id="username" name="refid" value="<?= !empty($refname) ? $refname : '';?>" type="hidden" class="form-control" placeholder="Referral">
                                </div>

                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                          <input type="checkbox" name="agree" value="I agree" class="new-control-input">
                                          <span class="new-control-indicator"></span><span>I agree to the <a href="../terms.html">  terms and conditions </a></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="signup" class="btn" style="background-color:#6c63fd; color:#fff;" value="">Sign up</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>


     <!-- BEGIN THEME GLOBAL STYLE -->
     <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>

</body>

</html>