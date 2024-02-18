<?php
require_once 'phpmailer/PHPMailerAutoload.php';
    if(isset($_POST["signup"])){
        include 'dbcon.php';
        $tbname = 'users';
        $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                firstname VARCHAR(22) NOT NULL,
                lastname VARCHAR(22) NOT NULL,
                username VARCHAR(22) NOT NULL,
                email VARCHAR(225) NOT NULL,
                passwd VARCHAR(55) NOT NULL,
                phone VARCHAR(22) NOT NULL,
                terms VARCHAR(22) NOT NULL,
                profileimg VARCHAR(225) NOT NULL,
                country VARCHAR(55) NOT NULL,
                state VARCHAR(55) NOT NULL,
                city VARCHAR(55) NOT NULL,
                street VARCHAR(225) NOT NULL,
                postcode VARCHAR(22) NOT NULL,
                btcaddr varchar(255) not null,
                walletbal VARCHAR(22) NOT NULL,
                currency VARCHAR(22) NOT NULL,
                totalwith VARCHAR(22) NOT NULL,
                earns VARCHAR(22) NOT NULL,
                welbonus VARCHAR(22) NOT NULL,
                voucher VARCHAR(22) NOT NULL,
                access VARCHAR(22) NOT NULL,
                earning_date VARCHAR(55) NOT NULL,
                earning_amount VARCHAR(22) NOT NULL,
                tearns VARCHAR(22) NOT NULL,
                currentplan VARCHAR(55) NOT NULL,
                refcode VARCHAR(55) NOT NULL,
                depositid varchar(255) not null,
                userid VARCHAR(22) NOT NULL,
                timeofinvest VARCHAR(55) NOT NULL,
                investedamount VARCHAR(22) NOT NULL,
                invest_type VARCHAR(55) NOT NULL,
                statusofinvest VARCHAR(22) NOT NULL,
                acctname VARCHAR(55) NOT NULL,
                acctnumber VARCHAR(55) NOT NULL,
                bankname VARCHAR(225) NOT NULL,
                whorefu VARCHAR(22) NOT NULL,
                active VARCHAR(22) NOT NULL,
                refpaid varchar(255) not null,
                withdrawal VARCHAR(22) NOT NULL,
                upline VARCHAR(22) NOT NULL,
                reg_date DATETIME NOT NULL';
        if($dbconnec){
        $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
        if(!mysqli_query($dbconnec, $sql)){
            header ("Location:../signup.php?tableerror");
            exit();
          }
        }

        $tbname = 'notifications';
        $tbcols = 'id INT(22) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(22) NOT NULL,
                welbonus_notice INT(22) NOT NULL,
                refbonus_notice INT(22) NOT NULL,
                voucher_notice INT(22) NOT NULL,
                sub_notice INT(22) NOT NULL,
                deposit_notice INT(22) NOT NULL,
                invest_notice INT(22) NOT NULL,
                withdraw_notice  INT(22) NOT NULL';
        if($dbconnec){
        $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
        if(!mysqli_query($dbconnec, $sql)){
            header ("Location:../signup.php?tableerror");
            exit();
          }
        }

        $uname=mysqli_real_escape_string($dbconnec,$_POST['uname']);
        $email=mysqli_real_escape_string($dbconnec,$_POST['email']);
        $country=mysqli_real_escape_string($dbconnec,$_POST['country']);
        $phone=mysqli_real_escape_string($dbconnec,$_POST['phone']);
        $passwd=mysqli_real_escape_string($dbconnec,$_POST['pwd']);
        $terms=mysqli_real_escape_string($dbconnec,$_POST['agree']);
        $refidd=mysqli_real_escape_string($dbconnec,$_POST['refid']);
        $date = date('d/m/y h:i:s');
        $walletbal = 0;
        $totalwith  = 0;
        $earns = 0;
        $currency = "$";
        $withdrawal  = 0;
        $encrpt = md5($email.time());
        $userid = 'usd-'. substr($encrpt,0,3).substr($encrpt,-3,3);
         // unique reference id
        $refcode = uniqid($uname,true);

        if(empty($uname)|| empty($email)||  empty($country) || empty($phone) || empty($passwd)){
                header ("Location:../signup.php?signupempty");
                die("Error: ".mysqli_error($dbconnec));
                exit();  
        }elseif(empty($terms)){
          header ("Location:../signup.php?tempty");
          exit();
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header ("Location:../signup.php?invalidemail");
                die("Error: ".mysqli_error($dbconnec));
                exit();

            }else{
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($dbconnec,$sql);
                $result_check = mysqli_num_rows($result);
                if($result_check > 0){
                    header ("Location:../signup.php?uidtaken");
                    die("Error: ".mysqli_error($dbconnec));
                    exit();
                }else{
             $sql = "INSERT INTO users (username,userid,email,country,phone,passwd,walletbal,currency,totalwith,earns,welbonus,voucher,access,acctname,acctnumber,bankname,
                   whorefu,withdrawal,upline,terms,reg_date,firstname,lastname,profileimg,state,city,
                   street,postcode,btcaddr,earning_date,earning_amount,tearns,currentplan,refcode,depositid,
                   timeofinvest,investedamount,invest_type,statusofinvest,active,refpaid) 
                   VALUES ('$uname','$userid','$email','$country','$phone','$passwd',
                   '$walletbal','$currency','$totalwith','$earns',0,0,'','','','','$refidd','$withdrawal','$refidd','$terms','$date','','','','','','','','','','','','','','','','','','','',0)";

                    if(!mysqli_query($dbconnec,$sql)){
                      die("Error: ".mysqli_error($dbconnec));
                      exit;
                  }

          $sql = "INSERT INTO notifications (username,welbonus_notice,refbonus_notice,voucher_notice,sub_notice,deposit_notice,invest_notice,withdraw_notice) VALUES ('$uname',0,0,0,0,0,0,0)";
          if(!mysqli_query($dbconnec,$sql)){
            die("Error: ".mysqli_error($dbconnec));
            exit;
          }
                   //email to new registered user
                    //from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $uname;
	//to: receiver email
	$receiver_email = $email;

	$title = 'Welcome '.$uname;

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
							  <p style="margin:10px 13px; font-size: 12px;">Welcome to Securedglobalasset – your gateway to a smarter and more rewarding investment journey.</p>
					  <p style="margin:10px 13px; font-size: 12px;">We\'re excited to have you on board! Here\'s a quick guide to get you started:</p>
					</td>
				  </tr>

				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
							  <p style="margin:10px 13px; font-size: 12px;">Dive into a world of diverse investment opportunities. From popular cryptocurrencies to emerging trends. Login to your dashboard, invest and start earning.</p>
					  <p style="margin:10px 13px; font-size: 12px;">Have a question? Our support team is just an email away at <a href="mailto:info@securedglobalasset.com">info@securedglobalasset.com</a></p>
					</td>
				  </tr>
				  
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					<p style="margin: 10px 13px; font-size: 12px;"> Ready to kickstart your journey?</p>
					  <p style="margin: 10px 13px; font-size: 12px;"> <a href="https://www.securedglobalasset.com/account/my_account.php">Login here </a>to proceed.</p>
					</td>
				  </tr>

				  <!-- COPY HEADING -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; color: #111111; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
					  <h2 style="font-size: 12px; font-weight: 400; margin: 10px 13px;">Your Login details are:</h2>
					</td>
				  </tr>
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin: 10px 13px; font-size: 12px;">Email: '. $email .'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Password: '.$passwd.'</p>
					</td>
				  </tr>
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					<p style="margin:10px 13px 10px; font-size: 12px;">Cheers to financial growth!</p> 
					<p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
					</td>
				  </tr>
				 
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">Paul Harrison</p>
					  <p style="margin:10px 13px; font-size: 12px;">Founder & CEO, Securedglobalasset.</p>
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
			  <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
				<p style="margin:20px 13px; font-size: 12px;">You received this email because you signed up with Securedglobalasset. If it looks weird, <a href="www.securedglobalasset.com" target="_blank" style="color: #4188FA; font-weight: 700;">view it in your browser</a>.</p>
			  </td>
			</tr>
			<!-- UNSUBSCRIBE -->
			<tr>
			  <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;">
				<p style="margin: 20px 13px; font-size: 12px;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #4188FA; font-weight: 700;">unsubscribe</a>.</p>
			  </td>
			</tr>
		<!-- COPYRIGHT -->
			<tr>
			  <td align="center" style="padding: 50px 10px 10px 10px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © Securedglobalasset. All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();

                    //email to admin on new user registration
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

	$title = 'New Registration';

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
							  <p style="margin:10px 13px; font-size: 12px;">A new client just registered on your website:</p>
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
					  <p style="margin: 10px 13px; font-size: 12px;">Username: '. $uname .'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">Email: '.$email.'</p>
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
                   
        // WOEKING ON THE REFERENCE TABLE
        if($refidd == ''){

        }else{
        $tbname = 'reftable';
        $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(22) NOT NULL,
                email VARCHAR(225) NOT NULL,
                phone VARCHAR(22) NOT NULL,
                referee VARCHAR(22) NOT NULL,
                bonus varchar(55) not null,
                status varchar(22) NULL,
                refcode varchar(22) NULL,
                reg_date DATETIME NOT NULL';
        if($dbconnec){
        $Sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
        if(!mysqli_query($dbconnec, $Sql)){
            header ("Location:../signup.php?tableerror");
            die("Error: ".mysqli_error($dbconnec));
            exit();
          }
        }
    
          $sql = "SELECT * FROM reftable WHERE username='$uname'";
          $result = mysqli_query($dbconnec,$sql);
          $result_check = mysqli_num_rows($result);
          if($result_check < 1){
            $refcode=uniqid();
          $refcode = "ref".substr($refcode,0,3).substr($refcode,-3,3);
          $refbonus = "NOT PAID";
          $stat = 'Pending';
          $sql = "INSERT INTO reftable (username,email,phone,referee,bonus,status,refcode,reg_date) VALUES ('$uname','$email','$phone','$refidd','$refbonus','$stat','$refcode','$date')";
          if(!mysqli_query($dbconnec,$sql)){
            die("Error: ".mysqli_error($dbconnec));
            exit;
        }
        }
        

        $sql = "SELECT * FROM users WHERE username='$refidd' ";
        $result = mysqli_query($dbconnec,$sql);
        $result_check = mysqli_num_rows($result);
        if($result_check > 0){
        while($data = mysqli_fetch_assoc($result)){
 
        $unr= $data['username'];
        $emailr= $data['email'];

         // sending referal mail notifications to the already registered user
        //from: site domain name
	$site_domain = 'securedglobalasset.com';
	//from: sender name
	$site_name = 'Securedglobalasset';
	//from: sender email
	$sitesupport_email = "info@securedglobalasset.com";
	//to: receiver name
	$receiver_name = $unr;
	//to: receiver email
	$receiver_email = $emailr;

	$title = 'REFERAL NOTIFICATION';

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
							  <p style="margin:10px 13px; font-size: 12px;">'.$fname.' just registered using your Referral Link</p>
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
	</table>
	</body>';
	$mail->send();

        // sending referel mail notification to the admin
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

	$title = 'New Registration';

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
							  <p style="margin:10px 13px; font-size: 12px;">A new client just registered using a referral link of your investor</p>
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
					  <p style="margin: 10px 13px; font-size: 12px;">The main investor username: '.$refidd.'</p>
					  <p style="margin: 10px 13px; font-size: 12px;">The new Downline or the client: username: '.$uname.'</p>
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
                  
                                     }
                              }
                    }
                    //  END OF REFREAL LINK
                    header ("Location:../my_account.php?signupsuc");
                    exit();
                }
            }
         }
    }else{
        header ("Location:../signup.php?error");
        exit();
    }