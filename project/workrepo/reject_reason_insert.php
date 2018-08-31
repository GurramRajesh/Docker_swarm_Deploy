<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
	if(empty($_POST['reason']))
	{
		echo "not inserted";
	}
	else{
		$emp_id = $_POST['emp_id'];
		$reason = $_POST['reason'];
		$task_id = $_POST['task_id'];
		$sql = "UPDATE task_status SET rejected_reason = '$reason', status = 'Rejected' WHERE emp_id = '$emp_id' AND created_task_id = '$task_id'";
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header("Location: new_task_list.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

?>