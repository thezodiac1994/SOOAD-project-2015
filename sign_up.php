<?php
session_start();
?>
<html>
	<head>
		<title>HPS by GAR</title>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
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
		<form method = "post" action = "loginnew.php" autocomplete = "off">
		<?php
			if(isset($_SESSION['pwmatch']) && $_SESSION['pwmatch'])
				echo "Passwords do not match. ";
			if(isset($_SESSION['uidtaken']) && $_SESSION['uidtaken'])
				echo "This user id has been already taken. ";
			if(isset($_SESSION['umailused']) && $_SESSION['umailused'])
				echo "This email id is already registered. ";
			if(isset($_SESSION['blank']) && $_SESSION['blank'])
				echo "Its mandatory to fill all the fields. ";
			if(isset($_SESSION['ulen']) && $_SESSION['ulen'])
				echo "Id and password should have at least 6 characters ";
			if(isset($_SESSION['space']) && $_SESSION['space'])
				echo "User ID  can't contain space";
			if(isset($_SESSION['invalid_email']) && $_SESSION['invalid_email'])
				echo "Invalid email id";
			if(isset($_SESSION['mail_sent']) && $_SESSION['mail_sent']==(-1))
				echo "Verification code couldn't be sent to the specified email id, please try later or enter different mail id";
			
			$_SESSION['pwmatch'] = 0;
			$_SESSION['uidtaken'] = 0;
			$_SESSION['blank'] = 0;
			$_SESSION['ulen'] = 0;
			$_SESSION['space'] = 0;
			$_SESSION['invalid_email'] = 0;
			$_SESSION['umailused'] = 0;

		?>
		
		<div id="featured">
			<div class="container">
		<span class="byline">EMAIL ID</span>&nbsp;  <input type = "text"  name = "emailid"> &nbsp;&nbsp;
		<span class="byline">USER ID</span>&nbsp;  <input type = "text"  name = "userid"> &nbsp;&nbsp;
		<span class="byline">PASSWORD</span>&nbsp; <input type = "password"  name = "password"  id = "ukey1"> &nbsp;&nbsp;
		<span class="byline">CONFIRM PASSWORD</span>&nbsp; <input type = "password"  name = "password2"  id = "ukey2"> &nbsp;&nbsp;&nbsp;&nbsp;
		
		<button type = "submit" name = "blogin"> SIGN-UP </button>
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
