<?php
	
	if($_POST['verf']==$SESSION['uverf']){
				$SESSION['vcode_verify'] = 0;
				$connect = mysql_connect("localhost","root","21101994") or die("couldn't connect");
				mysql_select_db("phplogin") or die("couldnt find database");
				$querypw = $query = mysql_query("INSERT INTO users(username,password) VALUES('$uid','$upw')");
				$_SESSION['username'] = $uid;
				$_SESSION['authentication'] = 1;
				header("Location:home.php");			
	} else {
		$SESSION['vcode_verify'] = 1;
		header("Location:verify.php");
	}
	
	
?>