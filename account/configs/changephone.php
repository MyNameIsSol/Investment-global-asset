<?php
	include 'dbcon.php';
	// session_start();
	if(isset($_POST['changeno'])){
		$username = mysqli_real_escape_string($dbconnec,$_POST['username']);
		$phone = mysqli_real_escape_string($dbconnec,$_POST['phone']);
		$sql = "UPDATE users

				SET phone='$phone'
				
                WHERE username = '$username'";

        if(!mysqli_query($dbconnec,$sql)){
            die("Error: ".mysqli_error($dbconnec));
            exit;
        }
        $msg="You have successfully updated your phone number!";
        header("Location:../clientarea/dashboard.php?suc=".$msg);
		exit();

	}else{
        $error = "Sorry! phone number not updated";
		header("Location:../clientarea/dashboard.php?error=".$error);
		exit();
	}