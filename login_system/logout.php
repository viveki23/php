<?php 
//start session
session_start();

//unset session
$_SESSION = array();

//destory session
session_destroy();

//redirect login page
header("location:login.php");
exit;