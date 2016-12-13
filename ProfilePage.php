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
	$namequery = "SELECT user_id,emailid,admin,checkgit from login_details where admin ='".$_GET['name']."'";
	$nameresult = mysqli_query($connection,$namequery) or die("Failed to query database 123".mysql_error());
	$new=$nameresult->num_rows;
	if ($new==0){
		header('Location:404error.php');
	}
	
	$row1 = mysqli_fetch_array($nameresult,MYSQLI_ASSOC);

	$dummy = $row1['user_id'];

	$query = "SELECT questions_table.user_id as quser,title,tags,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id=".$dummy;
					$result = mysqli_query($connection,$query) or die(" falied to query database".mysql_error());
					$count=$result->num_rows;
					$totalpages=ceil($count/5);	
				// echo $totalpages;
					if ($totalpages==0){
						$totalpages=1;
					}
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
	$paginationquery = "SELECT questions_table.user_id as quser,title,tags,admin,question_id,questions_table.created_at,question_id FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id where questions_table.user_id='".$dummy."'limit ".$startArticle.','.'5';
		$page_result = mysqli_query($connection,$paginationquery) or die ("Failed to query database".mysql_error());
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
	<div class="row">
		<div class="col-md-12">

		<form method="post" enctype="multipart/form-data" align="center">
		<?php
		if ($USERID == $dummy){ ?>
		<h4>Upload a Profile Picture</h4>
		<?php } ?>
		
            <?php
            
              
              if($row1["checkgit"]==1)
              {
            
                echo "<img width='180' height='220' alt='abc' src='https://github.com/".$row1['admin'].".png' />";
                  
              }
              else
              {
                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $row1['emailid'] ) ) ) . "?d=" . urlencode( 'https://s24.postimg.org/a4bwqzpgl/default.png' );
                  $source = "./images/".$row1['admin'];
                  $source = trim($source);
                  if(file_exists($source))
                  {
                     ?>
                      <img width='180' height='220' alt='abc' src='images/<?php echo $row1['admin']; ?>' />
                    <?php
                  }
                  else
                  {
                     ?>
                      <img width='180' height='220' alt='abc' src='<?php echo $grav_url; ?>' / >
                    <?php
                  }  
              }
              ?>
		<?php
	if ($USERID == $dummy){ ?>
    <center><input type="file" name="fileToUpload" id="fileToUpload"></center>
    <input type="submit" value="Upload Image" name="submit"> 
    			<a href="./delete_pic.php">    <input type="button" value="Delete picture"> 
 </a>

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
?>

<?php
	

					while ($row = mysqli_fetch_array($page_result,MYSQLI_ASSOC)) {
						$question_id=htmlentities($row['question_id']);
						?>
						<div class="row">
						<div class="col-md-8">
							<p>
								<h3><a href='single_question.php?ques_id=<?php echo $question_id; ?>'><?php echo htmlentities($row['title']);?></a></h3>
								<h4>Tags:
				 <?php
				 	$newpagevalue=$row['admin'];
					$onetag=explode(" ",$row['tags']);
					foreach ($onetag as $value) {?>
						<a href="tagspage.php?name=<?php echo $value;?>">
						<?php
					 echo "$value";?> </a><?php
					}
						///echo $row['tags']."<br />";
				?>


				</h4>
							</p>
						</div>
						<div class="col-md-4">
							<p>

								<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>&page=1">
									<?php
             
              
              if($row1["checkgit"]==1)
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
								<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>&page=1"> <?php echo htmlentities($row['admin']) ?></a>
									<?php 
										echo '(',scores($row['quser']),')'," on ".htmlentities($row['created_at'])."<br />"?> 

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
							<center><ul class="pagination">
					<?php
						// echo $row['admin'];
					foreach (range(1,$totalpages) as $page){
							// echo $page;
							// echo "hi";
						if($page == $_GET['page']){
        					echo '<li><a class="active"><span class="currentpage">' . $page . '</span></a></li>';
        					// echo  "current";
    					}else if($page ==1 || $page ==$totalpages ||($page >= $_GET['page'] -2 && $page <= $_GET['page']+2)){

							 echo '<li><a href="?name='. $newpagevalue . '&page=' . $page . '">' . $page . '</a></li>'; 
						}
					}
					?>

		</div>
	</div>
</div>
<?php include "footer.php"; ?>