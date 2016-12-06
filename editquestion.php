<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>

<div class="container">
<?php
 if ($useradmin==1){
 	$getdata="SELECT title,content,tags from questions_table WHERE question_id=".$_GET['ques_id'];
 	$getresult = mysqli_query($connection,$getdata)or die("Failed to query database".mysql_error());
 		$new=$getresult->num_rows;
	if ($new==0){
		header('Location:404error.php');
	}
 	$getrow = mysqli_fetch_array($getresult,MYSQLI_ASSOC);
 	// echo $getrow['title'],$getrow['content'];
 	$title = $getrow['title'];
 	$tags = $getrow['tags'];
	$summernote = trim($getrow['content']);
	$title = mysqli_real_escape_string($connection,$title);
	$summernote = mysqli_real_escape_string($connection,$summernote);
	$tags = mysqli_real_escape_string($connection,$tags);

if (isset($_POST['update']))
{
		$title = $_POST['title'];
		$tags = $_POST['tags'];
			$summernote = trim($_POST['summernote']);
			$title = mysqli_real_escape_string($connection,$title);
			$summernote = mysqli_real_escape_string($connection,$summernote);
			$tags = mysqli_real_escape_string($connection,$tags);
$updateques="UPDATE questions_table SET title = '".$title."' ,content='".$summernote."',tags='".$tags."' WHERE question_id=".$_GET['ques_id'];
$getupdate = mysqli_query($connection,$updateques)or die("Failed to query database".mysql_error());

// $pagerow = mysqli_fetch_array($getupdate,MYSQLI_ASSOC);
// print $getupdate;	
// echo $pagerow;
if ($getupdate)
{
	echo "Record updated";
	//header('Location:single_question.php?ques_id='.$_GET['ques_id']);
}
}
// mysqli_close($connection);
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
else
{
	 header('Location: 404error.php');
}
?>
	<div class="row">
 		<div class="col-md-offset-1 col-md-6">
			<h3>Edit Your Question</h3><hr/>
			<form class="form col-md-12 center-block" method="post">
    			<div class="form-group">
        			<input type="text" id="title" name='title' class="form-control input-lg" value="<?php echo $title; ?>" required />
    			</div>
    			<textarea id="summernote" name="summernote" required><?php echo $summernote ?></textarea>    		
					<div>
				<div class="form-group">
    				<input type="text" id="tags" name='tags' class="form-control input-lg" value="<?php echo $tags; ?>"	 required />
    			</div>
    					<button  id = "single_submit" type="submit" name="update" class="btn btn-dinesh" >Update Question</button>
    				</div>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('#summernote').summernote({
  			height: 300,
  			width: 900,                 // set editor height
  			minHeight: 100,             // set minimum height of editor
  			maxHeight: 600,             // set maximum height of editor
  			focus: true                    // set focus to editable area after initializing summernote
		});
    });
</script>
<?php include "footer.php"; ?>	