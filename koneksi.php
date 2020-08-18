<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "ukk2018";


$conn = mysqli_connect($host,$user,$pass,$database);
if (!$conn){
	echo 'Tidak dapat terhubung ke database';
}
 ?>