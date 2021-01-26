<?php
	session_start();
	if(empty($_SESSION['username'])){
		exit;
	}

	require('../includes/connect.php');
	
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW);

	if(empty($firstname) || empty($surname) || empty($address) || empty($postcode) || empty($city) || empty($phone)){
		$dbh->close();
		header('Location: user.php?Error=4');
		exit;
	}
	
	$sql = "UPDATE webbshop.customers SET firstname = ?, surname = ?, address = ?, postcode = ?, city = ?, phone = ? WHERE username = ?";
	$res = $dbh->prepare($sql);
	$res->bind_param("sssisis", $firstname, $surname, $address, $postcode, $city, $phone, $_SESSION['username']);
	if($res->execute()){
		header('Location: user.php');
	}
	else{
		header('Location: user.php?Error=3');
	}

	$conn->close();
?>