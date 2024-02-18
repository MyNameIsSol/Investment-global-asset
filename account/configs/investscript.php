<?php
	require_once 'phpmailer/PHPMailerAutoload.php';
	include 'dbcon.php';
	if(isset($_POST['invest'])){

		 // GET THE DATA
    $plan=mysqli_real_escape_string($dbconnec,$_POST['plan']);
    $percent=(int)mysqli_real_escape_string($dbconnec,$_POST['percent']);
    $invest_amount=mysqli_real_escape_string($dbconnec,$_POST['invest_amount']);
    $investtype=mysqli_real_escape_string($dbconnec,$_POST['investtype']);
    $walletbal=mysqli_real_escape_string($dbconnec,$_POST['walletbal']);
    $welbonus=mysqli_real_escape_string($dbconnec,$_POST['welbonus']);
    $email=mysqli_real_escape_string($dbconnec,$_POST['email']);

    $username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
    $firstname=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($dbconnec,$_POST['lastname']);
    $investmentid=uniqid();
    $investmentid = "iv".substr($investmentid,0,3).substr($investmentid,-3,3);

         // CALCULATE PROFIT

          $percent = $percent / 100;
          $earnings = $invest_amount * $percent;
          date_default_timezone_set('Africa/Lagos');
          $date= date('Y-m-d H:i:s');
          $earning_date = date('Y-m-d',strtotime('+7 day'.date('Y-m-d')));
          $status="Processing";
          $transtype = "Investment";

          $sql="INSERT INTO investments (username,plan,amount,invest_date,statusofinvest,investmentid,invest_type,walletbal,email,transtype) VALUES ('$username','$plan','$invest_amount','$date','$status','$investmentid','$investtype','$walletbal','$email','$transtype')";
          mysqli_query($dbconnec,$sql);

       // admin receive email for client initiating investment
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	$site_email = 'secureglobalasset@gmail.com';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = "Admin";
	//to: receiver email
	$receiver_email = $site_email;

	$title = 'New Investment from: '.$username;

  $mail = new PHPMailer;
	$mail->isSMTP();
	// $mail->SMTPDebug = 2;
	$mail->Host='www.securedglobalasset.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username=$sitesupport_email;
	$mail->Password='globalasset100%';

	$mail->setFrom($sitesupport_email,$site_name);
	$mail->addAddress($receiver_email);
	$mail->addReplyTo($sitesupport_email,$site_name);

	$mail->isHTML(true);
	$mail->Subject=$title;
	$mail->Body='<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
            
	<!-- HIDDEN PREHEADER TEXT -->
	<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
		
	</div>
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<!-- LOGO -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
					<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
					  <a href="#" target="_blank">
					  <img alt="logo" src="https://securedglobalasset.com/images/logo/asset-logo.jpg"  style="max-height: 80px; max-width: 70px;" border="0">
					  </a>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
		<!-- HERO -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px 20px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
						  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Dear '.$receiver_name.',</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- COPY BLOCK -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
							  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated an investment, here is the details of the client;</p>
					</td>
				  </tr>
				  <!-- COPY HEADING -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; color: #111111; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
					  <h2 style="font-size: 12px; font-weight: 400; margin: 10px 13px;">User Details:</h2>
					</td>
				  </tr>
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin: 10px 13px; font-size: 12px;">Username: '.$username.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Email: '.$email.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Investment Amount: $'.$invest_amount.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Investment Type: '.$investtype.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Plan: '.$plan.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Date of Investment: '.$date.'.</p>
					</td>
				  </tr>
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();


//user INVESTMENT MAIL
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $firstname;
	//to: receiver email
	$receiver_email = $email;

	$title = 'Successful Investment';

  $mail = new PHPMailer;
	$mail->isSMTP();
	// $mail->SMTPDebug = 2;
	$mail->Host='www.securedglobalasset.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username=$sitesupport_email;
	$mail->Password='globalasset100%';

	$mail->setFrom($sitesupport_email,$site_name);
	$mail->addAddress($receiver_email);
	$mail->addReplyTo($sitesupport_email,$site_name);

	$mail->isHTML(true);
	$mail->Subject=$title;
	$mail->Body='<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
            
	<!-- HIDDEN PREHEADER TEXT -->
	<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
		
	</div>
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<!-- LOGO -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
					<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
					  <a href="#" target="_blank">
					  <img alt="logo" src="https://securedglobalasset.com/images/logo/asset-logo.jpg"  style="max-height: 240px; max-width: 70px;" border="0">
					  </a>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
		<!-- HERO -->
		
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px 20px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
						  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Dear '.$receiver_name.',</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- COPY BLOCK -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
							  <p style="margin:10px 13px; font-size: 12px;">You have successfully made a capital allocation of $'.$invest_amount.'. To see your current investment, kindly login to your account.</p>
							  <p style="margin:10px 13px; font-size: 12px;">If you did not initiate this process, </p>
					  <p style="margin:10px 13px; font-size: 12px;">please contact us.</p>
					</td>
				  </tr>
				  
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
					</td>
				  </tr>
				 
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">From ' . $site_name . '</p>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
		<!-- FOOTER -->
		<tr>
			<td align="center" style="padding: 0px 10px 50px 10px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
		<!-- COPYRIGHT -->
			<tr>
			  <td align="center" style="padding: 50px 10px 10px 10px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com. All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();

$currentwalletbal =  $walletbal - $invest_amount;
$sql = "UPDATE users

SET walletbal='$currentwalletbal',totalwith='$invest_amount'

WHERE username='$username'
";
mysqli_query($dbconnec,$sql);

//PAY WELCOME BONUS
// $sql = "SELECT * FROM users WHERE username='$username'";
// $result = mysqli_query($dbconnec,$sql);
// $result_check = mysqli_num_rows($result);
// if($result_checker > 0){
// while($data = mysqli_fetch_assoc($result)){
// $welbonus = $data['welbonus'];
// $walletbal = $data['walletbal'];
// }
// echo $welbonus;
// exit;
// if($welbonus > 0){
//   $currentwalletbal =  $walletbal + $welbonus;
//   $sql = "UPDATE users

// SET walletbal='$currentwalletbal',welbonus=0

// WHERE username='$username'";
// mysqli_query($dbconnec,$sql);
// }
// }

      $count = 0;
      $statusofinvest = "Processing";
      $sql = "UPDATE users

    SET currentplan='$plan',investedamount='$invest_amount',invest_type='$investtype',statusofinvest='$statusofinvest',timeofinvest='$date',earning_date='$earning_date',earning_amount='$earnings'

    WHERE username='$username'
    ";
   if(!mysqli_query($dbconnec,$sql)){
    die("Error: ".mysqli_error($dbconnec));
    exit;
}
              $msg="Your investment was made successfully";
           header("Location:../clientarea/dashboard.php?suc=".$msg);
         exit();

	}else{
        $error = "Sorry, Your investment was not initiated";
		header("Location:../clientarea/dashboard.php?error=".$error);
         exit();
	}
    