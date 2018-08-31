<?php
session_start();
include("connect.php");
if(isset($_POST['submit'])){
	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	echo $type = $_POST['planned'];
	echo $project_name = $_POST['project'];
	echo $phase_name = $_POST['phase'];

	if((empty($_POST['task_name'])) AND (empty($_POST['assigned_task'])))
	{
		header("Location: user_work_report.php");
	}
	else if(empty($_POST['task_name']))
	{
		echo $task_name = $_POST['assigned_task'];
	}else{
		echo $task_name = $_POST['task_name'];
	}

	echo $description = $_POST['description'];
	echo $complete_per = $_POST['complete_per'];
	echo $localpath = $_POST['localpath'];
	echo $emp_id = $_SESSION['emp_id'];
	echo $workreport_login_id = $_POST['workreport_login_id'];
	echo $inserted_datetime = $date->format("Y/m/d g:i a");
	echo $created_date = $date->format("Y/m/d");

	$sql = "INSERT INTO work_report (type, project_name, phase_name, task_name, description, percent_complete, local_path, emp_id, user_workreport_login_id, inserted_datetime, created_date) VALUES 
	('$type', '$project_name', '$phase_name', '$task_name', '$description', '$complete_per', '$localpath', '$emp_id', '$workreport_login_id', '$inserted_datetime', '$created_date')";
		if($conn->query($sql) === TRUE)
		{
			//echo "New record created successfully";
			header("Location: user_work_report.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
			//header("Location: user_work_report.php");
		}
}



?>