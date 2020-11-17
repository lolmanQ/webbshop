<?php
	session_start();
	$_SESSION['username'] = "";
	$_SESSION['status'] = "";
	session_destroy();
	header('Location: index.php'); 
?>