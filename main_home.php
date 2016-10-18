<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<h1 align="center">Welcome to Answers Kart</h1>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2>Recent Questions</h2><hr/>
			<?php 
				$query = "SELECT title,admin,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id ORDER BY question_id DESC";
				$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
					$question_id=htmlentities($row['question_id']);
			?>
					<p><a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a></p>
					<?php echo "Asked by ".htmlentities($row['admin'])." on ".htmlentities($row['created_at'])."<br />" ?><hr/>
				<?php }?>
<?php include "footer.php"; ?>
		</div>
	</div>
</div>
