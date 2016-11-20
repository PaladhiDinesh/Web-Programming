<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<h1 align="center">Welcome to Answers Kart</h1>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Unanswered Questions</h2><hr/>
			<?php 
				$query = "SELECT title,admin,questions_table.created_at,questions_table.question_id from questions_table LEFT JOIN answers_table ON questions_table.question_id=answers_table.question_id JOIN login_details ON login_details.user_id=questions_table.user_id WHERE questions_table.question_id NOT IN (SELECT question_id from answers_table)";
				$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());

				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
					$question_id=htmlentities($row['question_id']);
			?>
			<div class="row">
				<div class="col-md-6">
					<p><a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a></p>
				</div>
				<div class="col-md-6">
							<p>
								<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>">
									<img width="25" height="25" src="images/<?php echo $row['admin']?>" onerror="this.src='images/default.png';" >
								</a>
								<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>"> <?php echo htmlentities($row['admin']) ?></a>
									<?php 
										echo " on ".htmlentities($row['created_at'])."<br />"?> 
								</b>
							</p>
				</div>
				<div class="col-md-12">
				<div class="row"><hr/></div>
				</div>
			</div>
				<?php }?>
<?php include "footer.php"; ?>
		</div>
	</div>
</div>