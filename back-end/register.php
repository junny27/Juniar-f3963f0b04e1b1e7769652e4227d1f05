<?php

	session_start();
	
	$username= $_POST["username"];
	$pass=$_POST["pass"];
	
	include_once("config.php");
	$query="INSERT INTO logintbl VALUES ('$username', md5('$pass'), '0', now(), '0')";
	mysqli_query($mysqli, $query);
	header('Location: ../front-end/login.html',true, 301);
?>