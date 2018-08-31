<?php
session_start();

define("BEFORE_TIME", 0, true);
define("ON_TIME", 1, true);
define("DELAYED", 2, true);


include ('connect.php');
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$ul_index = $_POST['ulIndex'];	
$li_index = $_POST['liIndex'];	
$task_id = $_POST['liId'];	
$dates = $date->format("Y-m-d");	

$select = "SELECT * FROM create_task WHERE id='$task_id'";
$result = $conn->query($select);
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$id = $row['id']; 
		$start_date = $row['start_date']; 

		$startdate = strtotime($start_date); // Work given Start date from database
		$todaydate = strtotime($dates); 	// Todays date

		if($ul_index == 0)	//If Ul index is 0
		{
			if($todaydate > $startdate) // Comparing Todays date with given start date if greater than
			{
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'"; // Update the active_status for old task (before 1)
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 2, '$dates')";
						if ($conn->query($sql) === TRUE)   // Inserting new Work data with progress_status according to given Started time
						{
				    		echo DELAYED;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
			elseif($todaydate < $startdate)	// Comparing Todays date with given start date if less than
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 0, '$dates')";
						if ($conn->query($sql) === TRUE)  // Inserting new Work data with progress_status according to given Started time
						{
				    		echo BEFORE_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}

				}
			}else 	// Comparing Todays date with given start date if equal
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 1, '$dates')";
						if ($conn->query($sql) === TRUE) {	// Inserting new Work data with progress_status according to given Started time
				    		echo ON_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
		}
		elseif($ul_index == 1)	//If Ul index is 1
		{
			if($todaydate > $startdate) // Comparing Todays date with given start date if greater than
			{
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'"; // Update the active_status for old task (before 1)
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 2, '$dates')";
						if ($conn->query($sql) === TRUE)   // Inserting new Work data with progress_status according to given Started time
						{
				    		echo DELAYED;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
			elseif($todaydate < $startdate)	// Comparing Todays date with given start date if less than
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 0, '$dates')";
						if ($conn->query($sql) === TRUE)  // Inserting new Work data with progress_status according to given Started time
						{
				    		echo BEFORE_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}

				}
			}else 	// Comparing Todays date with given start date if equal
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 1, '$dates')";
						if ($conn->query($sql) === TRUE) {	// Inserting new Work data with progress_status according to given Started time
				    		echo ON_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
		}
		elseif($ul_index == 2)	//If Ul index is 2
		{
			if($todaydate > $startdate) // Comparing Todays date with given start date if greater than
			{
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'"; // Update the active_status for old task (before 1)
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 2, '$dates')";
						if ($conn->query($sql) === TRUE)   // Inserting new Work data with progress_status according to given Started time
						{
				    		echo DELAYED;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
			elseif($todaydate < $startdate)	// Comparing Todays date with given start date if less than
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 0, '$dates')";
						if ($conn->query($sql) === TRUE)  // Inserting new Work data with progress_status according to given Started time
						{
				    		echo BEFORE_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}

				}
			}else 	// Comparing Todays date with given start date if equal
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 1, '$dates')";
						if ($conn->query($sql) === TRUE) {	// Inserting new Work data with progress_status according to given Started time
				    		echo ON_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
		}
		else	//If Ul index is 3
		{
			if($todaydate > $startdate) // Comparing Todays date with given start date if greater than
			{
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'"; // Update the active_status for old task (before 1)
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 2, '$dates')";
						if ($conn->query($sql) === TRUE)   // Inserting new Work data with progress_status according to given Started time
						{
				    		echo DELAYED;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
			elseif($todaydate < $startdate)	// Comparing Todays date with given start date if less than
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 0, '$dates')";
						if ($conn->query($sql) === TRUE)  // Inserting new Work data with progress_status according to given Started time
						{
				    		echo BEFORE_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}

				}
			}else 	// Comparing Todays date with given start date if equal
			{	// Update the active_status for old task (before 1)
				$update = "UPDATE `work_report_data` SET `active_status`=0 WHERE `task_id`= '$task_id'";
				if ($conn->query($update) === TRUE) 
				{
					$sql_update = "UPDATE `work_report_data` SET li_index = (SELECT IFNULL(MAX(li_index),'') + 1)";	//Updating li_index before inserting new data for card position
					if ($conn->query($sql_update) === TRUE) 
					{
						$sql = "INSERT INTO work_report_data (ul_index, li_index, task_id, active_status,task_progress, progress_status, inserted_date) VALUES ('$ul_index', '$li_index', '$task_id', 1,'$ul_index', 1, '$dates')";
						if ($conn->query($sql) === TRUE) {	// Inserting new Work data with progress_status according to given Started time
				    		echo ON_TIME;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
			}
		}




	}
}
else{
	echo "No Data";
}





?>