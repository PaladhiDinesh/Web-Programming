<?php include "session.php"; ?>	
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>	
<?php include "scripts.php"; ?>
<?php

if ($useradmin==1){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['questionid'])) {

        $rowToDelete = intval($_POST['questionid']);

        $query = "DELETE FROM questions_table WHERE question_id=" . $rowToDelete . " LIMIT 1"; // Or whatever your primary key is for the row, in my case "id". LIMIT 1 kind of gives added assurance that it won't delete tons of stuff if you make a mistake.

        $result = mysqli_query($connection, $query);

        // Send the user back to the first page so they don't have that annoying pop-up if they hit the refresh button after deleting something.
        header('Location: questions_panel.php'); // Obviously, replace with the location of the page that you need it to redirect to.
    }
}
}
else
{
	 header('Location: 404error.php');
}
?>