<?php
$server="localhost";
$user="root";
$pass="";
$db="db_roverhire";
$con=mysqli_connect($server,$user,$pass,$db);
if(!$con)
{
	echo "Database Error";
}
?>