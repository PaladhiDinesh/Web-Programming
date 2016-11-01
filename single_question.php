<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
<?php 
	if (isset($_POST['submit'])){
		$newquestion = $_GET['ques_id'];
		$summernote = $_POST['summernote'];
		$summernote = mysqli_real_escape_string($connection,$summernote);
		$query = "INSERT INTO answers_table(question_id, user_id, answer) VALUES ('$newquestion','$USERID','$summernote')";
		$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
		if($result) {
			header('Location:single_question.php?ques_id='.$newquestion);
		}
	}
	$query = "SELECT questions_table.user_id,title,admin,content,questions_table.created_at,ques_votecount FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id WHERE question_id=".$_GET['ques_id'];
	$answerquery= "SELECT answer_id,admin,answer,answers_table.created_at,marks,ans_votecount from answers_table JOIN login_details ON login_details.user_id=answers_table.user_id WHERE question_id=".$_GET['ques_id']." ORDER BY marks DESC,ans_votecount DESC";
	$quesvotequery = "SELECT votes from votes_table WHERE question_id =".$_GET['ques_id']." and user_id=$USERID";
	$que_vote_result = mysqli_query($connection,$quesvotequery) or die("Failed to query database");
	$que_vote_row = mysqli_fetch_array($que_vote_result,MYSQLI_ASSOC);

	
	$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
	$new=$result->num_rows;
	if ($new==0){
		header('Location:404error.php');
	}
	$answerresult = mysqli_query($connection,$answerquery) or die("Failed to query database".mysql_error());
