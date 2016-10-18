<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<h2 align="center"> My Questions</h2><hr/>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php
				if ($USERID != "undefined"){
					$query = "SELECT title,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id='$USERID' ORDER BY question_id DESC";
					$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$question_id=htmlentities($row['question_id']);
						?><p>
						<a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a>
						</p>
						<?php
		 				echo "Asked by ".htmlentities($row['admin'])." on ".htmlentities($row['created_at'])."<br />";
		 				?><hr/>
						<?php
					}
				}
				else{
					header('Location:login.php');
				}
						?>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>	