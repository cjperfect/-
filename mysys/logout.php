<?php 
session_start();//开启Session

$_SESSION = array();
session_destroy();
header('location:login.php');
?>