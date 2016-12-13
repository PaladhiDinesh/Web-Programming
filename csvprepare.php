<?php include "session.php"; ?>	

<?php
$filename="piechart";
$fileopen=fopen('piechart','w');

$query= "SELECT admin as user,COUNT(questions_table.user_id) as question from questions_table JOIN login_details WHERE questions_table.user_id=login_details.user_id GROUP BY questions_table.user_id";
$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());

$list=array("user,question");
foreach ($list as $line) {
	fputcsv($fileopen,explode(',',$line));
}

while($row = mysqli_fetch_row($result)){
	fputcsv($fileopen,$row);
}
if (file_exists($filename)) {
     header('location:visualization.php');
 } 
    else {
     // echo "The file does not exist";
 }
exit;


?>