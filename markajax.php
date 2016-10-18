<?php include "session.php"; ?>	
<?php 
	if($USERID != "undefined"){
		$marker=$_POST['ans_id'];
		$ques_id=$_POST['ques_id'];
		$user_id=$_POST['user_id'];
		if ($user_id==$USERID){
			$queryallzero= "UPDATE answers_table SET marks = 0 WHERE question_id=".$ques_id." and answer_id!=".$marker;
			$query = "UPDATE answers_table SET marks = (marks^1)  WHERE answer_id=".$marker;
			$resultofallzero = mysqli_query($connection,$queryallzero) or die("Failed to query database".mysql_error());
			$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
			echo $result;
		}
	}
?>