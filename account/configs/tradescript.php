<?php
// id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
// count_trade INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	include 'dbcon.php';
  $tbName = 'tradings';
	$tbCols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			username VARCHAR(22) NOT NULL,
			email VARCHAR(225) NOT NULL,
			plan VARCHAR(22) NOT NULL,
      count VARCHAR(22) NOT NULL,
			amount VARCHAR(22) NOT NULL,
      cryptoamount VARCHAR(22) NOT NULL,
      symbol VARCHAR(22) NOT NULL,
			tradeid VARCHAR(225) NOT NULL,
			trade_type VARCHAR(22) NOT NULL,
      percent VARCHAR(22) NOT NULL,
			transtype VARCHAR(22) NOT NULL,
			statusoftrade VARCHAR(22) NOT NULL,
      profit VARCHAR(22) NOT NULL,
      loss VARCHAR(22) NOT NULL,
			walletbal VARCHAR(225) NOT NULL,
      endtrade_date DATETIME NOT NULL,
			trade_date DATETIME NOT NULL';
	if($dbconnec){
	$Sql = "CREATE TABLE IF NOT EXISTS $tbName($tbCols)";
	if(!mysqli_query($dbconnec, $Sql)){
		$error = "Error Creating trading table";
		header ("Location:../clientarea/trading.php?tableerror=".$error);
		exit();
	  }
	}

	if(isset($_POST['buytrade'])){
		 // GET THE DATA
    $usdamt=(int)mysqli_real_escape_string($dbconnec,$_POST['usdamt']);
    $btcamt=mysqli_real_escape_string($dbconnec,$_POST['btcamt']);
    $symbol=mysqli_real_escape_string($dbconnec,$_POST['symbol']);
    $tradetype=mysqli_real_escape_string($dbconnec,$_POST['tradetype']);
    $walletbal=mysqli_real_escape_string($dbconnec,$_POST['walletbal']);
    $email=mysqli_real_escape_string($dbconnec,$_POST['email']);
    $plan = "trade";
    $username=mysqli_real_escape_string($dbconnec,$_POST['usname']);
    $firstname=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($dbconnec,$_POST['lastname']);
    $tradeid=uniqid($username,true);

         // CALCULATE PROFIT
          date_default_timezone_set('Africa/Lagos');
          $date= date('Y-m-d H:i:s');
          $earning_date = date('Y-m-d',strtotime('+7 day'.date('Y-m-d')));
          $status="Running";
          $percent = 10;

          $transtype = "trading";
          $sql="INSERT INTO tradings(amount,cryptoamount,symbol,trade_type,percent,walletbal,email,username,tradeid,trade_date,statusoftrade,plan,transtype) VALUES ('$usdamt','$btcamt','$symbol','$tradetype','$percent','$walletbal','$email','$username','$tradeid','$date','$status','$plan','$transtype')";

        //SEND ADMIN EMAIL ON USER INVESTMENT
     
        //SEND USER EMAIL FOR HIS/HER INVESTMENT INITIATION

        mysqli_query($dbconnec,$sql);
        $currentwalletbal =  $walletbal - $usdamt;
    
        $sql = "UPDATE users
        SET walletbal='$currentwalletbal'
        WHERE username='$username' ";
        mysqli_query($dbconnec,$sql);

        $statusoftrade = "Running";

        $sql = "UPDATE users

        SET currentplan='$plan',investedamount='$usdamt',invest_type='$tradetype',statusofinvest='$statusoftrade',investmentid='$tradeid', timeofinvest=' $date',earning_date='$earning_date'

        WHERE username='$username' ";
       mysqli_query($dbconnec,$sql);
              $msg="Scroll down to see running trades";
           header("Location:../clientarea/trading.php?suc=".$msg);
         exit();

	}elseif(isset($_POST['selltrade'])){
    $usdamt=(int)mysqli_real_escape_string($dbconnec,$_POST['usdamt']);
    $btcamt=mysqli_real_escape_string($dbconnec,$_POST['btcamt']);
    $symbol=mysqli_real_escape_string($dbconnec,$_POST['symbol']);
    $tradetype=mysqli_real_escape_string($dbconnec,$_POST['tradetype']);
    $walletbal=mysqli_real_escape_string($dbconnec,$_POST['walletbal']);
    $email=mysqli_real_escape_string($dbconnec,$_POST['email']);
    $plan = "trade";
    $username=mysqli_real_escape_string($dbconnec,$_POST['usname']);
    $firstname=mysqli_real_escape_string($dbconnec,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($dbconnec,$_POST['lastname']);
    $tradeid=uniqid($username,true);

         // CALCULATE PROFIT
          date_default_timezone_set('Africa/Lagos');
          $date= date('Y-m-d H:i:s');
          $earning_date = date('Y-m-d',strtotime('+7 day'.date('Y-m-d')));
          $status="Running";
          $percent = 10;
          $transtype = "trading";

          $sql="INSERT INTO tradings (amount,cryptoamount,symbol,trade_type,percent,walletbal,email,username,tradeid,trade_date,statusoftrade,plan,transtype) VALUES ('$usdamt','$btcamt','$symbol','$tradetype','$percent','$walletbal','$email','$username','$tradeid','$date','$status','$plan','$transtype')";

        //SEND ADMIN EMAIL ON USER INVESTMENT
     
        //SEND USER EMAIL FOR HIS/HER INVESTMENT INITIATION

        mysqli_query($dbconnec,$sql);
        $currentwalletbal =  $walletbal - $usdamt;

        $sql = "UPDATE users
        SET walletbal='$currentwalletbal'
        WHERE username='$username' ";
        mysqli_query($dbconnec,$sql);

         $statusoftrade = "Running";

          $sql = "UPDATE users

        SET currentplan='$plan',investedamount='$usdamt',invest_type='$tradetype',statusofinvest='$statusoftrade',investmentid='$tradeid',timeofinvest='$date',earning_date='$earning_date',earning_amount='$earning_amt'

        WHERE username='$username' ";

       mysqli_query($dbconnec,$sql);
              $msg="Scroll down to see running trades";
           header("Location:../clientarea/trading.php?suc=".$msg);
         exit();
  }else{
        $error = "Sorry, an error occured!";
		header("Location:../clientarea/trading.php?error=".$error);
         exit();
	}