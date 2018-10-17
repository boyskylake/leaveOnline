<?php

$host="localhost";
$username="root";
$password="";
$dbname="dbleaveonline";


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	@mysqli_query($conn,"SET GLOBAL time_zone = '+7:00'");
	@mysqli_query($conn,"SET NAMES UTF8"); 
	@mysqli_query($conn,"SET character_set_results=utf8"); 
	@mysqli_query($conn,"SET character_set_client=utf8");
	@mysqli_query($conn,"SET character_set_connection=utf8");
	@date_default_timezone_set("Asia/Bangkok");
	  

?>