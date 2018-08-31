<?php
session_start();
include("connect.php");
$empid = $_GET['id'];
if(!empty($_SESSION))
{
	include("admin_home.php");
?>

<div class="container contai">
<div class="row box">
 <a href="list_of_user.php" class="btn pull-right">List of User</a>
<h4 style="text-align:center;">Employee Details</h4>
<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Emp Id</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Mobile No</th>
				<th>Email Id</th>
				<th>Designation</th>
				<th>Salary</th>
				<th>Status</th>
				<th>Employment Type</th>
				<th>Local Add</th>
				<th>Emrg No</th>
				<th>Permanent No</th>
				<th>Emrg No</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "select * from users where emp_id = '$empid'";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
			?>
			<tr>
				<td><?php echo $row['emp_id'];?></td>
				<td><?php echo $row['first_name'];?></td>
				<td><?php echo $row['middle_name'];?></td>
				<td><?php echo $row['last_name'];?></td>
				<td><?php echo $row['mobile_no'];?></td>
				<td><?php echo $row['email_id'];?></td>
				<td><?php echo $row['designation'];?></td>
				<td><?php echo $row['salary'];?></td>
				<td><?php if($row['status']==1){echo "Active";}else{echo "Inactive";};?></td>
				<td><?php if($row['employment_type']==0){echo "Full Time";}elseif($row['employment_type']==1){echo "Part Time";}else{echo "Freelance";};?></td>
				<td><?php echo $row['local_address'];?></td>
				<td><?php echo $row['local_emergency_contact'];?></td>
				<td><?php echo $row['permanent_address'];?></td>
				<td><?php echo $row['permanenet_emergency_contact'];?></td>
			</tr>
			<?php } }
			else{
				echo "0 result";
			}?>
		</tbody>
	</table>
</div>
<div class="row box1">
<h4 style="text-align:center;">Bank Details</h4>
<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Bank Name</th>
				<th>Acc. No</th>
				<th>Branch Name</th>
				<th>Holder Name</th>
				<th>IFSC Code</th>
				<th>Branch Code</th>
				<th>Swift Code</th>
				<th>Acc. Type</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `bank_details` WHERE `emp_id`	 = '$empid'";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{ 
			?>
			<tr>
				<td><?php echo $row['bank_name'];?></td>
				<td><?php echo $row['account_no'];?></td>
				<td><?php echo $row['branch_name'];?></td>
				<td><?php echo $row['account_holder_name'];?></td>
				<td><?php echo $row['ifsc_code'];?></td>
				<td><?php echo $row['branch_code'];?></td>
				<td><?php echo $row['swift_code'];?></td>
				<td><?php if($row['account_type']==0){echo "Saving";}elseif($row['account_type']==1){echo "Current";}else{echo "Personal";};?></td>
			</tr>
			<?php } }
			else{
				echo "Bank Details not added";
			}?>
		</tbody>
	</table>
</div>

<div class="row box1">
<h4 style="text-align:center;">Appraisal</h4>
<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>% hike</th>
				<th>Effective</th>
				<th>From Date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `appraisal` WHERE `emp_id`	 = '$empid'";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{ 
			?>
			<tr>
				<td><?php echo $row['percent_hike'];?></td>
				<td><?php echo $row['effective'];?></td>
				<td><?php echo $row['from_date'];?></td>
				<td><?php if($row['status']==1){echo "Active";}else{echo "InActive";};?></td>
			</tr>
			<?php } }
			else{
				echo "No Appraisal for this Employee";
			}?>
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