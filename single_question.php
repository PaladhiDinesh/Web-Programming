<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<?php
	if ($USERID)
		{

		$query = "SELECT title,content,created_at FROM questions_table WHERE question_id=1";
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		
		while ($row = mysqli_fetch_array($result)) {
		echo $row[0]."<br />";
		echo $row[1]."<br />";
		echo $row[2]."<br />";	
			}	
	
		}
		else
		{?>	
			<li><h3>Please login to view your questions</h3></li>
		<?php
	}
?>



<?php include "footer.php"; ?>	