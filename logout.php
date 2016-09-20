<?php
	session_start();
	$_SESSION['authentication'] = 0;
	unset($_SESSION['password']);
	session_destroy();
	header("Location:index.php")
?>