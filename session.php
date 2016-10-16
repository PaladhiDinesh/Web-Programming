<?php 
	session_start();
	
	$connection = mysqli_connect("localhost","admin","M0n@rch$","answerskart") or die("Connection Failed");
	
	$USERID=false;
	if (isset($_SESSION['login_user']))

	{
		$USERID=$_SESSION['login_user'];
	}
	else
	{
	}

	?>	