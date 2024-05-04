<?php

namespace SkeletonPHP;
use SkeletonPHP\AutoLoader;
	//require('Database/db.php');
	include_once 'Components/header.php';
	session_start();
		if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		//Display a message for logged-in users only
		echo "<center><h3>Hello " . $username . "
		!</h3></center>";
		echo "<center><div><p><a href='dashboard.php'> Dashboard</a><a href='logout.php'> Logout</a></p></div></center>";

		}
		else{
		//Display different text if a user is not logged in.
		echo "<center><h3>Welcome to my Awesome Website!</h3></center>";
				echo '<center><div>New user? Please <a href="login.php">Login</a> or <a href="register.php">Register</a>
				</div></center>';
		}
	?>
	<!DOCTYPE html>
<html lang="en">

	<head>
<title>Some relevant title</title>
</head>
	<body>
		<header>
			<div class="container">
				<h3>About This Project</h3>
		<?php
		//If the user is logged-in
		if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo '
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">My Awesome Website</a>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">
						<span class="glyphicon glyphicon-home"></span>
						Home</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="dashboard.php"> Dashboard</a></li>
					<li><a href="logout.php"> Logout</a></li>';
	}
		//If the user is logged-out
		else{
		echo '
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">My Awesome Website</a>
				</div>

			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">
							<span class="glyphicon glyphicon-home"></span>
							Home</a></li>
						<li><a href="#contact">Contact</a></li>

			<li><a href="login.php"><span class="glyphicon
					glyphicon-log-in"></span> Login</a></li>
					<li><a href="register.php"><span class="glyphicon
					glyphicon-user"></span> Register</a></li>';

		}
	?>
			</div>
		</header>
		<section class="container" >
			<div class="row">
				<div class="col-md-9 content">
					 <p class="text-justify">This is an educational open-source project. It is a dynamic website, built from scratch using PHP and MySQL. The main functionality of the website is to allow users to register and log in. When a user registers, the data is stored in the database. When a user tries to log in, the database is checked. In case of a match, the user logs in. The data of the website changes when a user is logged in. That is why this is a dynamic website. The website uses some very basic styling from Bootstrap. Bootstrap is a CSS and JavaScript framework for developing responsive, mobile first websites.</p>
				</div>
			</div>
		</section>
		<footer class="container">
		   <?php

		?>
		</footer>
	</body>
	</html>
