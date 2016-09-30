<?php
	if(!empty($_POST['username'])){
		$username = $_POST['username'];	
		}
	else{
		echo "Please enter valid username and password";
		exit();
	}
	if(!empty($_POST['password'])){
		$password = $_POST['password'];
		}
	else{
		echo "Please enter valid username and password";
		exit();
	}
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	mysql_connect("localhost","root","");
	mysql_select_db("answerskart");

	$result = mysql_query("select * from login_details where admin ='$username' and password = '$password'")
					or die("Failed to query database".mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['admin'] == $username && $row['password'] == $password){
		echo "Welcome to Answerskart ".$row['admin'];

	}else{
		echo "Failed to login";

	}
?>