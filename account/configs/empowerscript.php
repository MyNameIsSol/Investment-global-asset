<?php
 require_once 'phpmailer/PHPMailerAutoload.php';
  include 'dbcon.php';
    $tbname = 'empowerment';
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(22) NOT NULL,
            familyname VARCHAR(22) NOT NULL,
            username VARCHAR(22) NOT NULL,
            email VARCHAR(225) NOT NULL,
            phone VARCHAR(22) NOT NULL,
            image VARCHAR(225) NOT NULL,
            country VARCHAR(22) NOT NULL,
            state VARCHAR(22) NOT NULL,
            address VARCHAR(22) NOT NULL,
            birth VARCHAR(22) NOT NULL,
            gender varchar(255) not null,
            marital VARCHAR(22) NOT NULL,
            education VARCHAR(22) NOT NULL,
            occupation VARCHAR(22) NOT NULL,
            acctnumber VARCHAR(22) NOT NULL,
            bankname VARCHAR(22) NOT NULL,
            whotoldu VARCHAR(22) NOT NULL,
            applyid VARCHAR(225) NOT NULL,
            reg_date DATETIME NOT NULL';
    if($dbconnec){
    $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
    if(!mysqli_query($dbconnec, $sql)){
        $error = "Sorry we could not create your request";
        header("Location:../clientarea/em_program.php?error=".$error);
        exit();
      }
    }

if(isset($_POST['empower'])){
$fname=mysqli_real_escape_string($dbconnec,$_POST['fname']);
$lname=mysqli_real_escape_string($dbconnec,$_POST['lname']);
$uname=mysqli_real_escape_string($dbconnec,$_POST['uname']);
$email=mysqli_real_escape_string($dbconnec,$_POST['email']);


$country=mysqli_real_escape_string($dbconnec,$_POST['country']);
$state=mysqli_real_escape_string($dbconnec,$_POST['state']);
$addrs=mysqli_real_escape_string($dbconnec,$_POST['addrs']);
$phone=mysqli_real_escape_string($dbconnec,$_POST['phone']);
$dob=mysqli_real_escape_string($dbconnec,$_POST['dob']);
$gender=mysqli_real_escape_string($dbconnec,$_POST['gender']);
$marital=mysqli_real_escape_string($dbconnec,$_POST['marital']);

$edu=mysqli_real_escape_string($dbconnec,$_POST['edu']);
$work=mysqli_real_escape_string($dbconnec,$_POST['work']);
$acctno=mysqli_real_escape_string($dbconnec,$_POST['acctno']);
$bnkname=mysqli_real_escape_string($dbconnec,$_POST['bnkname']);
$aboutus=mysqli_real_escape_string($dbconnec,$_POST['aboutus']);
$img =  $_FILES['file_upload']['name'];

$date= date('Y-m-d H:i:s');

$regid=uniqid();
$regid = substr($regid,0,3).substr($regid,-3,3);

$target = "../clientarea/empower/".basename($_FILES['file_upload']['name']);
$fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
$fileSize = $_FILES['file_upload']['size'];
$returned_val = validateImageUpload($target, $fileType, $fileSize);
if($target == $returned_val){ 

    $sql="INSERT INTO empowerment (firstname,familyname,username,email,phone,image,country,state,address,birth,gender,marital,education,occupation,acctnumber,bankname,whotoldu,applyid,reg_date) VALUES ('$fname','$lname','$uname','$email','$phone','$img', '$country','$state','$addrs','$dob','$gender','$marital','$edu','$work','$acctno','$bnkname','$aboutus','$regid','$date')";

move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
// admin receive email for client initiating withdrawal

// USER receive email for info on his/her withdrawal request    

if(!mysqli_query($dbconnec,$sql)){
    die("Error: ".mysqli_error($dbconnec));
    exit;
}

$msg="Thank You for applying, we will get back to you shortly.";
header("Location:../clientarea/em_program.php?suc=".$msg);
exit();
}else{
    $error = $returned_val;
    header("Location:../clientarea/em_program.php?error=".$error);
}

}else{
    $error = "Sorry we could not process your application";
header("Location:../clientarea/em_program.php?error=".$error);
exit();
}

 //standard image validation
 function validateImageUpload($file,$fileExe,$fileSize){
    $exeArray = array("jpg","png","jpeg","gif");
    if(file_exists($file)){
        unlink($file);
    }
        if(in_array($fileExe,$exeArray)){
            if($fileSize < 2097152){
                $message = $file;
            }else{
                $message = "File size too large, Must be exactly 2 MB";
            }
        }else{
            $message = "File format not allowed, please choose a jpg or png or jpeg or gif file.";
        }
        return $message;
}
?>