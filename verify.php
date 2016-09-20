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
		<form method = "post" action = "verify1.php" autocomplete = "off">
		
		<div id="featured">
			<div class="container">
			<?php
					if(isset($_SESSION['vcode_verify']) && $_SESSION['vcode_verify']==1)
						echo "The verification code you entered is incorrect";
			?>
		<span class="byline">ENTER VERIFICATION CODE</span>&nbsp;  <input type = "text"  name = "verf"> &nbsp;&nbsp;
		
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
