<?php

	include 'dbcon.php';

	if(isset($_POST['ccpay'])){
		$withid = $_POST['withid'];

		$sql = "SELECT * FROM withdrawalrequest WHERE withdrawalid='$withid'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			while($data = mysqli_fetch_assoc($result)){

				// $_SESSION['withid'] = $data['withid'];

				// $depositi = $_SESSION['withid'];

				$sql = "DELETE FROM withdrawalrequest WHERE withdrawalid='$withid'";
				mysqli_query($dbconnec,$sql);

                 $msg = "selected withdrawal id has been deleted";
				header("Location:../adminarea/withdrawalrequest.php?delwitsuc=".$msg);
				exit();

			}

		}


		
	}