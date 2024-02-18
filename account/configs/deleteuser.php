<?php

	include 'dbcon.php';
	// session_start();

	//GET DATA

	if(isset($_POST['delete'])){
		$usd = mysqli_real_escape_string($dbconnec,$_POST['usd']);

		$sql = "SELECT * FROM users WHERE username='$usd'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			while($data = mysqli_fetch_assoc($result)){

				// $_SESSION['usd'] = $data['usd'];

				// $us = $_SESSION['usd'];

				$sql = "DELETE FROM users WHERE username='$usd'";
				mysqli_query($dbconnec,$sql);

$msg = "Selected user have been deleted";
				header("Location:../adminarea/adminupdateuser.php?delusr=".$msg);
				exit();

			}

		}


		
	}