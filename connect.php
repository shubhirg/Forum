<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "connect";
	$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Error connecting!");
	
?>