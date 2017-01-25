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
		$email = $_POST['email'];
		$username = mysqli_real_escape_string($connection,$username);
		$password = mysqli_real_escape_string($connection,$password);
		$email = mysqli_real_escape_string($connection,$email);
		$queryall = "SELECT * from login_details where admin='$username'";
		$query = "INSERT INTO login_details(admin,password,emailid) VALUES ('$username','$password','$email')";
		$resultall = mysqli_query($connection,$queryall) or die("Failed to query database".mysql_error());
		if($resultall->num_rows != 0)
		{
			$flag= "username already exists! Please use other Username";
			echo "username already exists! Please use other Username";
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
			//header('Location:login.php');
		}
	?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<title>ANSWERSKART- Sign-Up Page</title>
<img src="download.jpg" style="width:1200px;height: 623px">
<div style="margin-top:100px;" id="loginModal" class="modal show col-xs-offset-7 col-md-5" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
      		<div class="modal-header">
          		<h1 class="text-center">Sign-Up</h1>
      		</div>
      		<div class="modal-body">
          		<form class="form col-md-12 center-block" method="post" accept-charset='UTF-8'>
            		<div class="form-group">
            			Enter Username
              			<input type="text" class="form-control input-lg" placeholder="Username" name="username" id ="Username" required>
              			<p id="usernameerror"></p>
            		</div>
            		<div class="form-group">
            			Enter password
              			<input type="password" class="form-control input-lg" name="password" id="Password" placeholder = "Password" required>
              			<p id="passworderror"></p>
            		</div>
            		<div class="form-group">
            			Confirm password
              			<input type="password" class="form-control input-lg" placeholder="Confirm Password" name="cpassword" id = "cpassword" required>
              			<p id="cpassworderror"></p>
            		</div>
            		<div class="form-group">
            			Enter Email-ID
              			<input type="text" class="form-control input-lg" placeholder="Email-ID" name="email" id ="email" required>
              			<p id="emailiderror"></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script type="text/javascript">
		 $('#submit').click(function(e) {
	 	var user = document.getElementById("Username").value;
		var pass = document.getElementById("Password").value;
		var cpass = document.getElementById("cpassword").value;
		var emailid = document.getElementById("email").value;
		if (user == '')
		{
	 		e.preventDefault();	
			$('#usernameerror').html("Enter Username");
		}
		else if (pass == '')
		{
	 		e.preventDefault();
			$('#usernameerror').html("");
			$('#passworderror').html("Enter Password");
		}
		else if(cpass == '')
		{
			e.preventDefault();
			$('#usernameerror').html(""); 		
			$('#passworderror').html("");
			$('#cpassworderror').html("Enter confirm password");
		}
		else if(pass != cpass)
		{
			e.preventDefault();
			$('#usernameerror').html(""); 		
			$('#passworderror').html("");
			$('#cpassworderror').html("confirm password doesnot match the password");
		}
		else if (emailid =='')
		{
	 		e.preventDefault();
			$('#usernameerror').html(""); 		
			$('#passworderror').html("");
			$('#cpassworderror').html("");
			$('#emailiderror').html("enter email id");
		}
		else if (!validateEmail(emailid))
		{
	 		e.preventDefault();
			$('#usernameerror').html(""); 		
			$('#passworderror').html("");
			$('#cpassworderror').html("");
			$('#emailiderror').html("Invalid Email");
		}

	 });
	function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
	}

</script>

<?php include "scripts.php"; ?>
<?php include "footer.php"; ?>	