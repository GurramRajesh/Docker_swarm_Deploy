<style type="text/css">
  #task{
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
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql = "SELECT *,create_task.id as task_id FROM `create_task` JOIN assign_task ON create_task.id = assign_task.created_task_id JOIN `task_status` ON create_task.id=task_status.created_task_id WHERE task_status.emp_id = '$emp_id' AND task_status.task_status = 0 AND task_status.status='Waiting'";
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
              <td><button type="button" class="btn btn-default" data-dismiss="modal" onclick="start('<?php echo $row['task_id'];?>,<?php echo $_SESSION['emp_id'];?>')">Start</button>
                  <button type="button" class="btn btn-default rej" data-toggle="modal" data-target="#myModal" id="<?php echo $row['task_id'];?>">Reject</button>
              </td>
            </tr>
             <?php } }
            else{
                  echo "You have no task";
              }?>
            
          </tbody>
      </table>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
              <form method="POST" class="form-horizontal" action="reject_reason_insert.php">
              <div class="form-group">
                  <label class="col-md-2">Reason : </label>
                  <div class="col-md-8">
                    <input type="text" name="reason" id="reason" class="form-control">
                  </div>
  <input type="hidden" name="emp_id" value="<?php echo $emp_id;?>">
  <input type="hidden" name="task_id" id="task_id" value="">
              </div>
              <input type="submit" value="Submit" class="btn btn-default" name="submit">
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php
}
else{
  header("Location: index.php");
}
?>
<script type="text/javascript">
$('.rej').click(function(){
  var id=$(this).attr('id');
  document.getElementById('task_id').value = id;
});

function start(task_id) {
 $.ajax({
    url: 'start_task.php',
    type: 'post',
    data: {
      task_id: task_id
    },
    success: function(data){
      window.location.reload();
    }
  });
}
</script>
