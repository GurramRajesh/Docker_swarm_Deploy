<?php
session_start();
include("connect.php");

$task_id = $_POST['task_id'];

$str_explode=explode(",",$task_id);
echo $id = $str_explode[0]; // task_id 
echo $emp_id = $str_explode[1]; // emp_id

	$sql_update = "UPDATE task_status SET task_status = 1, status = 'Started' WHERE emp_id = '$emp_id' AND created_task_id = '$id'";
	if ($conn->query($sql_update) === TRUE) {
    	//echo "Record updated successfully";
	} else {
	    //echo "Error updating record: " . $conn->error;
	}

?>