<?php
// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $database = "localdb";
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "dbleaveonline";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
@mysqli_query($conn,"SET NAMES UTF8"); 
	@mysqli_query($conn,"SET character_set_results=utf8"); 
	@mysqli_query($conn,"SET character_set_client=utf8");
	@mysqli_query($conn,"SET character_set_connection=utf8");
	@date_default_timezone_set($conn,"Asia/Bangkok"); 
$sql = "SET GLOBAL time_zone = '+7:00'";
$query = mysqli_query($conn, $sql);
if ($query) {
    # code...
    
}
// echo "Connected successfully";
?>