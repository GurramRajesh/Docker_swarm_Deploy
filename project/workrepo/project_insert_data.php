<?php
session_start();
include ("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
if(isset($_POST['submit'])){
	if(empty($_POST['project_title']) || empty($_POST['start_date']) || empty($_POST['end_date']) )
	{
		header("Location: create_project.php");
	}
	else{
		$project_title = $_POST['project_title'];
		$start_date = $_POST['start_date'];
		$end_date =$_POST['end_date'];
		$department =$_POST['department'];
		$incharge =$_POST['incharge'];
		$created_datetime = $date->format("Y/m/d g:i a");

		$sql = "INSERT INTO project_details (project_title, start_date, end_date, department, incharge, created_datetime) VALUES ('$project_title' ,'$start_date', '$end_date', '$department', '$incharge', '$created_datetime')";
		if ($conn->query($sql) === TRUE) {
			echo "Inserted";
	    	header("Location: create_project.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("Location: create_project.php");
		}
	}
}





?>