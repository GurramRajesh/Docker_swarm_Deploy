<?php
include('connect.php');
$task_id = $_POST['task_id'];
$sql = "SELECT *,create_task.start_date AS startdate,create_task.end_date AS enddate FROM `create_task` JOIN project_details ON create_task.project_id=project_details.id JOIN phase_details ON create_task.phase_id=phase_details.id JOIN task_description ON create_task.id=task_description.created_task_id WHERE create_task.id='$task_id'";
$result = $conn->query($sql);
if($result->num_rows>0)
  {
    while ($rows = $result->fetch_assoc()) 
    {
      // Fetching Project details,phase details,task name,start and end date
      echo "<div class='row'>";
      echo "<div class='col-md-9'>";
      echo "<table class='table table-bordered'>";
      echo "<tr><td><label>Project Name : - </label> " .$rows['project_title']."</td></tr>";
      echo "<tr><td><label>Phase Name : - </label> " .$rows['phase_title']."</td></tr>";
      echo "<tr><td><label>Task Name : - </label> " .$rows['task_name']."</td></tr>";
      echo "</table>";
      echo "</div>";
      echo "<div class='col-md-3'>";
      echo "<table class='table table-bordered'>";
      echo "<tr><td><label>Start Date : - </label> " .$rows['startdate']."</td></tr>";
      echo "<tr><td><label>End Date : - </label> " .$rows['enddate']."</td></tr>";
      echo "</table>";
      echo "</div>";
      echo "</div>";
      //End of all above fetching

      //Fetching Description and File and Assigned same to others
      echo "<div class='row'>";
      echo "<h4 class='desc'>Description</h4>";
      echo "<div class='col-md-12'>";
      echo "<ul class='list-group' style='list-style-type: none;'><li class='list-group-item'><label>";
      echo "".$rows['description_text']."";
      echo "</label></li></ul>";
      echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
      echo "<div class='col-md-7'>";
      echo "<ul class='list-group' style='list-style-type:'><li class='list-group-item'>";
      echo '<img class="" src="image/'.$rows['files'].'">';
      echo "</li></ul>";
      echo "</div>";
      echo "<div class='col-md-5'>";
      echo "<ul class='list-group' style='list-style-type: none;'><li class='list-group-item'>";
      echo "<label>Assigned With</label>";
      echo "</li></ul>";
      echo "</div>";
      echo "</div>";
      //End of fetching
      
      
} } else{ echo "No Description for this Task"; } 
?>
