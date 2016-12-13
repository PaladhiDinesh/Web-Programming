<?php
	include('session.php');
	$filename = './images/'.$USERNAME;
	if (file_exists($filename)) {
	    unlink($filename);
	  } 
	header('Location:./ProfilePage.php?name='.$USERNAME.'&page=1');
?>    