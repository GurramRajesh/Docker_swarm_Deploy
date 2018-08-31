<?php
session_start();
include("connect.php");
include("admin_home.php");
$empid = $_GET['id'];
?>

<div class="container">
	<div class="row">
		<!-- Bank Details Start -->
		<div class="col-md-12 box"> <a href="list_of_user.php" class="btn pull-right">List of User</a>
		<h4>Bank Details</h4>
		<hr>
			<form class="form-horizontal" method="POST" action="insert_bank_data.php"><!-- Form Start -->
				<!--Input Form-->
				<div class="form-group">
					<div class="col-md-3">
						<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name">
					</div>
					<div class="col-md-3">
						<input type="text" name="acc_no" id="acc_no" class="form-control" placeholder="Account Number">
					</div>
					<div class="col-md-3">
						<input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Branch Name">
					</div>
					<div class="col-md-3">
						<input type="text" name="acc_holder_name" id="acc_holder_name" class="form-control" placeholder="Account Holder Name">
					</div>
				</div>
	<input type="hidden" name="emp_id" value="<?php echo $empid;?>">
				<!--Input Form-->
				<div class="form-group">
					<div class="col-md-3">
						<input type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="IFSC Code">
					</div>
					<div class="col-md-3">
						<input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Branch Code">
					</div>
					<div class="col-md-3">
						<input type="text" name="swift_code" id="swift_code" class="form-control" placeholder="Swift Code">
					</div>
					<div class="col-md-2">
						<select name="account_type" id="account_type" class="form-control">
							<option value="0">Saving</option>
							<option value="1">Current</option>
							<option value="2">Personal</option>
						</select>
					</div>
					<div class="col-md-1">
						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</div>
				</div>
			</form>
		</div>
		<!-- Bank Details End -->

		<!-- Appraisal Details Start -->
		<div class="col-md-12 boxs">
		<h4>Appraisal</h4>
		<hr>
			<form class="form-horizontal" method="POST" action="apraisal_insert_data.php">
				<!--Input Form-->
				<div class="form-group">
					<div class="col-md-3">
						<input type="text" name="per_hike" id="per_hike" class="form-control" placeholder="% Hike">
					</div>
					<div class="col-md-3">
						<input type="text" name="effective" id="effective" class="form-control" placeholder="Effective">
					</div>
	<input type="hidden" name="emp_id" value="<?php echo $empid;?>">
					<div class="col-md-3">
						<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date">
					</div>
					<div class="col-md-2">
						<select name="status" id="status" class="form-control">
							<option value="1">Active</option>
							<option value="0">InActive</option>
						</select>
					</div>
					<div class="col-md-1">
						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</div>
				</div>
			</form>
		</div>
		<!-- Appraisal Details End -->

		<div class="col-md-12 boxs">
		<h4>Address</h4>
		<hr>
			<form class="form-horizontal" method="POST" action="user_update_address.php">
				<div class="col-md-6">
					<!-- Input Form -->
					<div class="form-group">
						<label class="col-md-3">Local Address : </label>
						<div class="col-md-8">
							<textarea class="form-control" name="local_add" id="local_add"></textarea>
						</div>
					</div>

					<!-- Input Form -->
					<div class="form-group">
						<label class="col-md-3">Emergency Contact No : </label>
						<div class="col-md-8">
							<input type="text" name="elcontact_no" id="elcontact_no" class="form-control" placeholder="Contact No">
						</div>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-4">Permanent Address : </label>
						<div class="col-md-8">
							<textarea class="form-control" name="permanent_add" id="permanent_add"></textarea>
						</div>
					</div>
	<input type="hidden" name="emp_id" value="<?php echo $empid;?>">
					<!-- Input Form -->
					<div class="form-group">
						<label class="col-md-4">Emergency Contact no : </label>
						<div class="col-md-8">
							<input type="text" name="epcontact_no" id="epcontact_no" class="form-control" placeholder="Contact No">
						</div>
					</div>
					
				</div>
				<div class="pull-right">
					<input type="submit" name="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
    $("#from_date").datepicker({ dateFormat: 'yy/mm/dd'}).bind("change",function(){
        var minValue = $(this).val();
        minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
        minValue.setDate(minValue.getDate()+1);
    })
});
</script>