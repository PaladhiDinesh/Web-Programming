<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>

<?php
 
 if ($useradmin==1){


 	?>
 	<h2 align="center">Questions Panel</h2>
<div class="container">
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

	<div class="row">
		<div class="col-md-12">
		  <hr/>
		  <?php
		  // if (isset($_POST['Freeze'])){

		  // 	echo "Freeed";

		  // }




		  ?>
			<?php 
				
				$query = "SELECT title,admin,questions_table.created_at,question_id,freeze FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id ORDER BY question_id DESC";
				$result = mysqli_query($connection,$query) or die("Failed to query database12".mysql_error());
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
				$pagination= "SELECT questions_table.user_id as quser,title,admin,questions_table.created_at,question_id,freeze FROM questions_table JOIN login_details ON login_details.user_id=questions_table.user_id ORDER BY question_id DESC limit ".$startArticle.','.'5';
				$page_result = mysqli_query($connection,$pagination) or die ("Failed to query database".mysql_error());

				
				// echo $count;
				// $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				while ($pagerow = mysqli_fetch_array($page_result,MYSQLI_ASSOC)) { 
					$question_id=htmlentities($pagerow['question_id']);
			?>	

			<div class="row">
				<div class="col-md-1">
				    <form action="delete.php" method="post">
                    <input type="hidden" value="<?php echo $question_id?>" name="questionid">
				    <button type="submit" value="Delete" class="btn btn-danger">Delete</button>
				    </form>
				    </div>
				    <div class="col-md-1">

				     <form action="editquestion.php?ques_id=<?php echo $question_id?>" method="post">
  						<button type="submit" class="btn btn-success">  Edit    </button>
				    </form>
				    </div>

				    <?php
				    if ($pagerow['freeze']==0)
				    {
				    ?>
				    <div class="col-md-1">
				    <form action="freeze.php?ques_id=<?php echo $question_id?>" method="post">
  							<button type="submit" class="btn btn-primary" name ="Freeze">Freeze</button>
				    </form>
				    </div>
				    <?php
				}
				else{
					?>
					  <div class="col-md-1">
				    <form action="freeze.php?ques_id=<?php echo $question_id?>" method="post">
  							<button type="submit" class="btn btn-info" name ="Freeze">UnFreeze</button>
				    </form>
				    </div>
				    <?php
				}
				?>
				</div>
				<br>



			<div class="row">
				<div class="col-md-6">
		
					<p><a href='single_question.php?ques_id=<?php echo $question_id; ?>&page=1'><?php echo htmlentities($pagerow['title']);?></a></p>
				</div>
				<div class="col-md-6">
					<p>
								<a href="ProfilePage.php?name=<?php echo trim($pagerow['admin']);?>&page=1">
									<img width="25" height="25" src="images/<?php echo $pagerow['admin']?>" onerror="this.src='images/default.png';" >
								</a>
								<b><?php echo "Asked by ";?><a href="ProfilePage.php?name=<?php echo trim($pagerow['admin']);?>&page=1"> <?php echo htmlentities($pagerow['admin']) ?></a>
									<?php 
										echo '(',scores($pagerow['quser']),')'," on ".htmlentities($pagerow['created_at'])."<br />"?> 
								</b>
							</p>
				</div>
				
				<div class="col-md-12">
				<div class="row"><hr/></div>
				</div>
			</div>
				<?php }
					
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
							 echo '<li><a href="?page=' . $page . '">' . $page . '</a></li>'; 
						}
					}


				?>
<?php include "footer.php"; ?>
		</div>
	</div>
</div>
<?php
}
else
{
	header('Location:main_home.php');
}
?>
