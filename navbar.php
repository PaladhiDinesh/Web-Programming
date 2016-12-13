<header class="navbar navbar-inverse">
	<div class="container-fluid ">
		<nav role ="navigation"> 
				    <!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="main_home.php">Answerskart</a>
			</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="ask_question.php">Ask a Question<span class="sr-only">(current)</span></a></li>
					<li><a href="my_questions.php?page=1">My Questions</a></li>
					<li><a href="unanswered_questions.php?page=1">Unanswered Questions</a></li>
					<!-- <li><a href="#">My Answered Questions</a></li> -->
					<li><a href="recent.php">Recent Questions</a></li>
					<li><a href="help.php">Help Page</a></li>
<!-- 					<li><a href="adminpage.php">Questions Panel</a></li>
					<li><a href="userspage.php">Users Panel</a></li> -->
					<li><a href="csvprepare.php">Visualizations</a></li>
					</ul>
					<form action="./ProfilePage.php" class="navbar-form navbar-left">
     			  	<div class="form-group">
        				<input type="text" class="form-control" name="name" id="name" placeholder="User Search"></input>
        				<input type="hidden" class="form-control" name="page" id="name" value="1"></input>

        			</div>	
        			<div id ="userlist"></div>

    		    	<!-- <button type="submit" class="btn btn-default">Submit</button> -->
    		    
    			</form>
				<ul class="nav navbar-nav navbar-right">
					<?php
				        if ($USERID != "undefined"){ 
				     ?>
							<li><a style="color: white" href="ProfilePage.php?name=<?php echo trim($USERNAME);?>&page=1">
							<?php
              
              if($_SESSION['checkgit']==1)
              { 
                echo "<img width='25' height='25' alt='abc' src='https://github.com/".$_SESSION['login_name'].".png' />";
                
              }
              else
              {
                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $_SESSION['emailid'] ) ) ) . "?d=" . urlencode( 'https://s24.postimg.org/a4bwqzpgl/default.png' );
              $source = "./images/".$_SESSION['login_name'];
              $source = trim($source);
              if(file_exists($source))
              { 
                 ?>
                  <img width='25' height='25' alt='abc' src='./images/<?php echo $_SESSION['login_name']; ?>' />
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

                             <?php echo $USERNAME;?></a></li>
							<li><a href="logout.php">Log out</a></li>
							<?php
						}
						else{ 
							?>
							<li><a href="login.php">Log In</a></li>
							<li><a href="signup.php">Sign Up</a></li>
							<?php
						}
				       		?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</div>
	<!--<h1 id ="heading">ANSWERSKART</h1>-->
</header>