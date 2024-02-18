<?php

	include 'dbcon.php';

	// session_start();


	if(isset($_POST['updatedate'])){

		$withid = mysqli_real_escape_string($dbconnec,$_POST['withid']);
		$dateofwith = mysqli_real_escape_string($dbconnec,$_POST['dateofwith']);
	
	
		$sql = "UPDATE withdrawalrequest

				SET with_date='$dateofwith'
				
                WHERE withdrawalid = '$withid'
		";

		mysqli_query($dbconnec,$sql);
       $msg="Date updated";
        header("Location:../adminarea/withdrawalrequest.php?datesuc=".$msg);
		exit();

	}else{
        $error = "sorry! date not updated";
		header("Location:../adminarea/withdrawalrequest.php?dateerror=".$error);
		exit();
	}