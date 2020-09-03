<?php

	session_start();
	
	$username= $_POST["username"];
	$pass=$_POST["pass"];
	
	include_once("config.php");
	$condition="WHERE username= '$username' and pass= md5('$pass')";
	$query="SELECT * FROM logintbl ".$condition;
	$result=mysqli_query($mysqli, $query)->fetch_row();
	if($result){
		$statusLogin=$result[2];
		$statusOtherBrowser=$result[4];;
		date_default_timezone_set('Asia/Jakarta');
		$loginTime=date("Y-m-d H:i:s");	
		if($statusLogin==0){
			$query="UPDATE logintbl SET status='1', loginTime='$loginTime' ".$condition;
		}
		else{
			$query="UPDATE logintbl SET otherBrowser='1', loginTime='$loginTime' ".$condition;
			mysqli_query($mysqli, $query);
			
			if($statusOtherBrowser==1){
				$query="UPDATE logintbl SET otherBrowser='0', loginTime='$loginTime' ".$condition;
				mysqli_query($mysqli, $query);
			}
			
		}
		mysqli_query($mysqli, $query);
		
		$_SESSION['username']=$username;
		$_SESSION['loginTime']=$loginTime;
		setcookie('username', $username, time() + (86400 * 30), "/");
		setcookie('pass', $pass, time() + (86400 * 30), "/");
		setcookie('loginTime', $loginTime, time() + (86400 * 30), "/");
		header('Location: ../front-end/home.html',true, 301);
	}
	else{
		echo
			"<script type='text/javascript'>
				alert('Data not found! Please login with correct username and password!');
				window.location.href='../front-end/login.html';
			</script>";
	}
?>