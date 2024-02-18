
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Securedglobalasset | login</title>
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

    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>

  
</head>


<script>
    function jsValidatel(){
        var uname = document.forms['logi']['uname'].value;
        var pwd = document.forms['logi']['pwd'].value;

        if(uname == ''){
        alert("Error! Please enter your user name");
        return false;

        }else if(pwd == ''){
        alert("Error! Please enter your password");
        return false;

        }else{
            return true;
        }
    }
    </script>

<body class="form">

<div id="alertinfo" style="text-align:center; width:80%; margin:10px auto;">
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
		echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'> Registration successfully...Please <a href='login.php'> LOGIN </a> </p>";
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

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                   <a href="../index.html"> <img style="width:90px" src="../images/logo/asset-icon.png" alt="Securedglobalasset Logo"></a>

                        <h1 class="mt-3">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>
                        
                        <form class="text-left"  method="post" action="configs/loginscript.php" name="logi" onsubmit="return jsValidatel()">
                            <div class="form">

                            <div id="email-field" class="field-wrapper input">
                                    <label for="email">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="uname" name="uname" type="text" value="<?= isset($_COOKIE['name']) ? $_COOKIE['name'] : '';  ?>" class="form-control" placeholder="Username">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="lost-password.php" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="pwd" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                          <input type="checkbox" name="remember" id="remember" class="new-control-input">
                                          <span class="new-control-indicator"></span><span>Remember me</span>
                                        </label>
                                    </div>

                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="login" class="btn" style="background-color:#6c63fd; color:#fff;" value="">Sign in</button>
                                    </div>
                                </div>

                               

                                <p class="signup-link">Not registered ? <a href="signup.php">Create an account</a></p>

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