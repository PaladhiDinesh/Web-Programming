<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	

			<div class="container">
<div class="row">
 <div class="col-md-offset-1 col-md-6">
		<h3>Ask Your Question</h3><hr/>

<form>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Title">
    </div>
    <div id="summernote"><p>Post your question here</p></div>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
  height: 200,                 // set editor height
  minHeight: 100,             // set minimum height of editor
  maxHeight: 300,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
    });
    </script>
    <div class="col-lg-4">
        <input type="text" class="form-control" placeholder="Tags">
    </div>
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
 		<h3>Please Login to ask a Question</h3>
 	    </div>
 	<?php
 }
?>

</form>
</div>
</div>
</div>




<?php include "footer.php"; ?>	