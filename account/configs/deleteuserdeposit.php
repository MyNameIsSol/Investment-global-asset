<?php

	include 'dbcon.php';

	if(isset($_POST['delete'])){
		$depositid = $_POST['depositid'];

		$sql = "SELECT * FROM depositrequest WHERE depositid='$depositid'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			while($data = mysqli_fetch_assoc($result)){

				$sql = "DELETE FROM depositrequest WHERE depositid='$depositid'";
				mysqli_query($dbconnec,$sql);
                 $msg = "User Deposit details has been deleted";
				header("Location:../adminarea/depositrequest.php?del=".$msg);
				exit();

			}

		}


		
	}