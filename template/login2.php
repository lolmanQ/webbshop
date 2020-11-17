<?php

	if(empty($_POST['username'])||empty($_POST['password'])){
		header('Location: login.php?loginError=3');
	}
	require('../includes/connect.php');
	

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

	$hashedPassword = hash("sha256", $password);

	$sql = "SELECT password, status FROM webbshop.user WHERE username=?";
	$res = $dbh->prepare($sql);
	$res->bind_param("s",$username);
	$res->execute();

	$result = $res->get_result();
	$row=$result->fetch_assoc();
	session_start();
	if(!$row){
		header('Location: login.php?loginError=2');
	}
	else{
		if(password_verify($password, $row['password'])){
			$_SESSION["username"] = $username;
			$_SESSION['status'] = $row['status'];
			header('Location: products.php'); 
		}
		else{
			echo "failed to loggin";
			header('Location: login.php?loginError=1');
		}
	}
	
	$dbh->close();
?>