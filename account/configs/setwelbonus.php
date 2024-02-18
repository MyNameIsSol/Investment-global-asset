<?php
	include 'dbcon.php';
	// session_start();
	if(isset($_POST['set_welbonus'])){
		$username = mysqli_real_escape_string($dbconnec,$_POST['username']);
		$sql = "UPDATE notifications

				SET welbonus_notice = 3
				
                WHERE username = '$username'";

        if(!mysqli_query($dbconnec,$sql)){
            die("Error: ".mysqli_error($dbconnec));
            exit;
        }
        header("Location:../clientarea/dashboard.php?suc");
		exit();
	}else{
		header("Location:../clientarea/dashboard.php?");
		exit();
	}