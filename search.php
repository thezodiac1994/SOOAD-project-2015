<?php
session_start();
if(!$_SESSION['authentication'])
	header("location:index.php");
$symptoms = Array("None",
"anxiety","body_pain","chills","cough","cramps",
"depression","diarrhea","dizzines","fatigue","hallucination",
"headache","insomnia","itching","nausea","palpitation",
"paralysis","paranoia","rashes","vomiting","weakness");

?>

<html>
	<head>
		<title>HPS by GAR</title>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
	</head>
	
	<body>

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
	<!-- Header --> 

	<!-- Main -->
		<div id="main">
			<div id="content" class="container">
					<header>
						<h2>Search Tab</h2>
					</header>
					
					<p>Welcome to our search page. We provide you with a platform to search for the ailness/diseases pertaining to 
					particular symptoms. We have a large database pertaining to innumerous distinct symptoms and diseases.</p> <br><br>
					
					<div id="content" class="container">
					<header>
						<h2>How it works</h2>
					</header>
					</div>
					
					<p>You can select the symptoms shown by the patient from the drop down boxes below and click on submit. It is 
					not neccessary to fill all the text fields but you must enter at least one symptom. We will then look
					up for the possible diseases/ailness that could match up the symptoms you provided in our vivid database
					and display them with appropriate details.</p>
					
					<?php 
					if(isset($_SESSION['setsymp']) && $_SESSION['setsymp']==1)
						echo '<p> PLEASE SELECT AT LEAST ONE SYMPTOM </p>';
					?>
				
					<p>Enter the symptoms here : </p>
					
					<form method="post" action = "results.php"> 
					
						<select name = "symp1" id = "symp1"> 
						<?php
							for($i=0;$i<sizeof($symptoms);$i++){
								echo '<option value = "' .  $symptoms[$i] . '">' .  $symptoms[$i] . '</option>' ; 
							}
						?>
						</select> * &nbsp; &nbsp;
						
						<select name = "symp2"> 
						<?php
							for($i=0;$i<sizeof($symptoms);$i++){
								echo '<option value = "' .  $symptoms[$i] . '">' .  $symptoms[$i] . '</option>' ; 
							}
						?>
						</select> &nbsp; &nbsp;
						
						<select name = "symp3"> 
						<?php
							for($i=0;$i<sizeof($symptoms);$i++){
								echo '<option value = "' .  $symptoms[$i] . '">' .  $symptoms[$i] . '</option>' ; 
							}
						?>
						</select> &nbsp; &nbsp;
						
						<select name = "symp4">
						<?php
							for($i=0;$i<sizeof($symptoms);$i++){
								echo '<option value = "' .  $symptoms[$i] . '">' .  $symptoms[$i] . '</option>' ; 
							}
						?>
						</select> &nbsp; &nbsp;
						
						
						<select name = "symp5">
						<?php
							for($i=0;$i<sizeof($symptoms);$i++){
								echo '<option value = "' .  $symptoms[$i] . '">' .  $symptoms[$i] . '</option>' ; 
							}
						?>
						</select> &nbsp; &nbsp;&nbsp; &nbsp;
						<button type = "submit">SEARCH</button>
												
					</form>
					
					<div id="main">
					<div id="content" class="container">
						<?php
						if(isset($_SESSION['queried']) && $_SESSION['queried']==1)
							echo 
							'<header>
							<h2>Search Results</h2>
							</header>
							<p> '. $_SESSION["opstring"] .'</p>';
							$_SESSION["opstring"] = "";
							$_SESSION['queried'] = 0;
						?>

					</div>
					</div>
		
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