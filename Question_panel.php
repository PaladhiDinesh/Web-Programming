<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Questions panel</h2><hr/>
	        <?php 
				$query = "SELECT title,admin,questions_table.created_at,question_id,ques_votecount FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id ORDER BY ques_votecount DESC limit 5";
				$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());

				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
					$question_id=htmlentities($row['question_id']);
			?>
			<div class="row">
				<div class="col-md-6">
		
					<p><a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a></p>

						<p>
						<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>">
						<img width="15" height="15" src="images/<?php echo $row['admin']?>" onerror="this.src='images/default.png';" >
						</a>
						<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>"> <?php echo htmlentities($row['admin']) ?></a>
						<?php 
						echo " on ".htmlentities($row['created_at'])."<br />"?> 
						</b>
					</p>
				</div>
				<div class="col-md-3">
				    <form action="Delete.php" method="post">
                    <input type="hidden" value="<?php echo $question_id?>" name="questionid">
				    <button type="button" class="btn btn-success">  Edit    </button>
					<button type="button" class="btn btn-primary">Freeze</button>
				    <button type="submit" value="Delete" class="btn btn-danger">Delete</button>
				    </form>	
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
</div>
