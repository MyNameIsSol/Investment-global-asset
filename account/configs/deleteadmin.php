<?php

	include 'dbcon.php';
	// session_start();

	//GET DATA

	if(isset($_POST['delete'])){
		$usd = mysqli_real_escape_string($dbconnec,$_POST['usd']);

		$sql = "SELECT * FROM admins WHERE username='$usd'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			while($data = mysqli_fetch_assoc($result)){

				// $_SESSION['usd'] = $data['usd'];

				// $us = $_SESSION['usd'];

				$sql = "DELETE FROM admins WHERE username='$usd'";
				mysqli_query($dbconnec,$sql);

$msg = "Selected admin have been deleted";
				header("Location:../adminarea/setting.php?deladmin=".$msg);
				exit();

			}

		}


		
	}