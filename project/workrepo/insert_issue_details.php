<?php
session_start();
include ('connect.php');
if(!empty($_POST['issue_title']))
{
$issue_title = $_POST['issue_title'];	
$issue_details = $_POST['issue_details'];	
$issue_origin = $_POST['issue_origin'];	
$issue_type = $_POST['issue_type'];	
$issue_tech_nontech = $_POST['issue_tech_nontech'];	
$task_id = $_POST['task_id'];	
$emp_id = $_POST['emp_id'];
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$dates = $date->format("Y-m-d");	

$sql = "INSERT INTO issue_details (issue_title, issue_details, issue_origin, issue_type, issue_tech_nontech, task_id, emp_id, inserted_datetime) VALUES ('$issue_title', '$issue_details', '$issue_origin', '$issue_type', '$issue_tech_nontech', '$task_id', '$emp_id', '$dates')";
if($conn->query($sql) === TRUE)
{
	$last_id = $conn->insert_id;
	$sql = "INSERT INTO issue_assign (issue_id, issue_status, emp_id, task_id, inserted_datetime) VALUES ('$last_id', 1, '$emp_id', '$task_id', '$dates')";
	if($conn->query($sql) === TRUE)
	{
		echo "Inserted Successfully";
		header("Location: user_work_report.php");
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}


}
else{
	echo "Not Inserted";
	header("Location: user_work_report.php");
}





?>