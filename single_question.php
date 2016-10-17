<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<?php 

		$query = "SELECT title,admin,content,questions_table.created_at FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id WHERE question_id=".$_GET['ques_id'];
		$answerquery= "select admin,answer,answers_table.created_at from answers_table JOIN login_details ON login_details.user_id=answers_table.user_id WHERE question_id=".$_GET['ques_id'];
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		$answerresult = mysqli_query($connection,$answerquery)
					or die("Failed to query database".mysql_error());
					?>
					<div class="container">
					<?php
		
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			?>
			<p class="lead"		>
			<?php
		//echo "Question:"."<br />";
		echo $row['title']."<br />";
		?>
		</p><hr/>
		<p>
		<?php
		echo $row['content']."<br />";
		echo "Asked by ".$row['admin']." on ".$row['created_at']."<br />"."<br />";
			}	
			?></p><hr/>
<?php
		while ($row1 = mysqli_fetch_array($answerresult,MYSQLI_ASSOC)) {
			?>
			<p>
			<?php
		echo "Answer:"."<br />";
		echo $row1['answer']."<br />";
		echo "Answered by ".$row1['admin']. " on ".$row1['created_at']."<br />"."<br />";
		?>
		</p><hr/>
		
		<?php	
			}	


?></div>
<div class="container">
<form>
<div id="summernote"><p>Post your question here</p></div>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
  height: 150,                 // set editor height
  minHeight: 100,             // set minimum height of editor
  maxHeight: 300,             // set maximum height of editor
  width: 500,
  focus: true                  // set focus to editable area after initializing summernote
});
    });
    </script>
<?php if ($USERID){?>

	<div>
    	<button  id = "single_submit" type="submit" class="btn btn-primary">Submit</button>
    </div>

<?php 
}
 else
 {?>
<div>
 	<button  id = "single_submit" type="submit" class="btn btn-primary" disabled >Submit</button>
 	<h3>Please Login to post your answer</h3>
 	    </div>
 	<?php
 }
?>
</form>
</div>


<?php include "footer.php"; ?>	