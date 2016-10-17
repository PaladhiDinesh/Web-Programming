<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<h1>AnswersKart</h1>
<div class="row">
<div class="container">
<?php
	if ($USERID)
		{

		$query = "SELECT title,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id=".$USERID;
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
					?>

					<?php
		
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$question_id=$row['question_id'];
			?>
<p>
		<a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo $row['title']."<br/>";?></a>
	

		<?php
		 echo "Asked by ".$row['admin']." on ".$row['created_at']."<br />";

		?>
	</p><hr/>
		<?php	}	
	?>
	<?php
		}
		else
		{?>	
			<li><h3>Please login to view your questions</h3></li>
		<?php
	}
?>

</div>
</div>

<?php include "footer.php"; ?>	