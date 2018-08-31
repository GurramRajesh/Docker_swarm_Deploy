<?php
session_start();
include("connect.php");
$emp_id = $_GET['id'];
if(!empty($_SESSION))
{
	include("admin_home.php");
?>

<div class="container contai">
<div class="row box">
 <a href="list_of_user.php" class="btn pull-right">List of User</a>
<h4 style="text-align:center;">Task Details</h4>
<hr>
	<table class="table table-bordered" id="datatables">
      <thead style="background: #758dad;">
        <tr>
          <th>Type</th>
          <th>Project</th>
          <th>Phase</th>
          <th>Task</th>
          <th>Description</th>
          <th>Local Path</th>
          <th>%complete</th>
          <th>Inserted DateTime</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
          $sql = "SELECT * FROM work_report WHERE emp_id = '$emp_id'";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
        ?>
          <td><?php if($row['type']==1){echo "P";}else{echo "UP";};?></td>
          <td><?php echo $row['project_name'];?></td>
          <td><?php echo $row['phase_name'];?></td>
          <td><?php echo $row['task_name'];?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['local_path'];?></td>
          <td><?php if($row['percent_complete']==0){echo "Rejected";}elseif($row['percent_complete']==1){echo "Started";}elseif($row['percent_complete']==100){echo "Completed";}else{echo $row['percent_complete'];};?></td>
          <td><?php echo $row['inserted_datetime'];?></td>
        </tr>
        <?php } }
          else{
            echo "0 result";
          }
        ?>
      </tbody>
    </table>
</div>
</div>


<?php
}
else{
	header("Location: index.php");
}
?>

<script type="text/javascript">
$(document).ready(function(){
  $('#datatables').DataTable();
});
</script>