?>	
<div class="container">
	<?php
	 	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$user_id = $row['user_id']; 
	?> <p class="lead"><h3> 
	<?php
		echo htmlentities($row['title'])."<br />"; 
	?></p></h3><hr/>
	<?php

	?> 
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-1">
				<?php if($que_vote_row['votes']==1 ) { ?>
				<div class="row ques_likes_container">
					<i class="ques_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #006400 ;cursor: pointer;"></i></div>
						<div class="row">
					<p><h4><b id="ques_likes_count"><?php echo $row['ques_votecount']  ?> </b></h4></p>
				</div>
				<div class="row ques_likes_container">
					<i class="ques_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
					<?php 
					}
					else if($que_vote_row['votes']==0 )
					{
						?>
					<div class="row ques_likes_container">
					<i class="ques_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
						<div class="row">
					<p><h4><b id="ques_likes_count"><?php echo $row['ques_votecount']  ?> </b></h4></p>
				</div>
				<div class="row ques_likes_container">
					<i class="ques_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
					<?php
					
					}
					else{
						?>
						<div class="row ques_likes_container">
					<i class="ques_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
						<div class="row">
					<p><h4><b id="ques_likes_count"><?php echo $row['ques_votecount']  ?> </b></h4></p>
				</div>
				<div class="row ques_likes_container">
					<i class="ques_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #FF0000 ;cursor: pointer;"></i></div>
						
						<?php
					}
					?>
			
			<!-- 	<div class="row ques_likes_container">
					<i class="ques_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div> -->
			</div>
			<div class="col-md-8">
				<?php
					echo $row['content']."<br />";
				?></div>
				<div class="col-md-3">
					<p>
						 <img width="20" height="20" src="images/<?php echo $row['admin']?>" onerror="this.src='images/default.png';" >
		<b><?php echo "Asked by ".htmlentities($row['admin'])." on ".htmlentities($row['created_at'])."<br />"
			?> 
		</b>
					
						</b>
					</p>
				</div>
		</div>
	</div>

	
	<h4> Answers </h4><hr/>

	<?php
		while ($row1 = mysqli_fetch_array($answerresult,MYSQLI_ASSOC)) {
			//echo $row1['answer_id'];
			$ansvotequery = "SELECT votes from votes_table WHERE answer_id =".$row1['answer_id']." and user_id=$USERID and question_id =".$_GET['ques_id'];
			$ans_vote_result = mysqli_query($connection,$ansvotequery) or die("Failed to query database");
			$ans_vote_row = mysqli_fetch_array($ans_vote_result,MYSQLI_ASSOC);
			//echo $ans_vote_row['votes'],"hi",$row1['answer_id'];
			?>
			<div class='row'>
				<div class="col-md-12"> 
				<?php 
					if ($USERID != "undefined"){
				?>
					<div class="col-md-1 mark_container">
							<?php if($ans_vote_row['votes']==1 ) { ?>

								<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #006400 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>	
							<?php 
						}else if ($ans_vote_row['votes']==0){?>
								<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>	
							<?php }else{ ?>
							<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #FF0000 ;cursor: pointer;"></i></div>	
									<?php

							}

							?>
									
					<?php
					}
					if ($user_id==$USERID){
						if($row1['marks']==1) {
							?>
							<div class="row ">	
								
								<div class="row ">		
									<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400 ;cursor: pointer"></i></div>
							</div>
							<?php 
						}else{ 
							?>
							<div class="row ">	
								<div class="row ">
									<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #D3D3D3; cursor:pointer"></i></div>
							</div>
							<?php 
						}
					}else{
						if($row1['marks']==1){
							?> 	
							<div class="row ">	
								<div class="row ">
									<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400"></i>
								</div>
							</div>

							<?php 
						}
						}
						?>
					</div> 
					<input class="answer_id" type="hidden" value=<?php echo $row1['answer_id']?>>
					<div class="col-md-8">
						<?php
							echo $row1['answer']."<br />";


						?>
					</div>
					<div class="col-md-3">
						<p>
					<img width="25" height="25" src="images/<?php echo $row1['admin']?>"
		                onerror="this.src='images/default.png';" >
						<b><?php echo "Answered by ".htmlentities($row1['admin']). " on ".htmlentities($row1['created_at']);	

							?>
							</b>
						</p>
					</div>
	</div>
			</div>
			<hr/>
	<?php
		}
	?>
	<form class="form col-md-offset-1 col-md-6" method="post">
		<h4><p>Your Answer</p></h4>
		<textarea id="summernote" name="summernote" required>Post your Answer here</textarea>
		<?php 
		if ($USERID != "undefined"){
			?>
			<div>
    			<button  id = "single_submit" type="submit" name="submit" class="btn btn-dinesh">Post your Answer</button>
    		</div>
			<?php 
		}
 		else{
 			?>
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
				console.log($(_this).parents('.mark_container').siblings('.answer_id').val());
    			var color = ($(this).css('color') == 'rgb(211, 211, 211)') ? '#006400'	: '#D3D3D3';
	    		$.post('markajax.php', {'ans_id': $(_this).parents('.mark_container').siblings('.answer_id').val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $user_id;?>}, function(response) {
	    			if(response) {
		    			$('.correct_ans').css('color', '#D3D3D3');
	    				$(_this).css('color', color);	    				
	    			}
	    			else {
	    			}
	    		});			
    		}
    	});
		$('.ans_votes_count_up').click(function(){
			var user_id = <?php echo $USERID;?>;
				var _this=this;
				console.log($(_this).parents('.mark_container').siblings('.answer_id').val());
				console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').val());
				$.post('ans_voteajax.php', {'ans_id': $(_this).parents('.mark_container').siblings('.answer_id').val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':1}, function(response) {
	    			response = $.trim(response);	
    			if(response != 'false') {
	    			$(_this).css('color', 'green');
	    			var votes_value = parseInt($('#ans_likes_count').text()) + 1;
	    			$('#ans_likes_count').text(votes_value);
    			}
	    			else {
	    			}
			});
				
		});


	$(".ques_votes_count_up").click(function(){
		var user_id = <?php echo $USERID;?>;
			var _this=this;
			$.post('ques_voteajax.php', {'ans_id':0,'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':1}, function(response) {
    			response = $.trim(response);	
    			if(response != 'false') {
    				$('.ques_votes_count_down').css('color', '#D3D3D3');
	    			$(_this).css('color', 'green');
	    			var votes_value = parseInt($('#ques_likes_count').text()) + 1;
	    			$('#ques_likes_count').text(votes_value);
    			}
    			else {
    			}
		});
			
	});

		$('.ans_votes_count_down').click(function(){
			var user_id = <?php echo $USERID;?>;
				var _this=this;
				console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').val());
				$.post('ans_voteajax.php', {'ans_id': $(_this).parents('.mark_container').siblings('.answer_id').val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':-1}, function(response) {
	    			response = $.trim(response);	
    			if(response != 'false') {
	    			$(_this).css('color', 'red');
	    			var votes_value = parseInt($('#ans_likes_count').text()) - 1;
	    			$('#ans_likes_count').text(votes_value);
    			}
	    			else {
	    			}
			});
				
		});


	$(".ques_votes_count_down").click(function(){
		var user_id = <?php echo $USERID;?>;
			var _this=this;
			$.post('ques_voteajax.php', {'ans_id':0,'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':-1}, function(response) {
				response = $.trim(response);	
    			if(response != 'false') {
    				$('.ques_votes_count_up').css('color', '#D3D3D3');
    				$(_this).css('color', 'red');
    				var votes_value = parseInt($('#ques_likes_count').text()) - 1;
	    			$('#ques_likes_count').text(votes_value);	    				
    			}
    			else {
    			}
		});
			
	});
	$('#summernote').summernote({
		  	height: 200,                 // set editor height
 			minHeight: 100,             // set minimum height of editor
 			maxHeight: 300,             // set maximum height of editor
  			width: 700
		});
	});
</script>
<?php include "footer.php"; ?>	
