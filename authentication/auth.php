<?php

namespace SkeletonPHP\Users\Authentication;

session_start();
if (!isset($_SESSION['username'])) {
	header("Location:login.php");
}
