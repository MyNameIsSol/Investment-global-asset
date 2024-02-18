<?php

include 'dbcon.php';

if(isset($_POST['closetrad'])){
  $username = mysqli_real_escape_string($dbconnec,$_POST['un']);
  $earns = mysqli_real_escape_string($dbconnec,$_POST['earns']);
  $tradeid = mysqli_real_escape_string($dbconnec,$_POST['tradeid']);
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($dbconnec,$sql);
  $result_check = mysqli_num_rows($result);
  if($result_check > 0){
    $sql = "SELECT * FROM tradings WHERE tradeid = '$tradeid'";
    $result = mysqli_query($dbconnec,$sql);
    $result_check = mysqli_num_rows($result);
    if($result_check > 0){
      while($data = mysqli_fetch_assoc($result)){
        $trade_amount=$data['amount'];
        $trade_count=$data['id'];
        $percent=(int)$data['percent'];
        $statusoftrade = "Completed";
      }

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($dbconnec,$sql);
        $result_check = mysqli_num_rows($result);
        if($result_check > 0){
          while($data = mysqli_fetch_assoc($result)){
            $loss_array=explode(",",$data['loss_array']);
          }
            foreach($loss_array as $loss){
              if($trade_count == $loss){
                $loss_amt = $trade_amount;
        
                $sql = "UPDATE users
        
                SET loss='$loss_amt'
        
                WHERE username='$username' ";
                mysqli_query($dbconnec,$sql);
        
        
                $sql = "UPDATE tradings
        
                SET loss='$loss_amt',statusoftrade='$statusoftrade'
        
                WHERE tradeid='$tradeid' ";
                mysqli_query($dbconnec,$sql);
        
                $msg="Trade Closed, You loss!";
                header("Location:../clientarea/trading.php?suc=".$msg."&loss");
                exit();
              }else{
                $earning_percent = $trade_amount * $percent/100;
                $earning_amt = $earning_percent + $trade_amount;
                $new_earn = $earning_amt + $earns;
        
        
                $sql = "UPDATE users
        
                SET earns='$new_earn'
        
                WHERE username='$username' ";
                mysqli_query($dbconnec,$sql);
        
        
                $sql = "UPDATE tradings
        
                SET profit='$earning_amt',statusoftrade='$statusoftrade'
        
                WHERE tradeid='$tradeid' ";
                mysqli_query($dbconnec,$sql);
        
                $msg="Trade Closed, You Won!";
                header("Location:../clientarea/trading.php?suc=".$msg."&profit");
                exit();

              }
            }
          
        }

      }else{
        $error = "Sorry, Your trade was not executed";
        header("Location:../clientarea/trading.php?error=".$error);
        exit();
     }
  }else{
    $error = "Sorry, Your trade was not executed";
    header("Location:../clientarea/trading.php?error=".$error);
    exit();
 }
}

 
   ?>