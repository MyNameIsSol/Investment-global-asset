<?php
include 'dbcon.php';
	
if (isset($_POST['sendmail'])) {
  $sub = $_POST['sub'];
  $email =mysqli_real_escape_string($dbconnec,$_POST['email']);
  $name =mysqli_real_escape_string($dbconnec,$_POST['name']);
 $masg = $_POST['msg'];


 //SEND INDIVIDUAL MAIL TO CLIENT  


 $msgg = "Message sent";
 header("Location:../adminarea/sendsarsmail.php?mailsuc=".$msgg."&email=".$email);
 exit();
}else{
    $error =  "Invalid user email";
    header("Location:../adminarea/sendsarsmail.php?mailerr=".$error."&email=".$email);
}
