<style type="text/css">
  #rejtask{
    color: #ca3f02;
  }
</style>

<?php
session_start();
include("connect.php");

$emp_id = $_SESSION['emp_id'];

if(!empty($_SESSION))
{
  include('user_home.php');
?>


<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 myborder">
    <h4 style="text-align:center;">List of Task</h4>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Phase Name</th>
              <th>Task Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Priority</th>
              <th>Description</th>
              <th>Status</th>
              <th>Reason</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql = "SELECT *,create_task.id as task_id FROM `create_task` JOIN `task_status` ON create_task.id=task_status.created_task_id WHERE task_status.emp_id = '$emp_id' AND task_status.task_status = 0 AND task_status.status='Rejected'";
              $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc())
                {
          ?>
            <tr>
              <td><?php echo $row['project_title'];?></td>
              <td><?php echo $row['phase_title'];?></td>
              <td><?php echo $row['task_name'];?></td>
              <td><?php echo $row['start_date'];?></td>
              <td><?php echo $row['end_date'];?></td>
              <td><?php if($row['select_priority']==1){echo "High";}elseif($row['select_priority']==2){echo "Low";}else{echo "Medium";};?></td>
              <td><?php echo $row['description'];?></td>
              <td><?php if($row['task_status']==0 AND $row['status']=='Rejected'){echo "Rejected";};?></td>
              <td><?php echo $row['rejected_reason'];?></td>
            </tr>
            <?php } }
            else{
                  echo "You have not Rejected any task";
              }?>
            
          </tbody>
      </table>
    </div>
  </div>
  
</div>
</body>
</html>
<?php
}
else{
  header("Location: index.php");
}
?>

