<?php
session_start();
unset($_SESSION['adminname']);
header('Location: ../my_account.php');
?>