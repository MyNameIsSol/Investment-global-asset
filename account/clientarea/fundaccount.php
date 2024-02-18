<?php 
require_once 'phpmailer/PHPMailerAutoload.php';
include '../configs/dbcon.php';
include 'userhead.php';
if(isset($_POST['fundpay'])){
	$fundamount=mysqli_real_escape_string($dbconnec,$_POST['fundamount']);
	$paytype=mysqli_real_escape_string($dbconnec,$_POST['paytype']);
	
	$username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
	$useremail=mysqli_real_escape_string($dbconnec,$_POST['email']);

	$fn=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
	$ln=mysqli_real_escape_string($dbconnec,$_POST['lastname']);
	
	// $adminBtcAdr = "bc1qunjnmtxm3yh039g3l02zmulp740suk3nnwaewa";
	$adminEthAdr = "0xce85454b2dE464760C3a1F8c58B4C6d652aDB67a";
	$adminUsdtAdr = "TLPJ4zsYNayCW5mzAcMfjnp7ykUGREAnND";
	// $adminLtcAdr = "ltc1q5deppv9qx44wml2u7g05zjvrkn5ckfqea5kgl2";
	// $adminBnbAdr = "bnb1zlxw2jwk5m3fm865g548v7dfrje2xwvzep9e5v";
	// $adminTrxAdr = "TBthp1jfLTjtVAMEyo88K68YUQGLxbyK7U";
	
	
	$adminEthQr ="assets/img/global-eth.jpg";
	$adminUsdtQr ="assets/img/global-usdt.jpg";
	// $adminBtcQr ="assets/img/orbitBtc.jpeg";
	// $adminLtcQr ="assets/img/orbitLtc.jpeg";
	// $adminBnbQr ="assets/img/orbitBnb.jpeg";
	// $adminTrxQr ="assets/img/orbitTrx.jpeg";    
	
	$depositid=uniqid();
    $depositid = "Tnx".substr($depositid,0,4).substr($depositid,-4,4);
	
	$tbname = 'depositrequest';
	$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			username VARCHAR(22) NOT NULL,
			email VARCHAR(225) NOT NULL,
			depositid VARCHAR(225) NOT NULL,
			amount VARCHAR(22) NOT NULL,
			proof VARCHAR(255) NOT NULL,
			transtype VARCHAR(22) NOT NULL,
			statusofdep VARCHAR(22) NOT NULL,
			walletbal VARCHAR(225) NOT NULL,
			dep_date DATETIME NOT NULL';
	if($dbconnec){
	$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
	if(!mysqli_query($dbconnec, $sql)){
		$error = "Could'nt send Deposit request";
		header ("Location:deposit.php?tableerror=".$error);
		exit();
	  }
	}
	
	$tbName = 'investments';
	$tbCols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			username VARCHAR(22) NOT NULL,
			email VARCHAR(225) NOT NULL,
			plan VARCHAR(22) NOT NULL,
			amount VARCHAR(22) NOT NULL,
			investmentid VARCHAR(225) NOT NULL,
			invest_type VARCHAR(22) NOT NULL,
			transtype VARCHAR(22) NOT NULL,
			statusofinvest VARCHAR(22) NOT NULL,
			walletbal VARCHAR(225) NOT NULL,
			invest_date DATETIME NOT NULL';
	if($dbconnec){
	$Sql = "CREATE TABLE IF NOT EXISTS $tbName($tbCols)";
	if(!mysqli_query($dbconnec, $Sql)){
		$error = "Error Creating investment table";
		header ("Location:deposit.php?tableerror=".$error);
		exit();
	  }
	}
	
	if($paytype == "Btc"){
	
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
	
	$title = 'DEPOSIT REQUEST VIA BITCOIN';
	
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
				  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
			  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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
	
	// USER receive email for payment in btc
		//from: site domain name
		$site_domain = 'securedglobalasset.com';
		//from: sender name
		$site_name = 'Securedglobalasset';
		//from: sender email
		$sitesupport_email = "info@securedglobalasset.com";
		//to: receiver name
		$receiver_name = $fn;
		//to: receiver email
		$receiver_email = $useremail;
	
		$title = 'Deposit via Bitcoin';
	
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
								  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' BTC. </p>
								  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of BTC </p>
						  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminBtcAdr.' to complete your deposit.</p>
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
					<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.comm All rights reserved.</p>
				  </td>
				</tr>
			  </table>
				</td>
			</tr>
		</table>
		</body>';
		$mail->send();

	}else if($paytype == "Eth"){
	
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
	
	$title = 'DEPOSIT REQUEST VIA ETHEREUM';
	
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
				  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
			  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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
	
	// USER receive email for payment in eth
		//from: site domain name
		$site_domain = 'securedglobalasset.com';
		//from: sender name
		$site_name = 'Securedglobalasset';
		//from: sender email
		$sitesupport_email = "info@securedglobalasset.com";
		//to: receiver name
		$receiver_name = $fn;
		//to: receiver email
		$receiver_email = $useremail;
	
		$title = 'Deposit via Ethereum';
	
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
								  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' ETH. </p>
								  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of ETH </p>
						  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminEthAdr.' to complete your deposit.</p>
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
					<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com All rights reserved.</p>
				  </td>
				</tr>
			  </table>
				</td>
			</tr>
		</table>
		</body>';
		$mail->send();
	 
	}else if($paytype == "Ltc"){
	
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
	
	$title = 'DEPOSIT REQUEST VIA LITECOIN';
	
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
				  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
			  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
			  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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
	
	// USER receive email for payment in Ltc
		//from: site domain name
		$site_domain = 'securedglobalasset.com';
		//from: sender name
		$site_name = 'Securedglobalasset';
		//from: sender email
		$sitesupport_email = "info@securedglobalasset.com";
		//to: receiver name
		$receiver_name = $fn;
		//to: receiver email
		$receiver_email = $useremail;
	
		$title = 'Deposit via Litecoin';
	
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
								  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' LTC. </p>
								  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of LTC </p>
						  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminLtcAdr.' to complete your deposit.</p>
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
					<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com All rights reserved.</p>
				  </td>
				</tr>
			  </table>
				</td>
			</tr>
		</table>
		</body>';
		$mail->send();
	 
	}else if($paytype == "Bnb"){
	
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

$title = 'DEPOSIT REQUEST VIA BINANCE COIN';

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
			  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
		  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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

// USER receive email for payment in Bnb
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $fn;
	//to: receiver email
	$receiver_email = $useremail;

	$title = 'Deposit via Binance Coin';

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
							  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' BNB. </p>
							  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of BNB </p>
					  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminBnbAdr.' to complete your deposit.</p>
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
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();
	 
	}else if($paytype == "Usdt"){
	
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

$title = 'DEPOSIT REQUEST VIA TETHER COIN (USDT)';

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
			  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
		  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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

// USER receive email for payment in Usdt
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $fn;
	//to: receiver email
	$receiver_email = $useremail;

	$title = 'Deposit via Tether Coin (usdt)';

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
							  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' USDT. </p>
							  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of USDT </p>
					  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminUsdtAdr.' to complete your deposit.</p>
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
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();

	
	}else if($paytype == "Trx"){
	
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

$title = 'DEPOSIT REQUEST VIA TRON';

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
			  <p style="margin:10px 13px; font-size: 12px;">A client just  initiated a new deposit request, here is the details of the client:</p>
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
		  <p style="margin: 10px 13px; font-size: 12px;">Amount: $'.$fundamount.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Payment Type: '.$paytype.'</p>
		  <p style="margin: 10px 13px; font-size: 12px;">Date of Deposit: '.$date.'.</p>
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

// USER receive email for payment in Trx
	//from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $fn;
	//to: receiver email
	$receiver_email = $useremail;

	$title = 'Deposit via Tron';

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
							  <p style="margin:10px 13px; font-size: 12px;">You have initiated a deposit of $'.$fundamount.' TRX. </p>
							  <p style="margin:10px 13px; font-size: 12px;">kindly send exactly $'.$fundamount.' worth of TRX </p>
					  <p style="margin:10px 13px; font-size: 12px;">to: '.$adminUsdtAdr.' to complete your deposit.</p>
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
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © securedglobalasset.com All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();
	 
	}
	
	}else{
	$error = "Invalid Payment Type!";
	header("Location:clientarea/deposit.php?error".$error);
	exit();
	}
