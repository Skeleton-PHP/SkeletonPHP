<?php

namespace SmallPHP\Components;
use SmallPHP\Database\Connection;






include_once "Users/auth.php";
include_once "Components/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex" />
	<title>Dashboard - Secured Page</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="form">
		<p>Dashboard</p>
		<p>This is your profile page.</p>
		<a href="index.php">Home</a>
		<a href="logout.php">Logout</a>
	</div>
</body>

</html>
