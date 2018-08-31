<style type="text/css">
	#task{
		color: #ca3f02;
	}
</style>
<?php
session_start();
include("connect.php");
if(!empty($_SESSION))
{
	include("user_home.php");


?>
<div class="container">
<div class="row ">
	<div class="col-md-12 col-sm-12 task_box">
	<h4>Create and Assign Task</h4>
	<hr>
	<form class="form-horizontal" method="POST" action="task_data_insert.php">
		<!--Input Form-->
		<div class="col-md-3 col-sm-3">
			<input type="text" name="task_name" id="task_name" class="form-control " placeholder="Task Name">
		</div>

		<!--Input Form-->
		<div class="col-md-3 col-sm-3">
			<select id="emp_name" name="emp_name[]" class="multiselect-ui form-control" multiple="multiple">
			 <?php
		 		$sql ="SELECT * FROM users";
		 		$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
				while($row = $result->fetch_assoc())
				{
			 ?>
	            <option value="<?php echo $row['emp_id'];?>"><?php echo $row['first_name'];?></option>
	            <?php } }
	            else{
	            	echo "0 results";
	            }?>
	        </select>
		</div>

		<!--Input Form-->
		<div>
			<input type="hidden" name="project" id="project" value="1" class="form-control">
		</div>

		<!--Input Form-->
		<div>
			<input type="hidden" name="start_date" id="start_date" class="form-control" placeholder="Start Date" value="1">
		</div>

		<!--Input Form-->
		<div>
			<input type="hidden" name="end_date" id="end_date" class="form-control" placeholder="End Date" value="1">
		</div>
		
		<!--Input Form-->
		<div>
		<input type="hidden" name="phase" id="phase" value="1" class="form-control">
			 
		</div>
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
	</form>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 taskbox">
	<h4>Task Status</h4>
	<hr>
		<table class="table table-bordered" id="datatables">
			<thead>
				<tr>
					<th>Emp Id</th>
					<th>Task Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sqlAssigntask = "SELECT *,create_task.start_date AS startdate, create_task.end_date AS enddate FROM `assign_task` JOIN create_task ON assign_task.created_task_id=create_task.id JOIN project_details ON create_task.project_id=project_details.id JOIN phase_details ON create_task.phase_id=phase_details.id JOIN task_status ON create_task.id=task_status.created_task_id";
				$data = $conn->query($sqlAssigntask);
				if($data->num_rows > 0)
				{
					while($rows = $data->fetch_assoc())
					{
				?>
				<tr>
					<td><?php echo $rows['emp_id'];?></td>
					<td><?php echo $rows['task_name'];?></td>
					<td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal" onclick="description(<?php echo $rows['project_id'];?>,<?php echo $rows['phase_id'];?>,<?php echo $rows['created_task_id'];?>)">Description</button></td>
				</tr>
				<?php
				}
				}
				else{ echo "Task has not been ed to any one";
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
          <h4 class="modal-title">Description</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<form class="form-horizontal" method="POST" action="task_description.php" enctype="multipart/form-data">
          		<div class="form-group">
          			<label class="col-md-2"></label>
          			<div class="col-md-8">
          			<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
          			</div>
          		</div>
          		<input type="hidden" name="description_title" id="description_title" value="Description">
          		<input type="hidden" name="project_id"  id="project_id">
          		<input type="hidden" name="phase_id" id="phase_id">
          		<input type="hidden" name="created_task_id" id="task_id">
          		<div class="form-group">
          			<label class="col-md-2"></label>
          			<div class="col-md-8">
          			<input type="file" name="fileToUpload" id="fileToUpload" class="">
          			</div>
          		</div>
          	
          		<input type="submit" name="submit" value="Submit" class="btn btn-default bt">
          	</form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal End -->

</div>
</body>
</html>
<?php
}
else{
	header("Location: index.php");
}
?>






<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        //includeSelectAllOption: true
        nonSelectedText :'Select Employee'
    });
});

$(document).ready(function(){

$('[data-toggle="popover"]').popover();
$('#datatables').DataTable();

});


$(function(){
    $("#end_date").datepicker({ dateFormat: 'yy/mm/dd'}).bind("change",function(){
    var minValue = $(this).val();
    minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
    minValue.setDate(minValue.getDate()+1);
    })

    $("#start_date").datepicker({ dateFormat: 'yy/mm/dd'}).bind("change",function(){
    var minValue = $(this).val();
    minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
    minValue.setDate(minValue.getDate()+1);
    })
});


function description(project_id,phase_id,created_task_id) {
	$('#project_id').val(project_id);
	$('#phase_id').val(phase_id);
	$('#task_id').val(created_task_id);

}
</script>
