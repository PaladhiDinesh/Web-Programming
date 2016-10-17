<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<h3 align="center">Welcome to Answers Kart</h3>
<div class="container">
	<h4>Top Questions</h4>
</div>
	<?php 

		$query = "SELECT title,admin,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id";
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
			$question_id=$row['question_id'];
			?>
			<div class="container"><a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo $row['title'];?></a></div>

		<?php echo "Asked by ".$row['admin']." on ".$row['created_at']."<br />";

		}	?>
<?php include "footer.php"; ?>	
