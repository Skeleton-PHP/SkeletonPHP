<?php
namespace SmallPHP\classes;


	$servername = Config::setting;
	$username = "root";
	$password = "";
	$dbname = "DB_1";
	// Create connection

	$password = getenv('MYSQL_SECURE_PASSWORD');

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	?>