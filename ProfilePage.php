<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<h1 align="center">
Welcome to Answers Kart</h1>
<div class="container">
	<div class="row">
		<div class="col-md-6">
		<form method="post" enctype="multipart/form-data">
		<img width="50" height="50" src="images/<?php echo $_SESSION['login_name']?>"
		onerror="this.src='images/default.png';" >
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
			<?php
				if ($USERID != "undefined"){

/*<img src="programming.gif" alt="userName" style="width:48px;height:48px;">*/
					if(isset($_POST["submit"])) {
					$target_dir = "images/";	
					//$path=$_FILES["fileToUpload"]["name"];
					//$imageFileType = pathinfo($path,PATHINFO_EXTENSION);
$target_file = $target_dir . basename($_SESSION['login_name']);
//$uploadOk = 1;


// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else { */
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
 	
    }
}
	$query = "SELECT title,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id='$USERID' ORDER BY question_id DESC";
					$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());

					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$question_id=htmlentities($row['question_id']);
						?><p>
						<a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a>
						</p>
						<img width="25" height="25" src="images/<?php echo $row['admin']?>"
		                onerror="this.src='images/default.png';" >
						<?php
		 				echo "Asked by ".htmlentities($row['admin'])." on ".htmlentities($row['created_at'])."<br />";
				
		 				?><hr/>
						<?php
					}
				}
				else{
					header('Location:login.php');
				}
						?>

		</div>
	</div>
</div>
<?php include "footer.php"; ?>