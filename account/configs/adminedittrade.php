<?php

	include 'dbcon.php';

	if(isset($_POST['edittrade'])){
		$usd = mysqli_real_escape_string($dbconnec,$_POST['us']);
	
		$symbol = strtoupper(mysqli_real_escape_string($dbconnec,$_POST['symbol']));
        $percent = mysqli_real_escape_string($dbconnec,$_POST['percent']);
        $profit = mysqli_real_escape_string($dbconnec,$_POST['profit']);
        $earns = mysqli_real_escape_string($dbconnec,$_POST['earns']);
        $tradeid = mysqli_real_escape_string($dbconnec,$_POST['tradeid']);
		
           $sql = "SELECT * FROM tradings WHERE tradeid = '$tradeid'";
           $result = mysqli_query($dbconnec,$sql);
           $result_check = mysqli_num_rows($result);
           if($result_check > 0){
            $sql = "UPDATE tradings

            SET symbol='$symbol',percent='$percent'
    
            WHERE tradeid = '$tradeid'
            ";
             mysqli_query($dbconnec,$sql);
 
           
            $msg = "Trade updated...";
            header("Location:../adminarea/usertrades.php?updatesuc=".$msg);
            exit();
         }
         
	}else{
        $error = "sorry! can't update trade";
		header("Location:../adminarea/usertrades.php?updateerr=".$error);
		exit();
	}