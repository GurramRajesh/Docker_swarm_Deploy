<?php
$servername = "localhost";
$username = "root";
$password = "y447Lnbd_t";
$dbname = "workreport";

//similar file
//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error)
{
	die("Connection Faild : " . $conn->connect_error); 
}
//echo "Connected Successfully";



?>
