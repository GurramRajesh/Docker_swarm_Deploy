<?php
session_start();
include("connect.php");
$emp_id = $_SESSION['emp_id'];
$date = date("Y-m-d g:i a");
$ip_address = $_SERVER["REMOTE_ADDR"];

$sql_update = "UPDATE `user_login` SET login_status=0,logout_ip_address='$ip_address', logout_time='$date' WHERE emp_id='$emp_id'";
if($conn->query($sql_update) === TRUE)
{
	session_unset();
	session_destroy();
	$sql = "UPDATE `user_login` SET login_status=0,logout_ip_address='$ip_address', logout_time='$date' WHERE emp_id='$emp_id'";
	if($conn->query($sql) === TRUE)
	{
	header("Location: index.php");
	include 'index.php';
	exit();
	}
}
else{
	echo "Not Inserted";
}

/*session_unset();
session_destroy();
header("Location: index.php");
include 'index.php';
exit();*/
?>