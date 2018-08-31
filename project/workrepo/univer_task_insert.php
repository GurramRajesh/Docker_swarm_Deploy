<?php
session_start();
include ("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

if(isset($_POST['submit'])){
	if(empty($_POST['task_name']))
	{
		header("Location: universal_task.php");
	}
	else{
		$project_id = $_POST['project'];
		$phase_id = $_POST['phase'];
		$task_name = $_POST['task_name'];
		$start_date = $_POST['start_date'];
		$end_date =$_POST['end_date'];
		$dates = $date->format("Y-m-d");
		$sql = "INSERT INTO create_task (project_id, phase_id, task_name, start_date, end_date, inserted_date) VALUES ('$project_id', '$phase_id', '$task_name', '$start_date', '$end_date', '$dates')";
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
	    		foreach($_POST['emp_name'] as $value)
	    		{
	    			$sql = "INSERT INTO assign_task (created_task_id, project_id, phase_id, emp_id, inserted_date) VALUES ('$last_id',  '$project_id', '$phase_id', '$value', '$dates')";
	    			if($conn->query($sql) === TRUE)
	    			{
	    				$sql = "INSERT INTO task_status (created_task_id, emp_id, inserted_date) VALUES ('$last_id', '$value', '$dates')";
	    				if($conn->query($sql) === TRUE)
	    				{
	    					
	    					$sqlinsert = "INSERT INTO work_report_data( li_index, task_id, active_status, inserted_date) SELECT IFNULL(MAX(li_index),'') + 1,'$last_id',1,'$dates' FROM work_report_data";
	    					if($conn->query($sqlinsert) === TRUE)
	    					{
	    						echo "inserted";
	    						header("Location: universal_task.php");
	    					}
	    					else{
	    						echo "Error: " . $sqlinsert . "<br>" . $conn->error;
	    					}
	    				}
	    			}
	    		}
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("Location: universal_task.php");
		}
	}
}





?>