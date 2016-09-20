<?php
session_start();
if(!$_SESSION['authentication'])
	header("location:index.php");
$_SESSION['queried'] = 0;

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>HPS by GAR</title>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="home.php">HOME</a></li>
						<li><a href="search.php">SEARCH</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			</div>
			<div class="container"> 
				
				<!-- Logo -->
				<div id="logo">
					<h1><a>Health Prediction System</a></h1>
					<span class="tag">By GAR</span>
				</div>
			</div>
		</div>

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<header>
					<?php
						echo '<h2>HPS welcomes you, ' . ' ' . $_SESSION['username'] . '.</h2>'
					?>
				</header>
				<h4>This is a website developed by <strong>Gautam Shende, Aniket Shinde</strong> and <strong>Rahul Vasaikar</strong>. 
				</h4>
	</body>
</html>