<?php
session_start();
?>
<html>
	<head>
		<title>HPS by GAR</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>

	<body class = "homepage">

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="sign_up.php">SIGNUP</a></li>
						<li><a href="index.php">LOGIN</a></li>
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

<html>
	<head/>
	<body> 
	<form method = "post" action = "login.php" autocomplete = "off">
		<?php
			if(isset($_SESSION['cred_stat']) && $_SESSION['cred_stat']==-1)echo "Invalid userid!";
			else if(isset($_SESSION['cred_stat']) && $_SESSION['cred_stat']==1) echo "Invalid password!";
			$_SESSION['cred_stat'] = 0;
			$_POST = array();
		?>
			<div id="featured">
			<div class="container">
						<span class="byline">ID</span> &nbsp; &nbsp;
						<input type = "text"  name = "userid">  &nbsp; &nbsp;
						<span class="byline">PASSWORD</span>  &nbsp;&nbsp;
						<input type = "password"  name = "password"  id = "ukey"> &nbsp; &nbsp; &nbsp; &nbsp;
						<button type = "submit" name = "blogin"> LOGIN </button> 

			</div>
		</div>
		
	</form>
		
	
	<!-- Footer -->
		<div id="footer">
			<div class="container">
				<section>
					<header>
						<h2>Get in touch</h2>
						<span class="byline">We would be glad to help</span>
					</header>	
					<ul class="contact">
						<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
						<li class="active"><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
						<li><a href="#" class="fa fa-dribbble"><span>Pinterest</span></a></li>
						<li><a href="#" class="fa fa-tumblr"><span>Google+</span></a></li>
					</ul>
				</section>
			</div>
		</div>
		
	</body>
	
</html>
