<?php
require_once 'phpmailer/PHPMailerAutoload.php';
    if(isset($_POST['reset'])){
         include 'dbcon.php';
         $email = mysqli_real_escape_string($dbconnec,$_POST['email']);
         if(empty($email)){
             header("Location:../lost-password.php?loginempty");
            exit();
            
         }else{
         $sql = "SELECT * FROM users WHERE email='$email'";
         $result = mysqli_query($dbconnec,$sql);
         $result_check = mysqli_num_rows($result);
         if($result_check < 1){
            header("Location:../lost-password.php?invaliduid");
         exit();
         }else{
         while($data = mysqli_fetch_assoc($result)){
         $email =$data['email'];
         $pwd =$data['passwd'];
         $name =$data['username'];

              // SEND MAIL FOR FORGETTEN PASSWORD
          //forgot password email
//from: site domain name
$site_domain = 'securedglobalasset.com';
//from: sender name
$site_name = 'Securedglobalasset';
//from: sender email
$sitesupport_email = "info@securedglobalasset.com";
//to: receiver name
$receiver_name = $name;
//to: receiver email
$receiver_email = $email;

$title = 'Password Reset';

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
              <p style="margin:10px 13px; font-size: 12px;">Your password is '.$pwd.'.</p>
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
    <!-- UNSUBSCRIBE -->
    <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;">
      <p style="margin: 20px 13px; font-size: 12px;">If you did not initiate this, please contact us immediately.</p>
      </td>
    </tr>
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
            
            header("Location:../lost-password.php?mailsent");
            exit();
        }
    }
}
}else{
    header("Location:../lost-password.php?loginempty");
    exit();
}