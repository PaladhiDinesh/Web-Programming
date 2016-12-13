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
	$query = "SELECT questions_table.user_id,title,admin,checkgit,emailid,tags,content,questions_table.created_at,ques_votecount,freeze FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id WHERE question_id=".$_GET['ques_id'];
	// print_r($query);
	$answerquery= "SELECT answer_id,admin,answer,answers_table.created_at,marks,ans_votecount from answers_table JOIN login_details ON login_details.user_id=answers_table.user_id WHERE question_id='".$_GET['ques_id']."' ORDER BY marks DESC,ans_votecount DESC";

	$answerresult = mysqli_query($connection,$answerquery) or die("Failed to query database56".mysql_error());
	// print_r($answerquery);
	$count=$answerresult->num_rows;
	$totalpages=ceil($count/5);	
		if ($totalpages==0){
			$totalpages=1;
		}

	// echo $totalpages;
		if (!isset($_GET['page'])){
			$_GET['page']=0;
		}
		else{
			$_GET['page']=(int)$_GET['page'];
		}

		if($_GET['page']<1){
			$_GET['page']=1;
		}
		elseif ($_GET['page'] > $totalpages) {
			$_GET['page']=$totalpages;
		}


	$startArticle = ($_GET['page'] - 1) * 5;

	$pagination= "SELECT answers_table.user_id as a_user,answer_id,admin,checkgit,emailid,answer,answers_table.created_at,marks,ans_votecount from answers_table JOIN login_details ON login_details.user_id=answers_table.user_id WHERE question_id='".$_GET['ques_id']."' ORDER BY marks DESC,ans_votecount DESC limit ".$startArticle.','.'5';
	$page_result = mysqli_query($connection,$pagination) or die ("Failed to query database12".mysql_error());

   


	$quesvotequery = "SELECT votes from votes_table WHERE answer_id=0 and question_id ='".$_GET['ques_id']."'";
	$que_vote_result = mysqli_query($connection,$quesvotequery) or die("Failed to query database34".mysql_error());
	$que_vote_row = mysqli_fetch_array($que_vote_result,MYSQLI_ASSOC);

	
	$result = mysqli_query($connection,$query) or die("Failed to query database8".mysql_error());
	$new=$result->num_rows;
	if ($new==0){
		header('Location:404error.php');
	}

	
                         function bbc2html($content) {
              $search = array (
                '/(\[b\])(.*?)(\[\/b\])/',
                '/(\[i\])(.*?)(\[\/i\])/',
                '/(\[u\])(.*?)(\[\/u\])/',
                '/(\[ul\])(.*?)(\[\/ul\])/',
                '/(\[li\])(.*?)(\[\/li\])/',
                '/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
                '/(\[url\])(.*?)(\[\/url\])/'
              );

              $replace = array (
                '<strong>$2</strong>',
                '<em>$2</em>',
                '<u>$2</u>',
                '<ul>$2</ul>',
                '<li>$2</li>',
                '<a href="$2" target="_blank">$4</a>',
                '<a href="$2" target="_blank">$2</a>'
              );

              return preg_replace($search, $replace, $content);
            }
	
?>	
<div class="container">
<?php
 
 if ($useradmin==1){
 	?>
 	<div class="row">
 	<br>
 	</div>
 	<div class="row">
 	  <div class="col-md-2">
  <form action="main_home.php" method="post">
    <button type="submit" class="btn btn-danger">Top Questions</button>
  </form>
  </div>
<div class="col-md-2">
 <form action="questions_panel.php" method="post">
 <button type="submit" class="btn btn-success">Questions Panel</button>
 </form>
 </div>
 <div class="col-md-2">
  <form action="users_page.php?page=1" method="post">
  <button type="submit" class="btn btn-info">Users Panel</button>
  </form>
  </div>

 
</div>



 	<?php


 }
