<?php 
	session_start();
	$connection = mysqli_connect("localhost","admin","M0n@rch$","answerskart") or die("Connection Failed");
	$USERID=false;
	if (isset($_SESSION['login_user'])){ 
		$USERID=$_SESSION['login_user'];
		$USERNAME=$_SESSION['login_name'];
		$useradmin=$_SESSION['admin_value'];
	}
	else{
		$USERID='undefined';
		$useradmin='';
	}

	function scores($user){
		$connection = mysqli_connect("localhost","admin","M0n@rch$","answerskart") or die("Connection Failed");
		$query="SELECT SUM(ques_votecount) from questions_table  WHERE user_id ='$user' GROUP BY user_id";
		$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		echo $row['SUM(ques_votecount)'];
	}

?>	