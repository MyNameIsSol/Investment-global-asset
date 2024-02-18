<?php

include 'dbcon.php';

if(isset($_POST['closetrade'])){
  $usd = mysqli_real_escape_string($dbconnec,$_POST['usd']);
  $tradeid = mysqli_real_escape_string($dbconnec,$_POST['tradeid']);
  $sql = "SELECT * FROM users WHERE username = '$usd'";
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

        $sql = "SELECT * FROM users WHERE username = '$usd'";
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
        
                WHERE username='$usd' ";
                mysqli_query($dbconnec,$sql);
        
        
                $sql = "UPDATE tradings
        
                SET loss='$loss_amt',statusoftrade='$statusoftrade'
        
                WHERE tradeid='$tradeid' ";
                mysqli_query($dbconnec,$sql);
        
                $msg="Trade Closed";
                header("Location:../adminarea/usertrades.php?updatesuc=".$msg);
                exit();
              }else{
                $earning_percent = $trade_amount * $percent/100;
                $earning_amt = $earning_percent + $trade_amount;
                $new_earn = $earning_amt + $earns;
        
        
                $sql = "UPDATE users
        
                SET earns='$new_earn'
        
                WHERE username='$usd' ";
                mysqli_query($dbconnec,$sql);
        
        
                $sql = "UPDATE tradings
        
                SET profit='$earning_amt',statusoftrade='$statusoftrade'
        
                WHERE tradeid='$tradeid' ";
                mysqli_query($dbconnec,$sql);
        
                $msg="Trade Closed";
                header("Location:../adminarea/usertrades.php?updatesuc=".$msg);
                exit();

              }
            }
          
        }

      }else{
        $error = "Sorry, Your trade was not executed";
        header("Location:../adminarea/usertrades.php?updateerr=".$error);
        exit();
     }
  }
}

 
   ?>