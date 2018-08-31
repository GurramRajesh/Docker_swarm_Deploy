<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
	if(empty($_POST['bank_name']) || empty($_POST['acc_no']) || empty($_POST['branch_name']))
	{
		echo "not inserted";
		header("Location: add_more_details.php?id=" .$_POST['emp_id']);
	}
	else{
		$bank_name = $_POST['bank_name'];
		$acc_no = $_POST['acc_no'];
		$branch_name = $_POST['branch_name'];
		$acc_holder_name = $_POST['acc_holder_name'];
		$emp_id = $_POST['emp_id'];
		$ifsc_code = $_POST['ifsc_code'];
		$branch_code = $_POST['branch_code'];
		$swift_code = $_POST['swift_code'];
		$account_type = $_POST['account_type'];

		$sql = "INSERT INTO bank_details (bank_name, account_no, account_holder_name, branch_name, ifsc_code, branch_code, swift_code, account_type, emp_id) VALUES ('$bank_name', '$acc_no', '$branch_name', '$acc_holder_name', '$ifsc_code', '$branch_code', '$swift_code', '$account_type','$emp_id')";
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