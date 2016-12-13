<?php include "session.php"; ?>	

<?php
$filename="piechart";
$answerfile="anschart";
$fileopen=fopen('./piechart','w');
$fileopen2=fopen('./anschart', 'w');

$query= "SELECT admin as user,COUNT(questions_table.user_id) as question from questions_table JOIN login_details WHERE questions_table.user_id=login_details.user_id GROUP BY questions_table.user_id";
$result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());



$ansquery="SELECT admin as user,COUNT(answers_table.user_id) as question from answers_table JOIN login_details WHERE answers_table.user_id=login_details.user_id GROUP BY answers_table.user_id";
$ansresult = mysqli_query($connection,$ansquery) or die("Failed to query database".mysql_error());


$listans=array("user,answer");
foreach ($listans as $line1) {
	fputcsv($fileopen2,explode(',', $line1));
}

while ($row1 = mysqli_fetch_row($ansresult)) {
	fputcsv($fileopen2, $row1);
}

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