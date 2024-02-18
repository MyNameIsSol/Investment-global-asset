<?php
require_once 'phpmailer/PHPMailerAutoload.php';
include 'dbcon.php';
	
if (isset($_POST['sendmail'])) {
  $usd =mysqli_real_escape_string($dbconnec,$_POST['uname']);
  $email =mysqli_real_escape_string($dbconnec,$_POST['email']);
 $mesg = $_POST['mesg'];
 $_POST['phone'] ? $phone = mysqli_real_escape_string($dbconnec,$_POST['phone']) : "";
 $_POST['sub'] ? $sub = mysqli_real_escape_string($dbconnec,$_POST['sub']) : "";

$sql = $sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($dbconnec,$sql);
$result_check = mysqli_num_rows($result);

if($result_check > 0){

while($data = mysqli_fetch_assoc($result)){

    $email = $data['email'];
}

// sendiong email
$sitesupport_email = 'info@securedglobalasset.com';
     
$site_domain = "securedglobalasset.com";
//from: sender name
$site_name = $usd;
//from: sender email
$email = $email;
//to: receiver name
$receiver_name = 'Securedglobalasset LLC';
//to: receiver email
$receiver_email =  'secureglobalasset@gmail.com';


$title =  ' - '.$sub;
$headers = "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
$headers .= "From: $site_name <$email>" . PHP_EOL;
$headers .= "Organization: $uname" . PHP_EOL;
$headers .= "Reply-To: $site_name User <$email>" . PHP_EOL;
$headers .= "Return-Path: <$email>" . PHP_EOL;
$headers .= "X-Priority: 3" . PHP_EOL;
$headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;

$message ='<!DOCTYPE html>
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
<td align="center">
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
      <tr>
      <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
        <a href="#" target="_blank">
        <img alt="logo" src="https://www.securedglobalasset.com/wp-content/uploads/2018/08/capitallogoo.png"  style="max-height: 180px; max-width: 25px;" border="0">
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
          <td bgcolor="#ffffff" align="left" valign="top" style="padding: 40px 30px 5px 30px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
            <p style="font-size: 18px; font-weight: 600; margin: 20px 0;">Dear Sir,</p>
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
      <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 20px 30px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin: 20px 0; font-size: 14px;">'.$masg.'</p>
      </td>
    </tr>

    <!-- COPY -->
    <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 20px 30px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin: 20px 0; font-size: 14px;">Sender Name: '.$usd.'</p>
        <p style="margin: 20px 0; font-size: 14px;">Sender Phone: '.$phone.'</p>
      </td>
    </tr>
    <!-- COPY -->
    <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 20px 30px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:20px  0; font-size: 14px;">Warm regards,</p>
      </td>
    </tr>
   
    <!-- COPY -->
    <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:20px 0; font-size: 14px;">From ' . $site_name . '</p>
      </td>
    </tr>
  </table>
</td>
</tr>
<!-- FOOTER -->
    <tr>
        <td align="center" style="padding: 0px 10px 50px 10px;">
		
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
      
        <!-- PERMISSION REMINDER -->
        <tr>
          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 30px 30px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 14px;">
            <p style="margin:20px 13px; font-size: 14px;">You received this email because you signed up with Securedglobalasset LLC . If it looks weird, <a href="www.securedglobalasset.com" target="_blank" style="color: #4188FA; font-weight: 700;">view it in your browser</a>.</p>
          </td>
        </tr>
        <!-- UNSUBSCRIBE -->
        <tr>
          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 30px 30px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 14px;">
            <p style="margin: 20px 13px; font-size: 14px;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #4188FA; font-weight: 700;">unsubscribe</a>.</p>
          </td>
        </tr>
        <!-- ADDRESS -->
        <tr>
          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 14px;">
            <p style="margin: 20px 13px; font-size: 14px;">The Company\'s address - North East Lincolnshire 28 Dudley Street, Grimsby.</p>
          </td>
        </tr>
    <!-- COPYRIGHT -->
        <tr>
          <td align="center" style="padding: 80px 30px 30px 30px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 14px;">
            <p style="margin: 70px 0 20px; font-size: 14px;">Copyright © 2024 Securedglobalasset LLC. All rights reserved.</p>
          </td>
        </tr>
      </table>
        </td>
    </tr>
</table>

</body>

</html>';
@mail($receiver_email,$title,$message,$headers);




$msgg = "Message sent";
header("Location:../../contact-us.html?mailsuc=".$msgg);
exit();
}else{
    $error =  "Please register and become a member";
    header("Location:../../contact-us.html?mailerr=".$error);
}

}else{
header("Location:../../index.html");
exit();
}