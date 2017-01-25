 <?php include "header.php"; ?>
<?php include "session.php"; ?>	
<?php
	if ($USERID != 'undefined'){


		header('Location:main_home.php');
	}
	$Invalid =" ";
	$captchaerrormsg=" ";


	if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        
        if(!$captcha){
          $captchaerrormsg='<font color="red"><h4>Please check the captcha form.</h4></font>';
        }
        $secretKey = "6LfSAw4UAAAAAEFPBxtHY7_ypsTWcUwNkihqB0KF";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
         // echo '<h2>Error using captcha</h2>';
  
        } else {
          //echo '<h2>Successful</h2>';
          if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($connection,$username);
		$password = mysqli_real_escape_string($connection,$password);	
		$query = "SELECT * from login_details where admin='$username' and password='$password'";
		$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


			if ($result->num_rows > 0){
				$_SESSION['login_user']=$row['user_id'];
				$_SESSION['login_name']=$row['admin'];
				$_SESSION['admin_value']=$row['admin_rights'];
        $_SESSION['emailid']=$row['emailid'];
        $_SESSION['checkgit']=$row['checkgit'];
				header('Location:main_home.php');
				}
			
			else{
	 			$Invalid= "Invalid username or password!"; 
	 		}
			mysqli_close($connection);
		}
        }
        }
	
?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<title>ANSWERSKART- Login Page</title>
<img src="download.jpg" style="width:1200px;height: 623px">
<div style="margin-top:100px;" id="loginModal" class="modal show col-xs-offset-7 col-md-5" tabindex="-1" role="dialog" aria-hidden="true" align="center">
	<div class="modal-dialog">
  		<div class="modal-content">
      		<div class="modal-header">
          		<h1 class="text-center">Login</h1>
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
            		<div class="g-recaptcha" data-sitekey="6LfSAw4UAAAAANQYFP686-AGZcbHZQTn97-jI1WV"></div><br>
            		<div class="form-group">
              			<button id="submit" class="btn btn-dinesh btn-lg btn-block" name ="submit">Sign In</button>
              			<h4>
              			<?php 
              				echo "Not registered Yet ? Register Here "; 
              			?> 
              			<a href="signup.php">Sign Up</a></h4>
              			<?php
              			echo $Invalid; 
              			echo $captchaerrormsg;?>
            		</div>
          		</form>
              <center> <p> <a href="https://github.com/login/oauth/authorize?scope=user:email&client_id=dafdedcc9f75c7e7242f">Got Github? Signin Here! </a></p> </center>
      		</div>
      		<div class="modal-footer"></div>
 		</div>
  	</div>
</div>

			<!-- Latest compiled and minified JavaScript -->
<?php include "scripts.php"; ?>	
<script type="text/javascript">
	 $('#submit').click(function(e) {
	 	var user = document.getElementById("username").value;
		var pass = document.getElementById("password").value;
		if (user == '')
		{
	 		e.preventDefault();	
			$('#usernameerror').html("Enter Username");
		}
		else if (pass =='')
		{
	 		e.preventDefault();
			$('#usernameerror').html(""); 		
			$('#passworderror').html("Enter Password")
		}	
	 });
</script>
<?php include "footer.php"; ?>