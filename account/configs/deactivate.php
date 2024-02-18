<?php
	
	include 'dbcon.php';
	// session_start();
	if(isset($_POST['deactive'])){

$username=mysqli_real_escape_string($dbconnec,$_POST['usd']);
$email=mysqli_real_escape_string($dbconnec,$_POST['email']);

$dactive="deactivated";


$sql = "UPDATE users
SET active='$dactive'

WHERE username='$username'
";

 //send mail to user on account deactivation

    mysqli_query($dbconnec,$sql);
    $msg = "User account have been deactivated";
    
    header("Location:../adminarea/dashboard.php?deactivated=".$msg);
    exit();


}