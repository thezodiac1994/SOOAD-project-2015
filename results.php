<?php
	session_start();
	$_SESSION['opstring'] = "";
	if(!$_SESSION['authentication'])
		header("location:index.php");

	$symp = Array();

	if(isset($_POST['symp1']) && ($_POST['symp1']!='None'))
		array_push($symp,$_POST['symp1']);
	
	if(isset($_POST['symp2']) && ($_POST['symp2']!='None'))
		array_push($symp,$_POST['symp2']);
	
	if(isset($_POST['symp3']) && ($_POST['symp3']!='None'))
		array_push($symp,$_POST['symp3']);
	
	if(isset($_POST['symp4']) && ($_POST['symp4']!='None'))
		array_push($symp,$_POST['symp4']);
	
	if(isset($_POST['symp5']) && ($_POST['symp5']!='None'))
		array_push($symp,$_POST['symp5']);
	
	if(sizeof($symp)==0){
		header("location:search.php");
		$_SESSION['setsymp'] = 1;
	} else $_SESSION['setsymp'] = 0;
	
	$squery = "SELECT name FROM diseases WHERE ";
	//$squery = "SELECT name FROM diseases WHERE chills = '1' ";
	
	
	for($i = 0; $i<sizeof($symp);$i++){
		$squery .= (" " . $symp[$i]);
		$squery .= " = '1' AND";
	}
	
	$squery = chop($squery,"AND");
	
	mysql_connect("localhost","root","21101994");
	mysql_select_db("diseases") or die("couldnt find db");
	$res = mysql_query($squery);
	$nrows = mysql_num_rows($res);
	$_SESSION['temp'] = $squery;
	

	
	if($nrows){
			while ($row = mysql_fetch_assoc($res)) 
				$_SESSION['opstring'] .= ($row['name'] . "<br>");
	} else $_SESSION['opstring'] = "Sorry, We didn't find any results for your search query";
	
	$_SESSION['queried'] = 1;
	header("location:search.php")
?>