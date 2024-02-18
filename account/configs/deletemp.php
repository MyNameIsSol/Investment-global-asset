<?php

	include 'dbcon.php';

	if(isset($_POST['delete'])){
		$email = $_POST['email'];

		$sql = "SELECT * FROM empowerment WHERE email='$email'";
		$result = mysqli_query($dbconnec,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			while($data = mysqli_fetch_assoc($result)){

				$sql = "DELETE FROM empowerment WHERE email='$email'";
				mysqli_query($dbconnec,$sql);
                 $msg = "Selected details has been deleted";
				header("Location:../adminarea/empower.php?del=".$msg);
				exit();

			}

		}


		
	}