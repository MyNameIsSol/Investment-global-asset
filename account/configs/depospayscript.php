<?php
require_once 'phpmailer/PHPMailerAutoload.php';
include '../configs/dbcon.php';
if(isset($_POST['makepayment'])){
	$fundamount=mysqli_real_escape_string($dbconnec,$_POST['invest_amount']);
	$paytype=mysqli_real_escape_string($dbconnec,$_POST['paytype']);
	
	$username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
	$useremail=mysqli_real_escape_string($dbconnec,$_POST['email']);

	$fn=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
	$ln=mysqli_real_escape_string($dbconnec,$_POST['lastname']);

	$img =  $_FILES['file_upload']['name'];																												
	
	$depositid = $_POST['depoid'];

    $welbonus = 50;
	
	$date= date('Y-m-d H:i:s');
	$status="Processing";

	$transtype = "Deposit";

    $sql = "SELECT * FROM users WHERE username='$username' ";
	$result= mysqli_query($dbconnec,$sql);
	$result_checker= mysqli_num_rows($result);
	if($result_checker > 0){
	while($data = mysqli_fetch_assoc($result)){
	$walletbal= $data['walletbal'];
    }
    }

$target = "../clientarea/payment/".basename($_FILES['file_upload']['name']);
$fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
$fileSize = $_FILES['file_upload']['size'];
$returned_val = validateImageUpload($target, $fileType, $fileSize);
if($target == $returned_val){ 

    $sql="INSERT INTO depositrequest (username,amount,proof,dep_date,statusofdep,depositid,walletbal,email,transtype) VALUES ('$username','$fundamount','$img','$date','$status','$depositid','$walletbal','$useremail','$transtype')";
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
	if(!mysqli_query($dbconnec,$sql)){
		die("Error: ".mysqli_error($dbconnec));
		exit;
	}

	$sql = "UPDATE users

    SET welbonus='$welbonus'

    WHERE username = '$username'
    ";
     if(!mysqli_query($dbconnec,$sql)){
		die("Error: ".mysqli_error($dbconnec));
		exit;
	}

	$sql = "SELECT * FROM notifications WHERE username='$username' ";
	$result = mysqli_query($dbconnec,$sql);
	$result_check = mysqli_num_rows($result);
	if($result_checker > 0){
	while($data = mysqli_fetch_assoc($result)){
	$welbonus_notice = $data['welbonus_notice'];
	}
	}

	if($welbonus_notice < 1){
		$sql = "UPDATE notifications

		SET welbonus_notice=1

		WHERE username = '$username'";
		if(!mysqli_query($dbconnec,$sql)){
			die("Error: ".mysqli_error($dbconnec));
			exit;
		}
	}

	// MAIL TO ADMIN FOR PAYMENT
	 // admin receive email for payment in usdt
	 $site_domain = 'securedglobalasset.com';
	 //from: sender name
	 $site_name = 'Securedglobalasset LLC';
	 //from: sender email
	 $sitesupport_email = "info@securedglobalasset.com";
	 
	 $site_email = 'secureglobalasset@gmail.com';
	 //to: receiver email
	 $receiver_email = $site_email;
  
	 $title = $site_domain.' Deposite request ';
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
  
       $mail->Body ='<!DOCTYPE html>
  <html>
  <head>
  <title>'.$title. '</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
  /* FONTS */
  @import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");
  
  /* CLIENT-SPECIFIC STYLES */
  body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
  table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
  img { -ms-interpolation-mode: bicubic; }
  
  /* RESET STYLES */
  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
  table { border-collapse: collapse !important; }
  body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
  
  /* iOS BLUE LINKS */
  a[x-apple-data-detectors] {
	 color: inherit !important;
	 text-decoration: none !important;
	 font-size: inherit !important;
	 font-family: inherit !important;
	 font-weight: inherit !important;
	 line-height: inherit !important;
  }
  
  /* MOBILE STYLES */
  @media screen and (max-width:600px){
	 h1 {
		 font-size: 32px !important;
		 line-height: 32px !important;
	 }
  }
  
  /* ANDROID CENTER FIX */
  div[style*="margin: 16px 0;"] { margin: 0 !important; }
  </style>
  </head>
  <body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
  
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
				   <img alt="logo" src="https://www.securedglobalasset.com/account/logo/Obidient_logo.png"  style="max-height: 240px; max-width: 70px;" border="0">
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
				   <p style="font-size: 18px; font-weight: 600; margin: 10px 13px;">Hello Sir,</p>
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
			  
			   <p style="margin:10px 13px; font-size: 14px;">A client just  initiated a new subscription request, here is the details of the client; </p>
			 </td>
		   </tr>
		   
		   <!-- COPY -->
		   <tr>
			 <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
			   <p style="margin: 10px 13px; font-size: 14px;">Username: '.$username.'</p>
			   <p style="margin: 10px 13px; font-size: 14px;">Email: '.$useremail.'</p>
			   <p style="margin: 10px 13px; font-size: 14px;"> Amount: $'.$fundamount.'</p>
			   <p style="margin: 10px 13px; font-size: 14px;">Payment Type: '.$paytype.'</p>
			   <p style="margin: 10px 13px; font-size: 14px;">Date of Deposit: '.$date.'</p>
			   <p style="margin: 10px 13px; font-size: 14px;">Proof Of Payment: <a href="https://www.securedglobalasset.com/account/clientarea/payment/'.$img.'">View Payment</a></p>
			   <p style="margin: 10px 13px; font-size: 14px;">Kindly verify and approve this payment.</p>
			 </td>
		   </tr>
		   <!-- COPY -->
		   <tr>
			 <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
			   <p style="margin:10px 13px; font-size: 14px;">Warm regards,</p>
			 </td>
		   </tr>
		  
		   <!-- COPY -->
		   <tr>
			 <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
			   <p style="margin:10px 13px; font-size: 14px;">From ' . $site_name . '</p>
			 </td>
		   </tr>
		 </table>
	 </td>
  </tr>
  <!-- FOOTER -->
  <tr>
	 <td align="center" style="padding: 0px 10px 50px 10px;">
  
	 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
	
   </table>
	 </td>
  </tr>
  </table>
  
  </body>
  
  </html>';
  $mail->send();

  $msg = "Successful! please wait while we comfirm your payment.";
  header ("Location:../clientarea/dashboard.php?suc=".$msg);
  exit();

}else{
    $error = $returned_val;
    header("Location:../clientarea/dashboard.php?error=".$error);
}

}else{
    $errer = "Payment declined";
    header ("Location:../clientarea/dashboard.php?error=".$error);
  exit();
}

//standard image validation
function validateImageUpload($file,$fileExe,$fileSize){
    $exeArray = array("jpg","png","jpeg","pdf");
    if(file_exists($file)){
        unlink($file);
    }
        if(in_array($fileExe,$exeArray)){
            if($fileSize < 2097152){
                $message = $file;
            }else{
                $message = "File size too large, Must be exactly 2 MB";
            }
        }else{
            $message = "File format not allowed, please choose a jpg or png or jpeg or gif file.";
        }
        return $message;
}
?>