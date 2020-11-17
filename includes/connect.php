<?php
	$dbh = new mysqli("localhost", "dbUser", "password", "webbshop");

	if(!$dbh){
		echo "No connection with database";
		exit;
	}
?>