<style type="text/css">
	#payroll{
		color: #ca3f02;
	}
</style>


<?php
session_start();
include("connect.php");
include("admin_home.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 box">
		<h4>User List</h4>
		<hr>
			<table class="table table-bordered" id="datatables">
				<thead>
					<tr>
						<th>Employee Id</th>
						<th>Name</th>
						<th>Mobile No</th>
						<th>Email Id</th>
						<th>Designation</th>
						<th>Salary</th>
						<!-- <th>Status</th> -->
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM users";
						$result = $conn->query($sql);
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
					?>
					<tr>
						<td><?php echo $row['emp_id'];?></td>
						<td><?php echo $row['first_name'];?></td>
						<td><?php echo $row['mobile_no'];?></td>
						<td><?php echo $row['email_id'];?></td>
						<td><?php echo $row['designation'];?></td>
						<td><?php echo $row['salary'];?></td>
						<td><a href="generate_salary_slip.php?id=<?php echo $row['emp_id'];?>" class="btn btn-default" title="Employee Salary Slip">Gen Sal</a>
						</td>
					</tr>
					<?php } }
					else{
							echo "0 result";
						}?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#datatables').DataTable();
});
</script>