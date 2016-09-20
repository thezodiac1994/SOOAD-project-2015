<?php
	session_start();
	$uid = $_POST['userid'];
	$upw = $_POST['password'];
	
	if(isset($uid) && isset($upw)){
		$connect = mysql_connect("localhost","root","21101994") or die("couldn't connect");
		mysql_select_db("phplogin") or die("couldnt find db");
		
		$queryid = mysql_query("SELECT * FROM users WHERE username='$uid'");
		$nrows = mysql_num_rows($queryid);
		
		if($nrows){
			$querypw = $query = mysql_query("SELECT * FROM users WHERE password='$upw'");
			$nrows = mysql_num_rows($querypw);
			
			if($nrows){
				// successfull login
				//echo "Welcome " . $uid;
				$_SESSION['username'] = $uid;
				$_SESSION['authentication'] = 1;
				header("Location:home.php");
				
			} else {
				$_SESSION['cred_stat']=1;
				header("Location:index.php");
			}
			
		} else { 
				$_SESSION['cred_stat']=-1;
				header("Location:index.php");
		}
		
	} else die("Userid and password fields cant be left blank");

?>