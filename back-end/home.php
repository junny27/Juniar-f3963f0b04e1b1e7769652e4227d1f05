<?php

session_start();

	if(ISSET($_SESSION['username'])){
		$username=$_SESSION['username'];
		$loginTime=$_SESSION['loginTime'];
	}
	else{
		if(isset($_COOKIE['username'])) {
			$username=$_COOKIE['username'];
			$pass=$_COOKIE['pass'];
			include_once("config.php");
			$condition="WHERE username= '$username' and pass= md5('$pass')";
			$query="SELECT * FROM logintbl ".$condition;
			$result=mysqli_query($mysqli, $query)->fetch_row();
			if($result){
				$loginTime=$result[3];
			}
		}
	}
	
	echo $username.'|'.$loginTime;
?>