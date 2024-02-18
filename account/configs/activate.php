<?php
	
include 'dbcon.php';

// session_start();
if(isset($_POST['active'])){

$username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
$email=mysqli_real_escape_string($dbconnec,$_POST['email']);

$active="activated";
$sql = "UPDATE users

SET active='$active'

WHERE username='$username'
";
mysqli_query($dbconnec,$sql);


//send user email on account activation

$msg = "User account was successfully activated";
header("Location:../adminarea/dashboard.php?activated=".$msg);
exit();


	}