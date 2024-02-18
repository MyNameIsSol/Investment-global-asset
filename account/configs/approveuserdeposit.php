<?php
	
require_once 'phpmailer/PHPMailerAutoload.php';
include 'dbcon.php';

if(isset($_POST["approvedep"])){

$depositid =mysqli_real_escape_string($dbconnec,$_POST['depositid']);

$sql = "SELECT * FROM depositrequest WHERE depositid='$depositid' ";
$result= mysqli_query($dbconnec,$sql);
$result_checker= mysqli_num_rows($result);

if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){
    $username = $data['username'];
    $amount = $data['amount'];
    $dateofdep = $data['dep_date'];
    $statusofdep = $data['statusofdep'];
    $email = $data['email'];
    $depositid = $data['depositid'];
    $walletbal = $data['walletbal'];

    $latestranstactstatus="Approved";

    // CALACULATE DEPOSIT PLUS CURRENT BALANCE
    // $walletbal = $data['walletbal'];

    $currentwalletbalance=$walletbal+$amount;

    $refbonusfirst = 0.10 * $amount;
    // $refbonusfirst = 5;

    // UPDATE TRANSACTION STATUS
$sql = "UPDATE depositrequest

SET statusofdep='$latestranstactstatus', walletbal='$currentwalletbalance'

WHERE depositid='$depositid'

";

//SEND CREDIT EMAIL TO USER ON DEPOSIT APPROVAL
     //from: site domain name
     $site_domain = 'securedglobalasset.com';
     //from: sender name
     $site_name = 'Securedglobalasset';
     //from: sender email
     $sitesupport_email = "info@securedglobalasset.com";
     //to: receiver name
     $receiver_name = $username;
     //to: receiver email
     $receiver_email = $email;
   
     $title = 'Alert - Cr';
   
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
                   <p style="margin:10px 13px; font-size: 12px;">Your Deposit of $'.$amount.' has been confirmed. </p>
                   <p style="margin:10px 13px; font-size: 12px;">log in your dashboard to select a plan and start earning.</p>
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
           <p style="margin: 20px 13px; font-size: 12px;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #4188FA; font-weight: 700;">unsubscribe</a>.</p>
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


// $currentwalletbal =  $walletbal + $amount;
mysqli_query($dbconnec,$sql);


//UPDATE USER TABLE
$sql = "SELECT * FROM users WHERE username='$username' ";
$result = mysqli_query($dbconnec,$sql);
$result_check = mysqli_num_rows($result);
if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){

$walletbal = $data['walletbal'];
$welbonus = $data['welbonus'];
}
}

$sql = "SELECT * FROM notifications WHERE username='$username' ";
$result = mysqli_query($dbconnec,$sql);
$result_check = mysqli_num_rows($result);
if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){
  $welbonus_notice = $data['welbonus_notice'];
}
}

if($welbonus_notice == 1){
  $currentwalletbal =  $walletbal + $amount + $welbonus;

    //UPDATE NOTIFICATION TABLE
  $sql = "UPDATE notifications

  SET welbonus_notice=2

  WHERE username='$username'";
  mysqli_query($dbconnec,$sql);
  
}else{
  $currentwalletbal =  $walletbal + $amount;
}

$sql = "UPDATE users

SET access=1, walletbal='$currentwalletbal'

WHERE username='$username'";
mysqli_query($dbconnec,$sql);
 

//PAY YOUR REFEREE
$sql = "SELECT * FROM reftable WHERE username='$username'";
$result = mysqli_query($dbconnec,$sql);
$result_check = mysqli_num_rows($result);

if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){
$referee = $data['referee'];
$refcode = $data['refcode'];
  }
}

$sql = "SELECT * FROM users WHERE username='$referee' ";
$result = mysqli_query($dbconnec,$sql);
$result_check = mysqli_num_rows($result);

if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){

$usdd = $data['username'];
$rwalletbal = $data['walletbal'];
$welbonus = $data['welbonus'];
$emailr= $data['email'];
$refpaid = $data['refpaid'];
$firstname= $data['firstname'];
$lastname = $data['lastname'];

if($refpaid == "yes"){


}else{

    $sql = "UPDATE reftable

    SET bonus='$refbonusfirst',status='PAID'

    WHERE username='$username'";

    mysqli_query($dbconnec,$sql);

$refbonusadding = $rwalletbal + $refbonusfirst;
$welbonus = $welbonus + $refbonusfirst;
$refstatus = "yes";


$sql = "UPDATE users

SET walletbal='$refbonusadding',refpaid='$refstatus',welbonus='$welbonus'

WHERE username='$usdd'";

 //SEND REFERRAL BONUS
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $firstname;
	//to: receiver email
	$receiver_email = $emailr;

	$title = 'Referral Bonus - Cr';

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
						  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Hello '.$username.',</p>
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
							  <p style="margin:10px 13px; font-size: 12px;">Your Deposit of $'.$amount.' has been confirmed.</p>
							  <p style="margin:10px 13px; font-size: 12px;">You have successfully received a referral bonus of $'.$refbonusfirst.' from '.$usdd.' Deposit.</p>
							  <p style="margin:10px 13px; font-size: 12px;">Refer to earn more!</p>
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


         mysqli_query($dbconnec,$sql);

          }
       }
  }

     $msg = "User deposit has been approved";
        header ("Location:../adminarea/depositrequest.php?depsuc=".$msg);
        exit();
		}
	}

	  }else{
      $errer = "Deposit Declined";
	  	header ("Location:../adminarea/depositrequest.php?deperror=".$error);
      exit();
	  }