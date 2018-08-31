<?php
include ('connect.php');
$plann_name = $_POST['plann_name'];	
$plann_details = $_POST['plann_details'];	
$from_date = $_POST['from_date'];	
$to_date = $_POST['to_date'];		
$tasks_id = $_POST['tasks_id'];	
$empid = $_POST['empid'];
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$dates = $date->format("Y-m-d");	

$sql = "INSERT INTO planing_for_project (plann_name, description, from_date, to_date, task_id, emp_id, created_date_time) VALUES ('$plann_name', '$plann_details', '$from_date', '$to_date', '$tasks_id', '$empid', '$dates')";
if($conn->query($sql) === TRUE)
{
	echo "Inserted Successfull";
	header("Location: user_work_report.php");
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}








?>