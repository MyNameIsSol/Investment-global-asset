<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Securedglobalasset | Reset-Password</title>
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
<body class="form">

<script>
    function jsValidatep(){
        var email = document.forms['reset']['email'].value;
        if(email == ''){
        alert("Error! Please enter your email address");
        return false;

        }else{
            return true;
        }
    }
    </script>

<div style="text-align:center; width:90%; margin:0 auto;">
<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'session_expire') == true){
        echo '<script>alert("Warning! Session expired, please login again");</script>';
	}
    if(strpos($url, 'signupempty') == true){
        echo '<script>alert("Warning! Please, fill out all inputs");</script>';
	}

	if(strpos($url, 'invalidemail') == true){
        echo '<script>alert("Error! Invalid Email Address");</script>';
	}

	if(strpos($url, 'uidtaken') == true){
        echo '<script>alert("Warning! Email or Username already exist");</script>';
	}

	if(strpos($url, 'signupsuc') == true){
        echo '<script>alert("Success! Registration successfully...Please LOGIN ");</script>';
	 }

      if(strpos($url, 'loginempty') == true){
        echo '<script>alert("Warning! Please fill out all inputs");</script>';
      }

      if(strpos($url, 'invaliduid') == true){
        echo '<script>alert("Error! Invalid Email");</script>';
      }

      if(strpos($url, 'tableerror') == true){
        echo '<script>alert("Error! Error creating database table");</script>';
    }

        if(strpos($url, 'invalidpwd') == true){
            echo '<script>alert("Error! Invalid Password");</script>';
      }

      if(strpos($url, 'mailsent') == true){
        echo '<script>alert("Success! Your password reset has been sent to your email");</script>';
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
                  
                    <a href="../index.html"> <img style="width:80px" src="../images/logo/asset-icon.png" alt="Securedglobalasset Logo"></a>
                        <h1 class="mt-3">Reset Password</h1>
                        <p class="">Enter your email address to retrieve your account.</p>
                        
                        <form class="text-left"  method="post" action="configs/password-resetscript.php" name="reset" onsubmit="return jsValidatep()" class="">
                            <div class="form">

                            <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" value="" class="form-control" placeholder="Email">
                                </div>

                               
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="reset" class="btn" style="background-color:#6c63fd; color:#fff;" value="">Send Reset Mail</button>
                                    </div>
                                </div>

                               

                                <p class="signup-link">Remembered your password? <a href="my_account.php">Sign in here</a></p>

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