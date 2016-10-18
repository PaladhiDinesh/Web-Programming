<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<?php 

	if (isset($_POST['submit']))
	{
		$newquestion = $_GET['ques_id'];
		$summernote = $_POST['summernote'];
		$summernote = mysqli_real_escape_string($connection,$summernote);

		$query = "INSERT INTO answers_table(question_id, user_id, answer) VALUES ('$newquestion','$USERID','$summernote')";
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		if($result) {
	#	$last_id = mysqli_insert_id($connection);
		 #echo "New record created successfully. Last inserted ID is: " . $last_id;
		header('Location:single_question.php?ques_id='.$newquestion);

		}
	}

		$query = "SELECT questions_table.user_id,title,admin,content,questions_table.created_at FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id WHERE question_id=".$_GET['ques_id'];
		$answerquery= "SELECT answer_id,admin,answer,answers_table.created_at,marks from answers_table JOIN login_details ON login_details.user_id=answers_table.user_id WHERE question_id=".$_GET['ques_id'];
		$result = mysqli_query($connection,$query)
					or die("Failed to query database".mysql_error());
		$new=$result->num_rows;
		if ($new==0)
		{
			header('Location:404error.php');
		}
		$answerresult = mysqli_query($connection,$answerquery)
					or die("Failed to query database".mysql_error());
					?>	
					<div class="container">
					<?php
	 	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$user_id = $row['user_id']; ?> <p class="lead"> <?php
		#echo "Question:"."<br />";
		echo htmlentities($row['title'])."<br />"; ?></p><hr/><?php
		echo $row['content']."<br />";
		echo "Asked by ".htmlentities($row['admin'])." on ".htmlentities($row['created_at'])."<br />"?>
		<h4> Answers </h4>
		<hr/><?php
	

		while ($row1 = mysqli_fetch_array($answerresult,MYSQLI_ASSOC)) {
			echo "<div class='row'>";
			echo '<div class="col-md-12">';

			if ($user_id==$USERID){
			if($row1['marks']==1) {?> 		
				<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400 ;cursor: pointer"></i>
			<?php }else
			{ ?>
			<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #D3D3D3; cursor:pointer"></i>
			<?php }
		} else
		{
			if($row1['marks']==1)
			{?> 	
			<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400"></i>
			<?php }
		}
			?> 
		
		<input class="answer_id" type="hidden" value=<?php echo $row1['answer_id']?>>
		<?php
		echo $row1['answer']."<br />";
		echo "Answered by ".htmlentities($row1['admin']). " on ".htmlentities($row1['created_at']);	
		?></div></div><hr/><?php
			}
		


?>
<form class="form col-md-12 center-block" method="post">
  <textarea id="summernote" name="summernote" required>Post your Answer here</textarea>
   

<?php if ($USERID != "undefined"){?>

	<div>
    	<button  id = "single_submit" type="submit" name="submit" class="btn btn-dinesh">Post your Answer</button>
    </div>

<?php 
}
 else{?>
<div>
 	<button  id = "single_submit" type="submit" class="btn btn-dinesh" disabled >Post your Answer</button>
 	<script type="text/javascript">
 		alert('Please login to post your Answer');
 	</script>
 	<h4>Please Login to post your answer</h4>
 	    </div>
 	<?php
 }
?>
</form>
</div>
   <script>
    $(document).ready(function() {

    	$('.correct_ans').click(function () {
    		var user_id = <?php echo $USERID;?>;
    		if(user_id == <?php echo $user_id;?>) {
			

			var _this=this;
    		var color = ($(this).css('color') == 'rgb(211, 211, 211)') ? '#006400'	: '#D3D3D3';
	    	$.post('markajax.php', {'ans_id': $(_this).next().val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $user_id;?>}, function(response) {

	    		if(response) {
		    		$('.correct_ans').css('color', '#D3D3D3');
	    			$(_this).css('color', color);	    				
	    		}
	    		else {

	    		}

	    		});
    		}
    	});

        $('#summernote').summernote({
		  height: 150,                 // set editor height
 			minHeight: 100,             // set minimum height of editor
  maxHeight: 300,             // set maximum height of editor
  width: 500
});
    });
    </script>

<?php include "footer.php"; ?>	
