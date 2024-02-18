<?php
require_once 'phpmailer/PHPMailerAutoload.php';

  include 'dbcon.php';
    if(isset($_POST['withdrawal'])){

$btcaddr=mysqli_real_escape_string($dbconnec,$_POST['btcaddr']);
!empty($_POST['acctname']) ? $acctname=mysqli_real_escape_string($dbconnec,$_POST['acctname']) : $acctname=" ";
!empty($_POST['acctnumber']) ? $acctnumber=mysqli_real_escape_string($dbconnec,$_POST['acctnumber']) : $acctnumber=" ";
!empty($_POST['bankname']) ? $bankname=mysqli_real_escape_string($dbconnec,$_POST['bankname']) : $bankname=" ";
$amount=mysqli_real_escape_string($dbconnec,$_POST['amount']);


$walletbal=mysqli_real_escape_string($dbconnec,$_POST['walletbal']);
$earnings=mysqli_real_escape_string($dbconnec,$_POST['earn']);

$username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
$useremail=mysqli_real_escape_string($dbconnec,$_POST['email']);
$firstname=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
$lastname=mysqli_real_escape_string($dbconnec,$_POST['lastname']);


$date= date('Y-m-d H:i:s');
$status="Pending";

$withid=uniqid();
$withid = "wt".substr($withid,0,3).substr($withid,-3,3);


$transtype = "Withdrawal";

$sql="INSERT INTO withdrawalrequest (username,btcaddr,acctname,acctnumber,bankname,amount,with_date,statusofwith,walletbal,withdrawalid,email,transtype) VALUES ('$username','$btcaddr','$acctname','$acctnumber','$bankname','$amount','$date',' $status','$earnings', '$withid','$useremail','$transtype')";

// admin receive email for client initiating withdrawal
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

$title = 'Withdrawal Request from: '.$username;

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
              <p style="margin:10px 13px; font-size: 12px;">You have a withdrawal request from;</p>
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
          <p style="margin: 10px 13px; font-size: 12px;">Email: '.$useremail.'</p>
          <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$amount.'</p>
          <p style="margin: 10px 13px; font-size: 12px;">BTC Address: '.$btcaddr.'</p>
          <p style="margin: 10px 13px; font-size: 12px;">Wallet Balance: '.$walletbal.'</p>
          <p style="margin: 10px 13px; font-size: 12px;">Date: '.$date.'</p>
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


//user WITHDRAWAL MAIL
//from: site domain name
$site_domain = 'securedglobalasset.com';
//from: sender name
$site_name = 'Securedglobalasset';
//from: sender email
$sitesupport_email = "info@securedglobalasset.com";
//to: receiver name
$receiver_name = $firstname;
//to: receiver email
$receiver_email = $useremail;

$title = 'Withdrawal Request';

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
              <p style="margin:10px 13px; font-size: 12px;">You have initiated a withdrawal of $'.$amount.'</p>
              <p style="margin:10px 13px; font-size: 12px;">to your wallet address '.$btcaddr.'</p>
              <p style="margin:10px 13px; font-size: 12px;">kindly be patient while the withdrawal is processed.</p>
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
      <p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.comm. All rights reserved.</p>
      </td>
    </tr>
    </table>
    </td>
  </tr>
</table>
</body>';
$mail->send(); 

if(!mysqli_query($dbconnec,$sql)){
  die("Error: ".mysqli_error($dbconnec));
  exit;
}


$sql = "UPDATE users

SET btcaddr='$btcaddr',acctname='$acctname',acctnumber='$acctnumber',bankname='$bankname'

WHERE username='$username'

";
if(!mysqli_query($dbconnec,$sql)){
  die("Error: ".mysqli_error($dbconnec));
  exit;
}

$msg="Your withdrawal request has been sent";
header("Location:../clientarea/requestwith.php?suc=".$msg);
exit();

}else{
    $error = "Sorry your request was not successful";
header("Location:../clientarea/requestwith.php?error=".$error);
exit();
}


