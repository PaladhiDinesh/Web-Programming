<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<h3 align="center">Welcome to Answers Kart</h3>
<div class="container">
	<h4>Top Questions</h4>
</div>
	<?php 

		$query = "SELECT title FROM questions_table WHERE question_id=1";
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		
		while ($row = mysqli_fetch_array($result)) { ?>
			<div class="container"><a href='single_question.php'><?php echo $row[0]."<br />";?></a></div>
		<?php }	?>
<?php include "footer.php"; ?>	
