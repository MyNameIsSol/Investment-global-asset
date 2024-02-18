<?php
$dbserver = "localhost";
$dbusname = "root";
$dbpass = "";
$dbname = "chidalu_bit";


// $dbserver = "localhost";
// $dbusname = "securedg_user";
// $dbpass = "globalasset100%";
// $dbname = "securedg_database";

$dbconnec = mysqli_connect($dbserver,$dbusname,$dbpass,$dbname);
if($dbconnec->connect_error){
    die('<p>Failed to connect to MySQL: '.$dbconnec_error.'</p>');
}
?>