<?php
include("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
if (isset($_POST['submit'])) {

//$login_date = $_POST['login_date'];
$emp_id = $_POST['emp_id'];

if(!empty($_POST['login_date']))
{
	$login_date = $_POST['login_date'];
}
else{
	$login_date = $date->format("Y/m/d");
}

if(!empty($_POST['login_hour']))
{
	$login_time = $_POST['login_hour'].':'.$_POST['login_minute'].' '.$_POST['login_ampm'];
}
else{
	$login_time = $date->format("g:i a");
}

	$sql = "INSERT INTO user_workreport_login (emp_id, login_date, login_time) VALUES ('$emp_id', '$login_date', '$login_time')";
	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location: user_work_report.php");
	}
	else{
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>