<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<h2 align="center"> My Questions</h2><hr/>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				if ($USERID != "undefined"){
					$query = "SELECT title,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id='$USERID' ORDER BY question_id DESC";
					$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$question_id=htmlentities($row['question_id']);
						?>
					<div class="row">
						<div class="col-md-6">
							<p>
								<a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a>
							</p>
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
		 				
						<?php } 
				}
				else{
					header('Location:login.php');
				}
						?>
				<?php include "footer.php"; ?>	
		</div>
	</div>
</div>
