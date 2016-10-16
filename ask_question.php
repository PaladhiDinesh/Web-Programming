<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>	
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




<?php include "footer.php"; ?>	