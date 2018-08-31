<?php
session_start();
include("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$emp_id = $_POST['emp_id']; 
$logout_date_time = $date->format("Y/m/d g:i a");
$ip_address = $_SERVER["REMOTE_ADDR"];

if(!empty($_POST['logout_date']))
{
	$logout_date = $_POST['logout_date'];
}
else{
	$logout_date = $date->format("Y/m/d");
}

if(!empty($_POST['logout_hr']))
{
	echo $logout_time = $_POST['logout_hr'].':'.$_POST['logout_mnt'].' '.$_POST['logout_ampm'];
}
else{
	echo $logout_time = $date->format("g:i a");
}

$sql_update = "UPDATE `user_workreport_login` SET logout_time='$logout_time', logout_date_time='$logout_date_time' WHERE emp_id='$emp_id' AND login_date='$logout_date'";
if($conn->query($sql_update) === TRUE)
{
	$sql_update = "UPDATE `user_login` SET login_status=0,logout_ip_address='$ip_address', logout_time='$logout_date_time' WHERE emp_id='$emp_id'";
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
}
else{
	echo "Not Inserted";
}

?>