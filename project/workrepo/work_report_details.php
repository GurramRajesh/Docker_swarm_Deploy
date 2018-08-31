<style type="text/css">
#home{ 
  color: #ca3f02;
}
</style>

<?php
session_start();
include("connect.php");
$emp_id = $_SESSION['emp_id'];

if(!empty($_SESSION))
{
    include("user_home.php");
?>

<div class="container" style="width: auto;">
	  <div class="row myborder">
    <table class="table table-bordered" id="datatables" style="font-size: 12px;">
      <thead>
        <tr>
          <th>Login Date</th>
          <th>Login Time</th>
          <th>Type</th>
          <th>Project</th>
          <th>Phase</th>
          <th>Task</th>
          <th>Description</th>
          <th>Local Path</th>
          <th>%complete</th>
          <th>Logout Time</th>
          <th>Inserted DateTime</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
          $sql = "SELECT * FROM `work_report` JOIN `user_workreport_login` ON work_report.emp_id=user_workreport_login.emp_id WHERE work_report.emp_id = '$emp_id' AND work_report.user_workreport_login_id=user_workreport_login.id";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
        ?>
          <td><?php echo $row['login_date'];?></td>
          <td><?php echo $row['login_time'];?></td>
          <td><?php if($row['type']==1){echo "P";}else{echo "UP";};?></td>
          <td><?php echo $row['project_name'];?></td>
          <td><?php echo $row['phase_name'];?></td>
          <td><?php echo $row['task_name'];?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['local_path'];?></td>
          <td><?php if($row['percent_complete']==0){echo "Rejected";}elseif($row['percent_complete']==1){echo "Started";}elseif($row['percent_complete']==100){echo "Completed";}else{echo $row['percent_complete'];};?></td>
          <td><?php echo $row['logout_time'];?></td>
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
}else{
	header("Location: index.php");
}

?>


<script type="text/javascript">
  $(document).ready(function(){
  $('#datatables').DataTable();
});
</script>