<?php include "session.php"; ?>
	
<?php
if (isset($_POST["query"]))
{
	// $output='';
	$array=[];
	$query="SELECT admin FROM login_details WHERE admin LIKE '".$_POST["query"]."%'";
	$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
	// $output='<ul class="list-unstyled">';
	if(mysqli_num_rows($result) > 0)
	{
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

			$array[] = $row;
			// $output='<li>'.$row["admin"].'</li>';
			
		}

	}
	else{
		// $array=[];
	}
	// $output .='</ul>'; 
	echo json_encode($array); 
}
?>