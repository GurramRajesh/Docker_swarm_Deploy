<style type="text/css">
	#phase{
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
	<h4>Create Project Phase</h4>
	<hr>
	<form class="form-horizontal" method="POST" action="project_phase_data.php">

		<!--Input Form-->
		<div class="col-md-2 col-sm-2">
			<select name="project" id="project" class="form-control contrl">
				<option value="0">Select Project</option>
				<?php
		 		$sql ="SELECT * FROM project_details";
		 		$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
				while($row = $result->fetch_assoc())
				{
			 ?>
	            <option value="<?php echo $row['id'];?>"><?php echo $row['project_title'];?></option>
	            <?php } }
	            else{
	            	echo "0 results";
	            }?>
			</select>
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assign">
			<input type="text" name="phase_title" id="phase_title" class="form-control contrl " placeholder="Phase Name">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assign">
			<input type="text" name="start_date" id="start_date" data-date-format="mm/dd/yyyy" class="form-control contrl" placeholder="Start Date">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assign">
			<input type="text" name="end_date" id="end_date" class="form-control contrl" placeholder="End Date">
		</div>
		<!--Input Form-->
		<div class="col-md-2 col-sm-2 assign">
			 <input type="text" name="department" id="department" class="form-control contrl" placeholder="Department">
		</div>
		<div class="col-md-2 col-sm-2 col_md">
			<input type="text" name="incharge" id="incharge" class="form-control contrl " placeholder="Incharge">
		</div>
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
	</form>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 boxs">
	<h4>Project Phase Details</h4>
	<hr>
		<table class="table table-bordered" id="datatables">
			<thead>
				<tr>
					<th>Project Name</th>
					<th>Phase Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Department</th>
					<th>Incharge</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM `phase_details` JOIN project_details ON phase_details.project_id=project_details.id";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
				?>
				<tr>
					<td><?php echo $row['project_title'];?></td>
					<td><?php echo $row['phase_title'];?></td>
					<td><?php echo $row['start_date'];?></td>
					<td><?php echo $row['end_date'];?></td>
					<td><?php echo $row['department'];?></td>
					<td><?php echo $row['incharge'];?></td>
				</tr>
				<?php
				}
				}
				else{ echo "Task has not been assigned to any one";
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