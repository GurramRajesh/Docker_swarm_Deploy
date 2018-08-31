<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
	if(empty($_POST['local_add']) || empty($_POST['elcontact_no']) || empty($_POST['epcontact_no']))
	{
		//echo "not inserted";
		header("Location: add_more_details.php?id=" .$_POST['emp_id']);
	}
	else{
		echo $local_add = $_POST['local_add'];
		echo $elcontact_no = $_POST['elcontact_no'];
		$permanent_add = $_POST['permanent_add'];
		$epcontact_no = $_POST['epcontact_no'];
		$emp_id = $_POST['emp_id'];

		$sql = "UPDATE users SET local_address = '$local_add', local_emergency_contact = '$elcontact_no', permanent_address ='$permanent_add', permanenet_emergency_contact = '$epcontact_no' WHERE emp_id ='$emp_id' ";
		if ($conn->query($sql) === TRUE) {
		    //echo "Record updated successfully";
		    header("Location: add_more_details.php?id=" .$emp_id);
		} else {
			header("Location: add_more_details.php?id=" .$emp_id);
		    //echo "Error updating record: " . $conn->error;
		}
	}
}



?>