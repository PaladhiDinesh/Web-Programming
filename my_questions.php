<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<?php
	if ($USERID)
		{

		$query = "SELECT title FROM questions_table WHERE user_id=$USERID";
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		
		while ($row = mysqli_fetch_array($result)) {?>
		<a href="single_question.php"><?php echo $row[0];?></a>
		<?php
			}	
	
		}
		else
		{?>	
			<li><h3>Please login to view your questions</h3></li>
		<?php
	}
?>



<?php include "footer.php"; ?>	