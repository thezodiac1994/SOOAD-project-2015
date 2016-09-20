<?php
// took it from stack overflow 

function verifyEmail($toemail, $fromemail, $getdetails = false){
	$email_arr = explode("@", $toemail);
	$domain = array_slice($email_arr, -1);
	$domain = $domain[0];
	// Trim [ and ] from beginning and end of domain string, respectively
	$domain = ltrim($domain, "[");
	$domain = rtrim($domain, "]");
	if( "IPv6:" == substr($domain, 0, strlen("IPv6:")) ) {
		$domain = substr($domain, strlen("IPv6") + 1);
	}
	$mxhosts = array();
	if( filter_var($domain, FILTER_VALIDATE_IP) )
		$mx_ip = $domain;
	else
		getmxrr($domain, $mxhosts, $mxweight);
	if(!empty($mxhosts) )
		$mx_ip = $mxhosts[array_search(min($mxweight), $mxhosts)];
	else {
		if( filter_var($domain, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ) {
			$record_a = dns_get_record($domain, DNS_A);
		}
		elseif( filter_var($domain, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ) {
			$record_a = dns_get_record($domain, DNS_AAAA);
		}
		if( !empty($record_a) )
			$mx_ip = $record_a[0]['ip'];
		else {
			$result   = "invalid";
			$details .= "No suitable MX records found.";
			return ( (true == $getdetails) ? array($result, $details) : $result );
		}
	}
	
	$connect = @fsockopen($mx_ip, 25); 
	if($connect){ 
		if(preg_match("/^220/i", $out = fgets($connect, 1024))){
			fputs ($connect , "HELO $mx_ip\r\n"); 
			$out = fgets ($connect, 1024);
			$details .= $out."\n";
 
			fputs ($connect , "MAIL FROM: <$fromemail>\r\n"); 
			$from = fgets ($connect, 1024); 
			$details .= $from."\n";
			fputs ($connect , "RCPT TO: <$toemail>\r\n"); 
			$to = fgets ($connect, 1024);
			$details .= $to."\n";
			fputs ($connect , "QUIT"); 
			fclose($connect);
			if(!preg_match("/^250/i", $from) || !preg_match("/^250/i", $to)){
				$result = "invalid"; 
			}
			else{
				$result = "valid";
			}
		} 
	}
	else{
		$result = "invalid";
		$details .= "Could not connect to server";
	}
	if($getdetails){
		return array($result, $details);
	}
	else{
		return $result;
	}
}

	session_start();
	$umail = $_POST['emailid'];
	$uid = $_POST['userid'];
	$upw = $_POST['password'];
	$upw2 = $_POST['password2'];
	$un1 = mt_rand(100000000,1000000000);  // order is 10^9 
	$un2 = mt_rand(100000000,1000000000);  // order is 10^9 
	$uverf = $un1 . $un2;
	$_SESSION['vcode'] = $uverf;
	
	if((!strlen($umail)) || (!strlen($uid)) || (!strlen($upw)) || (!strlen($upw2))){
		$_SESSION['blank'] = 1;
		header("Location:sign_up.php");
	}
		
	else if($upw!=$upw2){
		$_SESSION['pwmatch'] = 1;
		header("Location:sign_up.php");
	} 
	else if(strlen($uid)<6 || strlen($upw)<6){
		$_SESSION['ulen'] = 1;
		header("Location:sign_up.php");
	}
	
	else if(strpos($uid," ")!==false){  // !== is used because when space is in 0 th position 0 = false can give boundary errors here when != is used... !== resolves this issue.
		$_SESSION['space'] = 1;
		header("Location:sign_up.php");
		
	}
	
	else if(verifyEmail($umail,"gautamtrueblue@gmail.com")!="valid"){
		$_SESSION['invalid_email'] = 1;
		header("Location:sign_up.php");
	}

	
	else {
		$_SESSION['invalid_email'] = 0;
		$connect = mysql_connect("localhost","root","21101994") or die("couldn't connect");
		mysql_select_db("phplogin") or die("couldnt find database");
		$query = mysql_query("SELECT * FROM users WHERE username = '$uid'");
		$nrows = mysql_num_rows($query);
		if($nrows){
			$_SESSION['uidtaken'] = 1;
			header("Location:sign_up.php");
		} else {
			$query = mysql_query("SELECT * FROM users WHERE email = '$umail'");
			$nrows = mysql_num_rows($query);
			
			if($nrows){
				$_SESSION['umailused'] = 1;
				header("Location:sign_up.php");
			} else {
			
				// create new id	
				$message = "Verification code for your HPS account is " .  $uverf;
				$from = "gautamtrueblue@gmail";
				$head = "From:" . $from;
				$send_mail = mail($umail,"HPS verification mail",$message,$head);
				
				if($send_mail==true) {
					$_SESSION['mail_sent'] = 1;
					header("location:verify.php");
					
				} else {
					$_SESSION['mail_sent'] = -1;
					header("location:sign_up.php");
				}
			}
		}
	}

?>