<?php

namespace SkeletonPHP\Database\Connection;

use SkeletonPHP\classes;
use SkeletonPHP\classes\Config\Config;

$config = new Config();
$servername = $conf->getHost();
$username = $conf->getUsername();
$password = $conf->getPassword();
$dbname = $conf->getDatabase();
$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
