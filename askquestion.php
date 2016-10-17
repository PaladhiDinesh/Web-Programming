<?php include "header.php"; ?>
<?php include "scripts.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ANSWERSKART- Login Page</title>
</head>
<body>	
<div class="container">
<div class="row">
 <div class="col-md-offset-3 col-md-6">
		<h2>ANSWERSKART</h2><hr/>

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
    <div>
    	<button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
</div>
</div>
</div>
</body>
</html>