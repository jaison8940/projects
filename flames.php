<?php
$ser="localhost";
$user="root";
$pass="";
$db="flames";
$user1 = @$_GET["one"];
$user2 = @$_GET["two"];
$result = @$_GET['three'];
$con=mysqli_connect($ser,$user,$pass,$db) or die("connection_aborted");
// echo "connection_success";
$sql="INSERT INTO flame (user1,user2,result) VALUES ('$user1','$user2','$result')";
if($con->query($sql) == TRUE)
{
	echo "kol";
}
else {
	echo "failed";
}
// echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
header('Location: http://localhost/flames.html');
// exit;
$con->close();
?>