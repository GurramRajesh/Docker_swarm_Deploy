<style type="text/css">
	#payroll{
		color: #ca3f02;
	}
</style>


<?php
session_start();
include("connect.php");
$emp_id = $_GET['id'];
include("admin_home.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 box"><a href="payroll.php" class="pull-right">Payroll</a>
			<div class="col-md-2" style="padding-top:10px; padding-bottom:10px;">
				<select class="form-control" name="" id="">
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sep</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>
			</div>
			<div class="col-md-2" style="padding-top:10px; padding-bottom:10px;">
			<select class="form-control"><option>2017</option></select></div>
			<div id="printable">
			<table class="table table-bordered">
				<tbody>
					<?php
						$sql_select = "SELECT * FROM users WHERE emp_id='$emp_id'";
						$result = $conn->query($sql_select);
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
					?>
					<tr>
						<th>Name</th>
						<td><?php echo $row['first_name'];?> <?php echo $row['middle_name'];?> <?php echo $row['last_name'];?></td>
						<th>Employee Id</th>
						<td><?php echo $row['emp_id'];?></td>
					</tr>
					<tr>
						<th>Designation</th>
						<td><?php echo $row['designation'];?></td>
						<th>PF No.</th>
						<td>NB/BD/2541/5475</td>
					</tr>
					<tr>
						<th>Grade</th>
						<td>A 1</td>
						<th>Date of Joining</th>
						<td>17 Jan 2017</td>
					</tr>
					<tr>
						<th>Department</th>
						<td>Software Development</td>
						<th>Bank Acc No.</th>
						<td>6660010008801</td>
					</tr>
					<tr>
						<th>Working Days</th>
						<td><?php echo date('t');?></td>
						<th>Days Payable</th>
						<td>30</td>
					</tr>
					<?php }
					} else{ echo "0 result";} ?>
				</tbody>
			</table>
	
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th class="cen">Earnings</th>
						<th>Rs.</th>
						<th class="cen">Deduction</th>
						<th>Rs.</th>
					</tr>
					<tr>
						<td>BASIC</td>
						<td></td>
						<td>PF</td>
						<td></td>
					</tr>
					<tr>
						<td>CONVEYANCE ALLOW</td>
						<td></td>
						<td>PROFESSIONAL TAX</td>
						<td></td>
					</tr>
					<tr>
						<td>PERS PAY ALLOWANCE</td>
						<td></td>
						<td>INCOME TAX</td>
						<td></td>
					</tr>
					<tr>
						<td>ADVANCE BONUS/EXGRATIA</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th class="cen">Total Earnings</th>
						<td></td>
						<th class="cen">Total Deduction</th>
						<td></td>
					</tr>
				
				</tbody>
			</table>
			<div><span>Net Pay : </span><label>Rs. 10000 (Ten thousands Only)</label></div>
			<div><label>It's Computer generated receipt need no signature</label></div>
			</div>
			<input type="button" onclick="printDiv('printable')" value="print!" class="btn btn-primary" />
		</div>
	</div>
</div>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
