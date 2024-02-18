<?php

	include 'dbcon.php';

	if(isset($_POST['delete'])){
		$tradeid = mysqli_real_escape_string($dbconnec,$_POST['tradeid']);

        $sql = "SELECT * FROM tradings WHERE tradeid = '$tradeid'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
			while($data = mysqli_fetch_assoc($result)){

				$sql = "DELETE FROM tradings WHERE tradeid = '$tradeid'";
				mysqli_query($dbconnec,$sql);
                 $msg = "User Trade history has been deleted";
				header("Location:../adminarea/usertrades.php?deltr=".$msg);
				exit();

			}
		}
	}