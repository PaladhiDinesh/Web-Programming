<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>

<h1 align="center">
Welcome to Answers Kart</h1><hr/>
		<h2 align="center">
		<?php
		echo $_GET['name'] 
		?>
		Profile Page
			
		</h2>
		<?php 
$namequery = "SELECT user_id from login_details where admin ='".$_GET['name']."'";
	$nameresult = mysqli_query($connection,$namequery) or die("Failed to query database 123".mysql_error());
	$row1 = mysqli_fetch_array($nameresult,MYSQLI_ASSOC);
	$dummy = $row1['user_id'];

	$query = "SELECT title,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id='".$dummy."'";
					$result = mysqli_query($connection,$query) or die(" to query database".mysql_error());
	
		?>s

<div class="container">
	<div class="row">
		<div class="col-md-12">

		<form method="post" enctype="multipart/form-data" align="center">
		<?php
		if ($USERID == $dummy){ ?>
		<h4>Upload a Profile Picture</h4>
		<?php } ?>
		<img width="200" height="200" src="images/<?php echo $_GET['name']?>"
		onerror="this.src='images/default.png';" >
		<?php
	if ($USERID == $dummy){ ?>
    <center><input type="file" name="fileToUpload" id="fileToUpload"></center>
    <input type="submit" value="Upload Image" name="submit"> 
    <?php } ?>
</form>
<h3>Questions Asked by <?php echo $_GET['name']  ?> </h3><hr/>
			<?php

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


	

					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$question_id=htmlentities($row['question_id']);
						?>
						<div class="row">
						<div class="col-md-6">
							<p>
								<a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a>
							</p>
						</div>
						<div class="col-md-6">
							<p>
								<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>">
									<img width="25" height="25" src="images/<?php echo $row['admin']?>" onerror="this.src='images/default.png';" >
								</a>
								<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>"> <?php echo htmlentities($row['admin']) ?></a>
									<?php 
										echo " on ".htmlentities($row['created_at'])."<br />"?> 
								</b>
							</p>
						</div>
						<div class="col-md-12">
							<div class="row"><hr/></div>
						</div>
					</div>
		 				
						<?php
					}
		
						?>

		</div>
	</div>
</div>
<?php include "footer.php"; ?>