?>
<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>

	<script type="text/javascript">                    
function checkproof(){
// var walletbals = document.forms['withdrawal']['walletbal'].value;
var proof = document.forms['subscribe']['file_upload'].value;
            
	if(proof == ""){
		swal("Error!", "Please upload proof of payment for quick verification", "error");                  
	return false; 
	}else{
	return true;
	}
	}
    </script>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
                    <div class="row layout-spacing layout-top-spacing" id="cancel-row">

					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div id="listGroupIcons" class="col-lg-12 layout-spacing" >
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
								<div class="row mb-0 pb-0">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-0 pb-0">
                                            <h4 class="mb-0 pb-0">Fund with: <?= !empty($paytype) ? $paytype : '';?></h4> 
                                        </div>                   
                                    </div>
									<hr>
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Proceed with Deposit</h4> 
                                        </div>                   
                                    </div>
                                </div>

                            </div>
                        </div>
					</div>

				<?php 
                if($paytype == "Btc"){
                  echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<div class="row layout-spacing" >
						<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Invoice</h4> 
											<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-warning"> $'.$fundamount.'</span> to:</h6>
                                        </div>                   
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <ul class="list-group list-group-media">
                                        <li class="list-group-item list-group-item-action ">
                                           
										<div class="table-responsive">
											<table class="table table-striped table-hover no-margin">
												<tbody>
												<tr>
													<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
													<td><span class="text-warning" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminBtcAdr.' '.'</span></td>
												</tr>
												</tbody>
											</table>
										</div>      
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div id="listGroupImages">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Scan Barcode</h4> 
                                        </div>                   
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area text-center" >
                                            
                                 <img alt="Bar-code" src="'.$adminBtcQr.'" class="img-fluid">
                                 
                                </div>

                            </div>
                        </div>
					    </div>';
				}elseif($paytype == "Eth"){
					echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div class="row layout-spacing" >
					<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Invoice</h4> 
										<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-warning"> $'.$fundamount.'</span> to:</h6>
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<ul class="list-group list-group-media">
									<li class="list-group-item list-group-item-action ">
									   
									<div class="table-responsive">
										<table class="table table-striped table-hover no-margin">
											<tbody>
											<tr>
												<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
												<td><span class="text-warning" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminEthAdr.' '.'</span></td>
											</tr>
											</tbody>
										</table>
									</div>      
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div id="listGroupImages">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Scan Barcode</h4> 
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area text-center" >
										
							 <img alt="Bar-code" src="'.$adminEthQr.'" class="img-fluid">
							 
							</div>

						</div>
					</div>
					</div>';
				}elseif($paytype == "Ltc"){
					echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div class="row layout-spacing" >
					<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Invoice</h4> 
										<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-warning"> $'.$fundamount.'</span> to:</h6>
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<ul class="list-group list-group-media">
									<li class="list-group-item list-group-item-action ">
									   
									<div class="table-responsive">
										<table class="table table-striped table-hover no-margin">
											<tbody>
											<tr>
												<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
												<td><span class="text-warning" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminLtcAdr.' '.'</span></td>
											</tr>
											</tbody>
										</table>
									</div>      
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div id="listGroupImages">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Scan Barcode</h4> 
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area text-center" >
										
							 <img alt="Bar-code" src="'.$adminLtcQr.'" class="img-fluid">
							 
							</div>

						</div>
					</div>
					</div>';
				}elseif($paytype == "Bnb"){
					echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div class="row layout-spacing" >
					<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Invoice</h4> 
										<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-warning"> $'.$fundamount.'</span> to:</h6>
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<ul class="list-group list-group-media">
									<li class="list-group-item list-group-item-action ">
									   
									<div class="table-responsive">
										<table class="table table-striped table-hover no-margin">
											<tbody>
											<tr>
												<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
												<td><span class="text-warning" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminBnbAdr.' '.'</span></td>
											</tr>
											</tbody>
										</table>
									</div>      
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div id="listGroupImages">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Scan Barcode</h4> 
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area text-center" >
										
							 <img alt="Bar-code" src="'.$adminBnbQr.'" class="img-fluid">
							 
							</div>

						</div>
					</div>
					</div>';
				}elseif($paytype == "Usdt"){
					echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div class="row layout-spacing" >
					<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Invoice</h4> 
										<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-primary"> $'.$fundamount.'</span> to:</h6>
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<ul class="list-group list-group-media">
									<li class="list-group-item list-group-item-action ">
									   
									<div class="table-responsive">
										<table class="table table-striped table-hover no-margin">
											<tbody>
											<tr>
												<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
												<td><span class="text-primary" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminUsdtAdr.' '.'</span></td>
											</tr>
											</tbody>
										</table>
									</div>      
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div id="listGroupImages">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Scan Barcode</h4> 
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area text-center" >
										
							 <img alt="Bar-code" src="'.$adminUsdtQr.'" class="img-fluid">
							 
							</div>

						</div>
					</div>
					</div>';
				}elseif($paytype == "Trx"){
					echo '<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<div class="row layout-spacing" >
					<div id="listGroupImages" class="mb-3 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Invoice</h4> 
										<h6 class="pl-3" style="font-size:14px; font-weight:bold; font-family: Georgia, serif;">Transfer Exactly <span class="text-warning"> $'.$fundamount.'</span> to:</h6>
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<ul class="list-group list-group-media">
									<li class="list-group-item list-group-item-action ">
									   
									<div class="table-responsive">
										<table class="table table-striped table-hover no-margin">
											<tbody>
											<tr>
												<td style="font-size:15px; font-weight:bold; font-family: Georgia, serif;"> '.$paytype.' '.'Address: </td>
												<td><span class="text-warning" style="font-size:15px; font-weight:bold; font-family: Georgia, serif;">'.$adminTrxAdr.' '.'</span></td>
											</tr>
											</tbody>
										</table>
									</div>      
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div id="listGroupImages">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Scan Barcode</h4> 
									</div>                   
								</div>
							</div>
							<div class="widget-content widget-content-area text-center" >
										
							 <img alt="Bar-code" src="'.$adminTrxQr.'" class="img-fluid">
							 
							</div>

						</div>
					</div>
					</div>';
				}
						?>

					</div>
		      </div> 
		      <div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<div id="listGroupImages" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>OR COPY</h4> 
                                        </div>                   
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
									<form>
								<div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Copy Address</label>
                                            <input type="text" name="" class="form-control" value="<?php 
                                if($paytype == "Btc"){
                                echo $adminBtcAdr;
                                }else if($paytype == "Eth"){
                                echo $adminEthAdr;
                                }else if($paytype == "Ltc"){
								echo $adminLtcAdr;
								}else if($paytype == "Bnb"){
								echo $adminBnbAdr;
								}else if($paytype == "Usdt"){
                                echo $adminUsdtAdr;
                                }else if($paytype == "Trx"){
								echo $adminTrxAdr;
								} ?>" id="copybtc">
                                        </div>
                                        <span  class="btn btn-warning" onClick="mycopy()">Copy</span>
                                    </form>
                                </div>
								<br>

								<script type="text/javascript">

									function mycopy(){
									var copyTxt = document.getElementById("copybtc");
									copyTxt.select();
									document.execCommand("copy");
									swal({
										title: 'Good job!',
										text: "Payment address copied!",
										type: 'success',
										padding: '2em'
										});
									}

									</script>

								<div class="widget-content widget-content-area">
								<div class="table-responsive">
							<table class="table table-striped table-hover no-margin">
							  <tbody>
								<tr>
								  <td>Transaction Id:</td>
								  <td><?= !empty($depositid) ? $depositid : '';?></td>
								</tr>
								<tr>
								  <td>Note :</td>
								  <td><a href="#">Contact Us with the Transaction ID for faster confirmations</a></td>
								</tr>
							  </tbody>
							</table>
						</div>
<br>
<br>
						<div class="text-xs-right">
						<form  method="POST" action="../configs/depospayscript.php" name="subscribe" enctype="multipart/form-data" onsubmit="return checkproof()">
						<input  type="hidden" name="invest_amount" value="<?= $fundamount ?>">
						<input  type="hidden" name="paytype" value="<?= $paytype ?>">
								<input type="hidden" name="usd" value="<?= $username ?>">
							<input type="hidden" name="email" value="<?= $useremail ?>">
							<input type="hidden" name="depoid" value="<?= $depositid ?>">
							<input type="hidden" name="firstname" value="<?= $fn ?>">
							<input type="hidden" name="lastname" value="<?= $ln ?>">
							<div class="form-row mb-2">
								<div class="form-group col-12 mb-3">
									<label class="label" for="image">Upload Proof of Payment: *</label>
									<input type="file" name="file_upload" class="form-control" id="image" placeholder="Choose file">
								</div>
							</div>
							<button type="submit" name="makepayment" id="dont" class="btn btn-warning">Done</button>
						</form>
						</div>
                                </div>
                            </div>
                        </div>
				</div>
       </div>
     
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://securedglobalasset.com/">Obedient</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Trading with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>

	<?php include 'userfoot.php' ?>
</body>

</html>