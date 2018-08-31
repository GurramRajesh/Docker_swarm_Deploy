<style type="text/css">
	#home{
		color: #ca3f02;
	}
</style>
<?php
session_start();
include("connect.php");
if(!empty($_SESSION))
{
	include("admin_home.php");
?>
<div class="container">
<div class="row ">
	<div class="col-md-12 col-sm-12 box">
	<h4>Create Project</h4>
	<hr>
	<form class="form-horizontal" method="POST" action="project_insert_data.php">
		<!--Input Form-->
		<div class="col-md-3 col-sm-3">
			<input type="text" name="project_title" id="project_title" class="form-control " placeholder="Project Title">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assigns">
			<input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assigns">
			<input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assigns">
			 <input type="text" name="department" id="department" class="form-control" placeholder="Department">
		</div>
		<div class="col-md-2 col-sm-2 assigns">
			<input type="text" name="incharge" id="incharge" class="form-control " placeholder="Incharge">
		</div>
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
	</form>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 boxs">
	<h4>Project Details</h4>
	<hr>
		<table class="table table-bordered" id="datatables">
			<thead>
				<tr>
					<th>Project Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Department</th>
					<th>Incharge</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM `project_details`";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
				?>
				<tr>
					<td><?php echo $row['project_title'];?></td>
					<td><?php echo $row['start_date'];?></td>
					<td><?php echo $row['end_date'];?></td>
					<td><?php echo $row['department'];?></td>
					<td><?php echo $row['incharge'];?></td>
					<td><a href="create_project_phase.php" class="btn btn-default" title="Add Project Phase"><span class="glyphicon glyphicon-plus"></span></a></td>
				</tr>
				<?php
				}
				}
				else{ echo "Task has not been assignsed to any one";
				}?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php
}
else{
	header("Location: index.php");
}


?>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
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
</script>