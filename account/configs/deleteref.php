<?php
	include 'dbcon.php';
	if(isset($_POST['usd'])){
		$usd = mysqli_real_escape_string($dbconnec,$_POST['usd']);
		$sql = "SELECT * FROM reftable WHERE referee='$usd'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
			while($data = mysqli_fetch_assoc($result)){
				$sql = "DELETE FROM reftable WHERE referee='$usd'";
				mysqli_query($dbconnec,$sql);
        $msg = "Selected user referer have been deleted";
				header("Location:../adminarea/dashboard.php?delref=".$msg);
				exit();
			}
		}
	}