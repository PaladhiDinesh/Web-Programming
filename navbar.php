<header class="navbar navbar-inverse" role="banner">
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
				        <li><a href="my_questions.php">My Questions</a></li>
				    
				      </ul>
				      <form class="navbar-form navbar-left">	
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Search">
				        </div>
				        <button type="submit" class="btn btn-default">Submit</button>
				      </form>
				      <ul class="nav navbar-nav navbar-right">
				       <li><a href="#">Contact Us</a></li>
				       <?php
				        if ($USERID)
							{ ?>
								<li><a href="logout.php">Log out</a></li>
							<?php
							}
							else
							{ ?>
								<li><a href="login.php">Log In</a></li>
							<?php
						}
				       ?>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				</nav>
			</div>
			<!--<h1 id ="heading">ANSWERSKART</h1>-->
		</header>
