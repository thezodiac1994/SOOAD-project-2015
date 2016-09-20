<?php
session_start();
?>

<html>
	<head>
		<title>HPS by GAR</title>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
	</head>
	
	<body>

	<!-- Header -->
	<?php 
		if(isset($_SESSION['authentication']) && $_SESSION['authentication']!=0){
		echo '
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
			';
		} else {
			
			echo 
			'<div id="header">
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
		 ';
			
		}
		?>
				<!-- Logo -->
				<div id="logo">
					<h1><a>Health Prediction System</a></h1>
					<span class="tag">By GAR</span>
				</div>
			</div>
		</div>
	<!-- Header --> 

	<!-- Main -->
		<div id="main">
			<div id="content" class="container">
				<section>
					<header>
						<h2>About HPS</h2>
					</header>
					
					<p>We provide you with a platform to search for the ailness pertaining to particular symptoms. We have a large
					database pertaining to innumerous distinct symptoms and diseases.We also offer details of doctors specializing
					in provided fields of interest to our registered users. Registration is absolutely free.</p>
					
					<p>We plan to consult reknowned doctors to update our site and keep up with the ever expanding field of medical science. The list
					of doctors will be found on our consultants page. We are grateful to them.</p>
					
					<p>We have also planned to add a "Consult Now" feature in near future where you can consult doctors or their assistants
					online via video or audio calls to book an appointment	in the Consult Now tab.</p>	
					
					<p> This website has been developed as a part of a Semester V mini project by the developers in the period of
					August 2015 to October 2015.</p>
					
					
		<header>
		<span class="byline">Developers : Gautam Shende, Aniket Shinde and Rahul Vasaikar</span>
		</header>
				</section>
			</div>
		</div>
	<!-- /Main -->

	<!-- Tweet -->
		<div id="tweet">
			<div class="container">
				<section>
					<blockquote>&ldquo;To serve humanity, is to serve God.&rdquo;</blockquote>
				</section>
			</div>
		</div>
	<!-- /Tweet -->

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