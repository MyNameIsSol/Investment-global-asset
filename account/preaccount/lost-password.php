<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo/orbit-coin.png" sizes="16x16"/>
    <title>Securedglobalasset Account</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<style>
   .img_logo{
    width: 250px;
    height:120px;
    margin: 20px auto;
   }
   .img_logo img{
    width:inherit;
    height: inherit;
   }
   .sign-in .img_logo{
    width: 200px;
    height:100px;
    margin: 20px auto;
   }   
   @media screen and (max-width:768px){
    .img_logo{
    width: 150px;
    height:80px;
    margin: 20px auto;
   }
   .sign-in .img_logo{
    width: 150px;
    height:80px;
    margin: 20px auto;
   }  
   }    
</style>

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
          alert("Error!...  Please enter your user name");
          return false;

          }else if(email == ''){
          alert("Error!... Please enter your Email address");
          return false;

          }else if(country == ''){
          alert("Error!... Please enter your country name");
          return false;

          }else if(phone == ''){
          alert("Error! Please enter your phone number");
          return false;

          }else if(pwd < 6 || pwd == ''){
          alert("Error! your password should be above six characters");
          return false;

          }else if(pwd != cpwd){
          alert("Error! your password does not match.");
          return false;

          }else if(terms == ''){
          alert("Error! You have to agree with the Terms and Condition!");
          return false;

          }else{ 
          return true;
          }
        }
    </script>
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
<div id="container" class="container" >
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
                <form method="post" action="configs/regscript.php" class="" name="reg" onsubmit="return jsvalidater()">
					<div class="form sign-up">
                        <div class="img_logo">
                            <img src="logo/Obidient_logo.png" width="" alt="Securedglobalasset Logo">
                        </div>
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" name="uname" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email" name="email" placeholder="Email">
						</div>
                        <div class="input-group">
							<i class='bx bxs-phone'></i>
							<input type="text" name="phone" placeholder="Phone">
						</div>
                        <div class="input-group">
							<i class='bx bxs-country'></i>
							<input type="text" name="country" placeholder="Country">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="pwd" placeholder="Password">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="cpwd" placeholder="Confirm password">
						</div>
                        <p>
                           <span><input name="agree" type="checkbox" value="Agree" /> </span> 
                            <b>I agree to the <a style="text-decoration: none;" href="terms.php">  terms and conditions </a></b>
                        </p>
                        <!-- <?php
                            $url="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if(isset($_GET['ref'])){
                            $refname = mysqli_real_escape_string($dbconnec,$_GET['ref']);
                            }
                        ?> -->
                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="hidden" name="refid" placeholder="Username">
						</div>
						<button type="submit" name="signup">
							Sign up
						</button>
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
                </form>
				</div>
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
                <form method="post" action="configs/password-resetscript.php" name="reset" onsubmit="return jsValidatep()" class="">
					<div class="form sign-in">
                    <div class="img_logo">
                            <img src="logo/Obidient_logo.png" width="" alt="Securedglobalasset Logo">
                        </div>
                        <div style="padding:10px 20px; color:#BFC8D2">Lost your password? Please enter your email address. You will receive a link to create a new password via email.</div>
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="email" name="email" placeholder="Email">
						</div>
						<button type="submit" name="reset">
							Sign in
						</button>
						<p>
                        <a  style="text-decoration:none; " href="my_account.php"><b>
								Login Your Account?
							</b></a>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
                </form>
				</div>
				<div class="form-wrapper">
		
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome <br>Back
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
                        <h2>
                                Join Us
                        </h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
</body>

<script>
    let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)
</script>
</html>
