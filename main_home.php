<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<h1 align="center">Welcome to Answers Kart</h1>
<div class="container">
<?php
 if ($useradmin==1){
 	?>
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
			<h2>Top Questions</h2><hr/>
			<?php 
				$query = "SELECT questions_table.user_id as quser,title,tags,admin,checkgit,emailid,questions_table.created_at,question_id,ques_votecount FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id ORDER BY ques_votecount DESC limit 5";
				$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());

				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
					$question_id=htmlentities($row['question_id']);
			?>
			<div class="row">
				<div class="col-md-8">
		
					<h3><p><a href='single_question.php?ques_id=<?php echo $question_id; ?>&page=1'><?php echo htmlentities($row['title']);?></a></p></h3>
				<h4>Tags:
				 <?php
					$onetag=explode(" ",$row['tags']);
					foreach ($onetag as $value) {?>
						<a href="tagspage.php?name=<?php echo $value;?>">
						<?php
					 echo "$value";?> </a><?php
					}
						///echo $row['tags']."<br />";
				?>


				</h4>
				</div>
				<div class="col-md-4">
				<p>
						<a href="ProfilePage.php?name=<?php echo trim($row['admin']);?>&page=1">
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
						echo '(',scores($row['quser']),')'," on ".htmlentities($row['created_at'])."<br />"?> 
						</b>
					</p>
				</div>
				<div class="col-md-12">
				<hr/>
				</div>
			</div>

					

				<?php }?>

		
				<?php include "footer.php"; ?>

		</div>
	</div>
</div>
