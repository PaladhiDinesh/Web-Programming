<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<?php
	if ($USERID != "undefined"){
		if (isset($_POST['submit'])){
			$title = $_POST['title'];
			$tags = $_POST['tags'];
			$summernote = trim($_POST['summernote']);
			$title = mysqli_real_escape_string($connection,$title);
			$tags = mysqli_real_escape_string($connection,$tags);
			$summernote = mysqli_real_escape_string($connection,$summernote);
			$query = "INSERT INTO questions_table(user_id,title,content,tags) VALUES ('$USERID','$title','$summernote','$tags')";
			$result = mysqli_query($connection,$query)or die("Failed to query database".mysql_error());
			if($result){
				$last_id = mysqli_insert_id($connection);
				header('Location:single_question.php?ques_id='.$last_id	);
			}
			mysqli_close($connection);
		}
?>
<div class="container">
	<div class="row">
 		<div class="col-md-offset-1 col-md-6">
			<h3>Ask Your Question</h3><hr/>
			<form class="form col-md-12 center-block" method="post">
    			<div class="form-group">
        			<input type="text" id="title" name='title' class="form-control input-lg" placeholder="Title" required />
    			</div>
    			<textarea id="summernote" name="summernote" required>Post your question here</textarea>    		
    			<div class="col-md-3">
        			<input type="text" id="tags" name='tags'  class="form-control" placeholder="Tags" required />
    			</div>
   				<?php 
   				if ($USERID != "undefined"){?>
					<div>
    					<button  id = "single_submit" type="submit" name="submit" class="btn btn-dinesh">Post your Question</button>
    				</div>
				<?php }
 				else{?>
					<div>
 						<button  id = "single_submit" type="submit" class="btn btn-dinesh" disabled >Post your Question</button>
 						<h3>Please Login to ask a Question</h3>
 	    			</div>
 				<?php }
	}
	else{
		header('Location:login.php');
	}?>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#summernote').summernote({
  			height: 200,                 // set editor height
  			minHeight: 100,             // set minimum height of editor
  			maxHeight: 300,             // set maximum height of editor
  			focus: true                // set focus to editable area after initializing summernote
		});
    });
</script>
<?php include "footer.php"; ?>	