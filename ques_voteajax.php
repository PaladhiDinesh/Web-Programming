<?php include "session.php"; ?>	
<?php 
	if($USERID != "undefined"){
		$ans_id=$_POST['ans_id'];
		$ques_id=$_POST['ques_id'];
		$user_id=$_POST['user_id'];
		$vote=$_POST['vote_value'];
		$vote_select_query = "SELECT user_id,question_id,votes FROM votes_table WHERE user_id=$user_id and question_id=$ques_id and answer_id=$ans_id";
		$select_result= mysqli_query($connection,$vote_select_query) or die("Failed to query database".mysql_error());
		$que_vote_row = mysqli_fetch_array($select_result,MYSQLI_ASSOC);
		
		if ($select_result->num_rows ==0){

			$vote_ins_query ="INSERT INTO votes_table(user_id,question_id,answer_id,votes) VALUES ('$user_id','$ques_id','$ans_id','$vote')";	
			$ins_result = mysqli_query($connection,$vote_ins_query) or die("Failed to query database".mysql_error());

			$vote_questions_query ="UPDATE questions_table SET ques_votecount=ques_votecount+".$vote." WHERE question_id=$ques_id";	
			$quesins_result = mysqli_query($connection,$vote_questions_query) or die("Failed to query database".mysql_error());

			$vote_select_query="SELECT ques_votecount from questions_table WHERE question_id=$ques_id";
			$vote_select_result=mysqli_query($connection,$vote_select_query) or die ("Failed to query database".mysql_error());
			$sel_row=mysqli_fetch_array($vote_select_result,MYSQLI_ASSOC);

			echo $sel_row['ques_votecount'];



		}
		else{
			if($vote==1){
				if ($que_vote_row['votes']==1){
					echo 'false';
				}
				else{
					$vote_update_query= "UPDATE votes_table SET votes = votes+1 WHERE user_id=$user_id and question_id=$ques_id and answer_id=0";
					$upd_result = mysqli_query($connection,$vote_update_query) or die("Failed to query database".mysql_error());


					$vote_questions_query ="UPDATE questions_table SET ques_votecount=ques_votecount+1 WHERE question_id=$ques_id";	
					$questions_result = mysqli_query($connection,$vote_questions_query) or die("Failed to query database".mysql_error());

					$vote_select_query="SELECT ques_votecount from questions_table WHERE question_id=$ques_id";
					$vote_select_result=mysqli_query($connection,$vote_select_query) or die ("Failed to query database".mysql_error());
					$sel_row=mysqli_fetch_array($vote_select_result,MYSQLI_ASSOC);

			echo $sel_row['ques_votecount'];
				}

			}
			else{
				if($que_vote_row['votes']==-1)
				{
					echo 'false';
				}
				else{
					$vote_update_query= "UPDATE votes_table SET votes = votes-1 WHERE user_id=$user_id and question_id=$ques_id and answer_id=0";
					$upd_result = mysqli_query($connection,$vote_update_query) or die("Failed to query database".mysql_error());


					$vote_questions_query ="UPDATE questions_table SET ques_votecount=ques_votecount-1 WHERE question_id=$ques_id";	
					$questions_result = mysqli_query($connection,$vote_questions_query) or die("Failed to query database".mysql_error());

					$vote_select_query="SELECT ques_votecount from questions_table WHERE question_id=$ques_id";
					$vote_select_result=mysqli_query($connection,$vote_select_query) or die ("Failed to query database".mysql_error());
					$sel_row=mysqli_fetch_array($vote_select_result,MYSQLI_ASSOC);

					echo $sel_row['ques_votecount'];
				}
			}
		}
	}	
?>