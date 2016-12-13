<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	


<?php
 
 if ($useradmin==1){
 	$freezequery="UPDATE questions_table SET freeze=(freeze ^ 1) WHERE question_id=".$_GET['ques_id'];
 	$getfreeze = mysqli_query($connection,$freezequery)or die("Failed to query database".mysql_error());

 	if ($getfreeze){
 		header('Location:single_question.php?ques_id='.$_GET['ques_id']);
 	}

 }
 else
{
	 header('Location: 404error.php');
}
 ?>
 <?php include "scripts.php"; ?>