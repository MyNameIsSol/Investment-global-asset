<?php

	include 'dbcon.php';
	if(isset($_POST['detailS'])){
		$firstname = mysqli_real_escape_string($dbconnec,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($dbconnec,$_POST['lastname']);
		$phone = mysqli_real_escape_string($dbconnec,$_POST['phone']);
		$email = mysqli_real_escape_string($dbconnec,$_POST['email']);
		$username = mysqli_real_escape_string($dbconnec,$_POST['username']);
        $state = mysqli_real_escape_string($dbconnec,$_POST['state']);

		$img =  $_FILES['img']['name'];

		// IMAGE 
        if(!empty($img)){
        $target = "../userdash/img/".basename($_FILES['img']['name']);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $fileSize = $_FILES['img']['size'];
        $returned_val = validateImageUpload($target, $fileType, $fileSize);
        if($target == $returned_val){ 
		$sql = "UPDATE users

				SET firstname='$firstname',lastname='$lastname',username='$username',phone='$phone',email='$email',state='$state', profileimg = '$img'

				WHERE username = '$username'
		";

		move_uploaded_file($_FILES['img']['tmp_name'], $target);
		mysqli_query($dbconnec,$sql);

        header("Location:../clientarea/userprofile.php?updated=details");
		exit();
        }else{
            $error = $returned_val;
            header("Location:../clientarea/userprofile.php?error=".$error);
        }
    }else{
        $sql = "UPDATE users

            SET firstname='$firstname',lastname='$lastname',username='$username',phone='$phone',email='$email',state='$state'

            WHERE username = '$username'
    ";
    mysqli_query($dbconnec,$sql);
    header("Location:../clientarea/userprofile.php?updated=details");
    exit();
    }

    }elseif(isset($_POST['addadmin'])){
        $firstname = mysqli_real_escape_string($dbconnec,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($dbconnec,$_POST['lastname']);
		$adtype = mysqli_real_escape_string($dbconnec,$_POST['admintype']);
		$email = mysqli_real_escape_string($dbconnec,$_POST['email']);
		$username = mysqli_real_escape_string($dbconnec,$_POST['username']);
        $password = mysqli_real_escape_string($dbconnec,$_POST['password']);
        
        $sql = "INSERT INTO admins (firstname,lastname,username,email,passwd,admintype) VALUES ('$firstname','$lastname','$username','$email','$password','$adtype')";

		mysqli_query($dbconnec,$sql);
        $msg = "You have successfully added a new admin";
        header("Location:../adminarea/setting.php?adminadded=".$msg);
		exit();
    }elseif(isset($_POST['changeadminpass'])){
		$adname = mysqli_real_escape_string($dbconnec,$_POST['adname']);
        $adpass = mysqli_real_escape_string($dbconnec,$_POST['adpass']);
		

		$sql = "UPDATE admins

				SET passwd='$adpass'

				WHERE username = '$adname'
		";
        $msg = "Admin password has been changed";
		mysqli_query($dbconnec,$sql);
        header("Location:../adminarea/setting.php?updatedpas=".$msg);
		exit();
    }elseif(isset($_POST['adminprofile'])){
		$firstname = mysqli_real_escape_string($dbconnec,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($dbconnec,$_POST['lastname']);
		$email = mysqli_real_escape_string($dbconnec,$_POST['email']);
		$username = mysqli_real_escape_string($dbconnec,$_POST['username']);

		$img =  $_FILES['img']['name'];

		// IMAGE 
        if(!empty($img)){
        $target = "../adminarea/img/".basename($_FILES['img']['name']);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $fileSize = $_FILES['img']['size'];
        $returned_val = validateImageUpload($target, $fileType, $fileSize);
        if($target == $returned_val){ 
		$sql = "UPDATE admins

				SET firstname='$firstname',lastname='$lastname',username='$username',email='$email', profileimg = '$img'

				WHERE username = '$username'
		";

		move_uploaded_file($_FILES['img']['tmp_name'], $target);
		mysqli_query($dbconnec,$sql);

        header("Location:../adminarea/adminprofile.php?updated=admin");
		exit();
        }else{
            $error = $returned_val;
            header("Location:../adminarea/profile.php?error=".$error);
        }
    }else{
        $sql = "UPDATE admins

            SET firstname='$firstname',lastname='$lastname',username='$username',email='$email'

            WHERE username = '$username'
    ";
    mysqli_query($dbconnec,$sql);
    header("Location:../adminarea/adminprofile.php?updated=admin");
    exit();
    }
}else{
        $error = "Sorry, we could not update your details...";
		header("Location:../clientarea/userprofile.php?error=".$error);
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