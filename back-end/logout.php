<?php
session_unset();
session_destroy();
include_once("config.php");
$username=$_COOKIE['username'];
$pass=$_COOKIE['pass'];
$condition="WHERE username= '$username' and pass= md5('$pass')";
$query="UPDATE logintbl SET status='0', otherBrowser='0'".$condition;
mysqli_query($mysqli, $query);

setcookie('username', null, -1, '/');
?>