?>
	<?php
	 	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$user_id = $row['user_id']; 
	?> <p class="lead"><h3> 
	<?php
	if ($row['freeze']==1){
		?> <center><font color ="red">This Question is freezed</font></center><?php


	}
		echo htmlentities($row['title'])."<br />"; 
	?></p></h3><hr/>
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
				<div class="row">
				<?php
					echo $row['content']."<br />";
				?>
					</div>
				<div class="row">
			<h4>Tags : <?php
					$onetag=explode(" ",$row['tags']);
					foreach ($onetag as $value) {?>
						<a href="tagspage.php?name=<?php echo $value;?>">
						<?php
					 echo "$value";?> </a><?php
					}
						///echo $row['tags']."<br />";
				?></h4>
				</div>
				</div>
				<div class="col-md-3">
					<p>
						<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>">
						<?php
             
              
              if($row["checkgit"]==1)
              { 
                echo "<img width='25' height='25' alt='abc' src='https://github.com/".$row['admin'].".png' />";
                
              }
              else
              {
                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $row['emailid'] ) ) ) . "?d=" . urlencode( 'https://s24.postimg.org/a4bwqzpgl/default.png' );
              $source = "./images/".$row['admin'];
              $source = trim($source);
              if(file_exists($source))
              { 
                 ?>
                  <img width='25' height='25' alt='abc' src='./images/<?php echo $row['admin']; ?>' />
                <?php
              }
              else
              {
                 ?>
                  <img width='25' height='25' alt='abc' src='<?php echo $grav_url; ?>' / >
                <?php
              }
              }
              ?>
						</a>
						<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>&page=1"> <?php echo htmlentities($row['admin']) ?></a>
						<?php 
						echo '(',scores($row['user_id']),')'," on ".htmlentities($row['created_at'])."<br />"?> 
						</b>
					</p>
				</div>
		</div>
	</div>	
	<h4> Answers </h4>

	<hr/>

	<?php

		while ($row1 = mysqli_fetch_array($page_result,MYSQLI_ASSOC)) {

			//echo $row1['answer_id'];
			$ansvotequery = "SELECT votes from votes_table WHERE answer_id =".$row1['answer_id']." and question_id ='".$_GET['ques_id']."'";
			$ans_vote_result = mysqli_query($connection,$ansvotequery) or die("Failed to query database hi");
			$ans_vote_row = mysqli_fetch_array($ans_vote_result,MYSQLI_ASSOC);

			//echo $ans_vote_row['votes'],"hi",$row1['answer_id'];
			?>
			<div class='row'>
				<div class="col-md-12"> 
					<div class="col-md-1 mark_container">
						<?php
					
					if ($user_id==$USERID){

						if($row1['marks']==1) {
							if ($row['freeze']==1){
							?>
							
									<i class="fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400 ;cursor: pointer"></i>
							<?php 
						}
						else
						{  ?>
							<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400 ;cursor: pointer"></i>

							<?php

						}
						}else{ 
							if ($row['freeze']==0){
							?>
						
									<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #D3D3D3; cursor:pointer"></i>
						
							<?php 
						}
						}
					}else{
						if($row1['marks']==1){
							?> 	
							
									<i class="correct_ans fa fa-check" aria-hidden="true" style = "font-size: 30px;color : #006400"></i>
								
				

							<?php 
						}
						}

						?>


							<?php if($ans_vote_row['votes']==1 ) { ?>

								<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #006400 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b id="ans_likes_count"><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>	
							<?php 
						}else if ($ans_vote_row['votes']==0){?>
								<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b id="ans_likes_count"><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>	
							<?php }else{ ?>
							<div class="row ans_like_container" >								
									<i class="ans_votes_count_up fa fa-thumbs-o-up" aria-hidden="true" style="font-size: 30px;color : #D3D3D3 ;cursor: pointer;"></i></div>
									<div class="row ans_vote_value">
										<p><h4><b id="ans_likes_count"><?php echo $row1['ans_votecount'] ?> </b></h4></p>
									</div>
								<div class ="row ans_like_container">
									<i class="ans_votes_count_down fa fa-thumbs-o-down" aria-hidden="true" style="font-size: 30px;color : #FF0000 ;cursor: pointer;"></i></div>	
									<?php

							}
							?> </div> <?php

							?>
									
					
					
					<input class="answer_id" type="hidden" value=<?php echo $row1['answer_id']?>>
					<div class="col-md-8">
						<?php
            echo bbc2html($row1['answer'])."<br />";
						?>
					</div>
					<div class="col-md-2">
						<p>
				

								<a href="ProfilePage.php?name=<?php echo trim($row1['admin']);?>">
						<?php
             
              
              if($row["checkgit"]==1)
              { 
                echo "<img width='25' height='25' alt='abc' src='https://github.com/".$row1['admin'].".png' />";
                
              }
              else
              {
                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $row1['emailid'] ) ) ) . "?d=" . urlencode( 'https://s24.postimg.org/a4bwqzpgl/default.png' );
              $source = "./images/".$row1['admin'];
              $source = trim($source);
              if(file_exists($source))
              { 
                 ?>
                  <img width='25' height='25' alt='abc' src='./images/<?php echo $row1['admin']; ?>' />
                <?php
              }
              else
              {
                 ?>
                  <img width='25' height='25' alt='abc' src='<?php echo $grav_url; ?>' / >
                <?php
              }
              }
              ?>
						</a>
						<b><?php echo "Answered by ";?><a href="ProfilePage.php?name=<?php echo trim($row1['admin']);?>&page=1"> <?php echo htmlentities($row1['admin']) ?>
							
						</a>
						<?php 
						echo '(',scores($row1['a_user']),')'," on ".htmlentities($row1['created_at'])."<br />"?> 
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
	<?php 
	echo $row['freeze'];
	if ($row['freeze']==0){

	?>
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
}
 		?> 
					<center><ul class="pagination">
					<?php
					foreach (range(1,$totalpages) as $page){
						// echo $page;
						// echo "hi";
						if($page == $_GET['page']){
        					echo '<li><a class="active"><span class="currentpage">' . $page . '</span></a></li>';
        					// echo  "current";
    					}else if($page ==1 || $page ==$totalpages ||($page >= $_GET['page'] -2 && $page <= $_GET['page']+2)){
							 echo '<li><a href="?ques_id='.$_GET['ques_id'].'&page=' . $page . '">' . $page . '</a></li>'; 
						}
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
			if(user_id != undefined){
				var _this=this;
				// console.log($(_this).parents('.mark_container').siblings('.answer_id').val());
				// console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').val());
				// console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').children('h4').children('#ans_likes_count').html);
				$.post('ans_voteajax.php', {'ans_id': $(_this).parents('.mark_container').siblings('.answer_id').val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':1}, function(response) {
	    			response = $.trim(response);	
    			if(response == 'false') {
	    			
	    			// var votes_value = parseInt($('#ans_likes_count').text()) + 1;
	    			// $('#ans_likes_count').text(votes_value);
    			}
	    			else {
	    				// console.log(response);
	    				// console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').children('.ans_likes_count').val())
	    				$(_this).parents('.ans_like_container').siblings('.ans_vote_value').children('h4').children('#ans_likes_count').text(response);
	    				// $($(_this).parents('.ans_like_container').siblings('.ans_vote_value').children('.ans_likes_count').text(response);s
	    				// $('#ans_likes_count').text(response);
	    				$(_this).css('color', 'green');

	    			}
				});
			}
		});


	$(".ques_votes_count_up").click(function(){
		var user_id = <?php echo $USERID;?>;
		// console.log(user_id);
		if(user_id !== undefined ){
			// console.log("hello");
			var _this=this;
			$.post('ques_voteajax.php', {'ans_id':0,'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':1}, function(response) {
    			response = $.trim(response);
    			console.log(response);	
    			if(response == 'false') {

	    			
	    			// var votes_value = parseInt($('#ques_likes_count').text()) + 1;
	    			
	    			
    			}
    			else {
    				$('.ques_votes_count_down').css('color', '#D3D3D3');
	    			$(_this).css('color', 'green');
    				console.log(response);
    				$('#ques_likes_count').text(response);
    				
    			}
		});
		}
			
	});

		$('.ans_votes_count_down').click(function(){
			var user_id = <?php echo $USERID;?>;
			if(user_id != undefined){
				var _this=this;
				console.log($(_this).parents('.ans_like_container').siblings('.ans_vote_value').val());
				$.post('ans_voteajax.php', {'ans_id': $(_this).parents('.mark_container').siblings('.answer_id').val(),'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':-1}, function(response) {
	    			response = $.trim(response);	
    			if(response == 'false') {
	    			
	    			// var votes_value = parseInt($('#ans_likes_count').text()) - 1;
	    			// $('#ans_likes_count').text(votes_value);

    			}
	    			else {
	    				// console.log(response);
	    				// console.log(response);
	    				$(_this).parents('.ans_like_container').siblings('.ans_vote_value').children('h4').children('#ans_likes_count').text(response);
	    				// $('#ans_likes_count').text(response);
	    				$(_this).css('color', 'red');
	    			}
				});
			}	
		});


	$(".ques_votes_count_down").click(function(){
		var user_id = <?php echo $USERID;?>;
		if(user_id != undefined){
			var _this=this;
			$.post('ques_voteajax.php', {'ans_id':0,'ques_id':<?php echo $_GET['ques_id'];?>,'user_id':<?php echo $USERID;?>,'vote_value':-1}, function(response) {
				response = $.trim(response);	
    			if(response == 'false') {

    				console.log(response);
    				
    				// var votes_value = parseInt($('#ques_likes_count').text()) - 1;
	    			// $('#ques_likes_count').text(votes_value);	    				
    			}
    			else {
    				$('.ques_votes_count_up').css('color', '#D3D3D3');
    				$(_this).css('color', 'red');
    				$('#ques_likes_count').text(response);
    				console.log(response);
    				
    			}
			});
		}
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
