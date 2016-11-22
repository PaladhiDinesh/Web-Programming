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
<br>
</div>

	<div class="row">
		<div class="col-md-6">
		<h4>Users</h4>
		</div>
		<div class="col-md-3">
		<h4>Questions Count</h4>
		</div>
		<div class="col-md-3">
		<h4>Scores</h4>
		</div>




	<div class="row">
		<div class="col-md-12">
		<?php
   
    $userquery="SELECT admin,user_id from login_details ";
    $userresult=mysqli_query($connection,$userquery) or die("Failed to query database".mysql_error());

    $count=$userresult->num_rows;
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
			$pagination="SELECT admin,user_id from login_details limit ".$startArticle.','.'5';
			$page_result = mysqli_query($connection,$pagination) or die ("Failed to query database11".mysql_error());

	// $userrow = mysqli_fetch_array($userresult,MYSQLI_ASSOC);
	while ($userrow = mysqli_fetch_array($page_result,MYSQLI_ASSOC)) { 
		?>	
		<hr/>
		<div class="row">
			<div class="col-md-6">
				<p><a href="ProfilePage.php?name=<?php echo trim($userrow['admin']);?>&page=1"> <?php echo htmlentities($userrow['admin']) ?></a></p>
			</div>
			<div class="col-md-3">
			<?php
			$id=$userrow['user_id'];
			$questioncount ="SELECT user_id,COUNT(title) as count from questions_table WHERE user_id=$id ";
			$quescountres=mysqli_query($connection,$questioncount) or die("Failed to query database".mysql_error());
			$quesrow = mysqli_fetch_array($quescountres,MYSQLI_ASSOC);
			echo $quesrow['count'];



			?>

			</div>
			<div class="col-md-3">
				<?php
				if($quesrow['count']==0){
					echo 0;
				}
				else{
				scores($id);
				}

				?>

			</div>
		</div>
		<?php
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
							 echo '<li><a href="?page=' . $page . '">' . $page . '</a></li>'; 
						}
					}
					?>




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
