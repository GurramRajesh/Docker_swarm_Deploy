<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
	if(empty($_POST['per_hike']) || empty($_POST['effective']) || empty($_POST['from_date']))
	{
		echo "not inserted";
		header("Location: add_more_details.php?id=" .$_POST['emp_id']);
	}
	else{
		$per_hike = $_POST['per_hike'];
		$effective = $_POST['effective'];
		$emp_id = $_POST['emp_id'];
		$from_date = $_POST['from_date'];
		$status = $_POST['status'];

		$sql = "INSERT INTO appraisal (percent_hike, effective, from_date, status, emp_id) VALUES ('$per_hike', '$effective', '$from_date', '$status', '$emp_id')";
			if ($conn->query($sql) === TRUE) {
		    	echo "New record created successfully";
		    	header("Location: add_more_details.php?id=" .$emp_id);
		    	
			} else {
				header("Location: add_more_details.php?id=" .$emp_id);
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}
}

?>