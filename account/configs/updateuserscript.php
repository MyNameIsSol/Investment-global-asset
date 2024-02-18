<?php
	include 'dbcon.php';

	// session_start();
	if(isset($_POST['updateuser'])){
		$firstnam = mysqli_real_escape_string($dbconnec,$_POST['firstnam']);
		$lastnam = mysqli_real_escape_string($dbconnec,$_POST['lastnam']);
		$emai = mysqli_real_escape_string($dbconnec,$_POST['emai']);
		$phon = mysqli_real_escape_string($dbconnec,$_POST['phon']);
		$us = mysqli_real_escape_string($dbconnec,$_POST['us']);
		// $pw = mysqli_real_escape_string($dbconnec,$_POST['pw']);
		$countr = mysqli_real_escape_string($dbconnec,$_POST['countr']);
		$stat = mysqli_real_escape_string($dbconnec,$_POST['stat']);
		$cit = mysqli_real_escape_string($dbconnec,$_POST['cit']);
		$walletba = mysqli_real_escape_string($dbconnec,$_POST['walletba']);
		$totalwit = mysqli_real_escape_string($dbconnec,$_POST['totalwit']);

		$btcadd = mysqli_real_escape_string($dbconnec,$_POST['btcadd']);
		
        if(!empty(mysqli_real_escape_string($dbconnec,$_POST['earns']))){
            $earns =  mysqli_real_escape_string($dbconnec,$_POST['earns']);
        }else{
            $earns = '';
        }
        $subearn = mysqli_real_escape_string($dbconnec,$_POST['subearn']);
        // $tearns = mysqli_real_escape_string($dbconnec,$_POST['tearns']);

        $withdrawal = mysqli_real_escape_string($dbconnec,$_POST['withdrawal']);

        if($subearn != ''){
            $sql = "SELECT * FROM users WHERE username = '$us'";
           $result = mysqli_query($dbconnec,$sql);
           $result_check = mysqli_num_rows($result);
           if($result_check > 0){
           while($data = mysqli_fetch_assoc($result)){
               $earnn=$data['earns'];
               $earning_date=$data['earning_date'];
           }
         }
           $new_earn_date = date('Y-m-d',strtotime('+7 day'.$earning_date));
           $earns = $subearn + $earnn;
           $statusofinvest = 0;

           $sql = "UPDATE users

           SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',earning_date='$new_earn_date',country='$countr',state='$stat',city='$cit',walletbal='$walletba',btcaddr='$btcadd',earns='$earns',withdrawal='$withdrawal'
   
           WHERE username = '$us'
           ";
            mysqli_query($dbconnec,$sql);
           $msg = "user updated...";
           header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
           exit();
   }

        if($earns != ''){
            $sql = "SELECT * FROM users WHERE username = '$us'";
           $result = mysqli_query($dbconnec,$sql);
           $result_check = mysqli_num_rows($result);
           if($result_check > 0){
           while($data = mysqli_fetch_assoc($result)){
               $earnn=$data['earns'];
               $currentInves=$data['totalwith'];
           }
         }
           $earns = $earns + $earnn + $currentInves;
           $earnamt = 0;
           $totalwit= 0;
           $statusofinvest = 0;
           $walletba = $walletba + $earns;

           $sql = "UPDATE users

           SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',earns='$earns',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'
   
           WHERE username = '$us'
           ";
            mysqli_query($dbconnec,$sql);

            $earns = 0;
            $sql = "UPDATE users
            SET earns='$earns'
            WHERE username = '$us'
           ";
           mysqli_query($dbconnec,$sql);

           $msg = "user updated...";
           header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
           exit();
   }

        if($totalwit == 0 || $totalwit == ''){
        $statusofinvest = 0;
       
        $sql = "SELECT * FROM users WHERE username='$us' ";
            $result= mysqli_query($dbconnec,$sql);
            $result_checker= mysqli_num_rows($result);

            if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){

            // $walletbal= $data['walletbal'];             
            $totalwith= $data['totalwith'];
            $walletba = $walletba + $totalwith;
            }
        }
         $sql = "UPDATE users

        SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'

        WHERE username = '$us'
        ";

		mysqli_query($dbconnec,$sql);
        $msg = "user updated...";
        header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
		exit();
    }else{
        $sql = "SELECT * FROM users WHERE username='$us' ";
        $result= mysqli_query($dbconnec,$sql);
        $result_checker= mysqli_num_rows($result);

        if($result_checker > 0){
            $sql = "UPDATE users

            SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'
        
            WHERE username = '$us'
            ";
        
            mysqli_query($dbconnec,$sql);
            $msg = "user updated...";
            header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
            exit();
    }
   
    }
    

        
        // }elseif($earns != '' || $earns != 0){
        //     $currentdate=strtotime(date('Y-m-d'));
        //     // $currentdate=strtotime('+8 day'.date('Y-m-d'));
        //     $sql = "SELECT DATE(invest_date) as Idate, DATE(earning_date) as Edate , earns FROM users WHERE username = '$us'";
        //     $result = mysqli_query($dbconnec,$sql);
		// 	$result_check = mysqli_num_rows($result);
		// 	if($result_check > 0){
		// 	while($data = mysqli_fetch_assoc($result)){
        //         $earning_date=strtotime($data['Edate']);
        //         $earnn=strtotime($data['earns']);
            
        //     }
        //   }
        //   if($currentdate >= $earning_date){
        //       $earns = $earns + $earnn;
        //     $earnamt = 0;
        //     $totalwit=0;
        //     $sql = "UPDATE users

        //     SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',earns='$earns',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'
    
        //     WHERE username = '$us'
        //     ";
        //     mysqli_query($dbconnec,$sql);
        //     $msg = "user updated...";
        //     header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
        //     exit();
        //   }else{
        //     $sql = "UPDATE users

        // SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'

        // WHERE username = '$us'
        // ";

		// mysqli_query($dbconnec,$sql);
        // $error = "sorry! can't update user earnings... It is not yet 7days";
        // header("Location:../adminarea/adminupdateuser.php?updateerr=".$error);
		// exit();
        //   }
        // }
    
        // $sql = "UPDATE users

        // SET firstname='$firstnam',lastname='$lastnam',email='$emai',phone='$phon',username='$us',country='$countr',state='$stat',city='$cit',walletbal='$walletba',totalwith='$totalwit',btcaddr='$btcadd',earns='$earns',withdrawal='$withdrawal',statusofinvest='$statusofinvest',earning_amount='$earnamt'

        // WHERE username = '$us'
        // ";

		// mysqli_query($dbconnec,$sql);
        // $msg = "user updated...";
        // header("Location:../adminarea/adminupdateuser.php?updatesuc=".$msg);
		// exit();

	}else{
        $error = "sorry! can't update user";
		header("Location:../adminarea/adminupdateuser.php?updateerr=".$error);
		// exit();
	}