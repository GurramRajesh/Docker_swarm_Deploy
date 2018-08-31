<style type="text/css">
	.form-control{
		margin-left: -55px;
		width: 110%;
	}
	#adduser{
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
	<div class="row">
		<div class="col-md-8 col-md-offset-3 myborder">
		<h4>Add User</h4>
		<hr>
		<form class="form-horizontal" method="POST" action="user_data_insert.php" enctype="multipart/form-data">
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Employee Id : </label>
				<div class="col-md-8">
					<input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Employee Id" >
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">First Name : </label>
				<div class="col-md-8">
					<input type="text" name="first_name" id="first_name" class="form-control " placeholder="First Name" >
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Middle Name : </label>
				<div class="col-md-8">
					<input type="text" name="mid_name" id="mid_name" class="form-control " placeholder="Middle Name" >
							
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Last Name : </label>
				<div class="col-md-8">
					<input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" >
					
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Mobile No : </label>
				<div class="col-md-8">
					<input type="number" name="mobileno" id="mobileno" class="form-control " placeholder="Mobile No">
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Email Id : </label>
				<div class="col-md-8">
					<input type="email" name="emailid" id="emailid" class="form-control " placeholder="Email Id">
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Designation : </label>
				<div class="col-md-8">
					<input type="text" name="designation" id="designation" class="form-control " placeholder="Designation">
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Salary : </label>
				<div class="col-md-8">
					<input type="text" name="salary" id="salary" class="form-control " placeholder="Salary">
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Status : </label>
				<div class="col-md-8">
					<select class="form-control" name="status" id="status">
						<option value="1">Active</option>
						<option value="0">InActive</option>
					</select>
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Employment Type : </label>
				<div class="col-md-8">
					<select class="form-control" name="employmenttype" id="employmenttype">
						<option value="0">Full Time</option>
						<option value="1">Part Time</option>
						<option value="2">Freelancer</option>
					</select>
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">User Name : </label>
				<div class="col-md-8">
					<input type="text" name="user_name" id="user_name" class="form-control " placeholder="User Name" >
					
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-4">Password : </label>
				<div class="col-md-8">
					<input type="password" name="password" id="password" class="form-control " placeholder="Password">
				</div>
			</div>
			<!--Input Form-->
			<div class="form-group">
				<label class="col-md-3">File : </label>
				<div class="col-md-8">
					<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
			</div>

			<div class="pull-right">
				<input type="submit" value="Submit" class="btn btn-info" name="submit">
			</div>
		</form>	
		</div>
	</div>
</div>
<?php }
else{
	header("Location: admin_login.php");
} ?>