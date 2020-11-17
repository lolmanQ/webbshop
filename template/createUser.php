<?php
	$serverConfigString = '{
		"db":{
			"host":"localhost",
			"name": "webbshop",
			"username": "dbUser",
			"password": "password"
		}	
	}';

	$serverConfig = json_decode($serverConfigString);
	$conn = new mysqli($serverConfig->db->host, $serverConfig->db->username, $serverConfig->db->password, $serverConfig->db->name);
	

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_LOW);
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_LOW);
	
	$hashedPassword = password_hash($password, 1);
	$sql = "INSERT INTO `webbshop`.`user` (`username`, `password`, `email`) VALUES ('$username', '$hashedPassword', '$email');";
	if($conn->query($sql) === TRUE){
		$sql = "INSERT INTO `webbshop`.`customers` (`username`, `firstname`, `surname`, `address`, `postcode`, `city`, `phone`) VALUES ('$username', '$firstname', '$surname','$address', '$postcode', '$city', '$phone');";
		if($conn->query($sql) === TRUE){
			echo "Ny användare skapad";
			header('Location: login.php');
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>