<?php include "header.php"; ?>
<?php include "session.php"; ?>	
<?php
	if ($USERID != 'undefined'){
		header('Location:main_home.php');
	}
	$flag='';
	if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($connection,$username);
		$password = mysqli_real_escape_string($connection,$password);	
		$queryall = "SELECT * from login_details where admin='$username'";
		$query = "INSERT INTO login_details(`admin`, `password`) VALUES ('$username','$password')";
		$resultall = mysqli_query($connection,$queryall) or die("Failed to query database".mysql_error());
		if($resultall->num_rows != 0)
		{
			$flag= "username already exists! Please use other Username";
		}
		else{
			$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
		#	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($result){
				$last_id = mysqli_insert_id($connection);?>
				<script type="text/javascript">
 					alert('Successfully Registered !! Please Login');
 				</script>
 				<?php
			#	header('Location:login.php');
			}
		}
			mysqli_close($connection);
		}
	?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<title>ANSWERSKART- Sign-Up Page</title>
<img src="questions.jpg" style="width:1300px;height: 500px">
<div style="margin-top:100px;" id="loginModal" class="modal show col-xs-offset-7 col-md-5" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
      		<div class="modal-header">
          		<h1 class="text-center">Sign-Up</h1>
      		</div>
      		<div class="modal-body">
          		<form class="form col-md-12 center-block" method="post" accept-charset='UTF-8'>
            		<div class="form-group">
              			<input type="text" class="form-control input-lg" placeholder="Email" name="username" id ="username" required>
              			<p id="usernameerror"></p>
            		</div>
            		<div class="form-group">
              			<input type="password" class="form-control input-lg" name="password" id = "password" placeholder = "password" required>
              			<p id="passworderror"></p>
            		</div>
            		<div class="form-group">
              			<button id="submit" class="btn btn-dinesh btn-lg btn-block" name ="submit">Sign Up</button>
              			<?php echo $flag; ?>
            		</div>
          		</form>
      		</div>
      		<div class="modal-footer"></div>
 		</div>
  	</div>
</div>
<?php include "scripts.php"; ?>
<?php include "footer.php"; ?>	