<?php
include('connect.php');

$issue_status = $_POST['issue_status'];
$issue_id = $_POST['issue_id'];
$task_id = $_POST['task_id'];
$emp_id = $_POST['emp_id'];
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$dates = $date->format("Y-m-d");

$sql = "INSERT INTO issue_assign (issue_id, issue_status, emp_id, task_id, inserted_datetime) VALUES ('$issue_id', '$issue_status', '$emp_id', '$task_id', '$dates')";
if($conn->query($sql) === TRUE)
{
	echo "Inserted Successfully";
}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
