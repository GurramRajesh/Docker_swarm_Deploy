<?php
session_start();
include('connect.php');

$task_id = $_POST['task_id'];
$sqlIssue = "SELECT * FROM planing_for_project WHERE task_id='$task_id'";
  $resultforissue = $conn->query($sqlIssue);
  if($resultforissue->num_rows>0)
  {
    while($rwoforissue = $resultforissue->fetch_assoc())
    {
    	echo "<tr>";
      	echo "<td>".$rwoforissue['plann_name']."</td>";
      	echo "<td>".$rwoforissue['description']."</td>";
      	echo "<td>".$rwoforissue['from_date']."</td>";
      	echo "<td>".$rwoforissue['to_date']."</td>";    	
    	echo "</tr>";
	}
} 
else{ echo "No Plann for this Task"; }
?>
