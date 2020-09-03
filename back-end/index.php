<?php
session_start();
	$username= $_COOKIE['username'];
	$pass = $_COOKIE['pass'];
	if(!isset($_COOKIE['username']) ) {
		header('Location: ../front-end/login.html',true, 301);
	} 
	else {
		
		include_once("config.php");
		$condition="WHERE username= '$username' and pass= md5('$pass')";
		$query="SELECT * FROM logintbl ".$condition;
		$result=mysqli_query($mysqli, $query)->fetch_row();
		if($result){
			$status=$result[2];
			$otherBrowserLogin=$result[4];
			if($otherBrowserLogin=='0'){
				//other browser does not login -> home page
				$username=$_COOKIE['username'];
				$pass=$_COOKIE['pass'];
				header('Location: ../front-end/home.html',true, 301);
			}
			else{
				if($status==1){
					$username=$_COOKIE['username'];
					$pass=$_COOKIE['pass'];
					header('Location: ../front-end/home.html',true, 301);
				}
				else{
					//other browser login -> auto logout
					session_unset();
					session_destroy();
					include_once("config.php");
					$username=$_COOKIE['username'];
					$pass=$_COOKIE['pass'];
					$condition="WHERE username= '$username' and pass= md5('$pass')";
					$query="UPDATE logintbl SET status='0'".$condition;
					mysqli_query($mysqli, $query);
					setcookie('username', null, -1, '/');
					header('Location: ../front-end/login.html',true, 301);
				}
			}
		}
	}
	//
?>