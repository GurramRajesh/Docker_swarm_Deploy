<style type="text/css">
	#holiday{
		color: #ca3f02;
	}
	
}
</style>
<?php
session_start();
include("connect.php");
if(!empty($_SESSION))
{
	include("admin_home.php");	

?>
<div class="container cont">
	<div class="row">
		<div class="col-md-8 box">
		<h4>Holiday Dates</h4>
		<hr>
			<form class="form-horizontal" method="POST" action="insert_data_for_holiday.php">
			<!--Input Form-->
			<div class="form-group col-md-3">
				<select class="form-control" name="month" id="month_name">
					<option value="0">Select Month</option>
					<option value="01">JANUARY</option>
				    <option value="02">FEBRUARY</option>
				    <option value="03">MARCH</option>
				    <option value="04">APRIL</option>
				    <option value="05">MAY</option>
				    <option value="06">JUNE</option>
				    <option value="07">JULY</option>
				    <option value="08">AUGUST</option>
				    <option value="09">SEPTEMBER</option>
				    <option value="10">OCTOBER</option>
				    <option value="11">NOVEMBER</option>
				    <option value="12">DECEMBER</option>
				</select>
			</div>
			<span class="badge">2017</span>
		
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Holiday Dates</th>
						<th>Holiday Dates</th>
						<th>Holiday Dates</th>
					</tr>
				</thead>
				<tbody id="data">
					<?php
					$index = 1;
				    for($i=1; $i<=11; $i++)
				        {
				         echo "<tr>";
				         for($j=1; $j<=3; $j++)
				           {
				          echo "<td id='".$index."'>";
				          echo '<input type="checkbox" name="holiday_date[]" value="'.$index.'" class="reason"> '.$index.' <input type="text" name="holi_reason[]" id="'.$index++.'" class="reason">';
				          echo "</td>"; 
				           }
				         echo "</tr>";
				        }
					?>
				</tbody>
			</table>
			<div class="pull-right">
				<input type="submit" value="Submit" class="btn btn-primary" name="submit">
			</div>
			</form>
		</div>

		<div class="col-md-4 box">
			<h4>Holiday List</h4>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Month Name</th>
						<th>Holiday Date</th>
						<th>Holiday Reason</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody id="reason_data">
					<tr>
						<td colspan="4">Holiday list</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php }
else{
	header("Location: admin_login.php");
} ?>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById('32').style.display="none";
    document.getElementById('33').style.display="none";
$("#month_name").change(function(){
    month = $(this).val();
    var id = month;
   	$.ajax({
        url: 'holiday_list.php',
        type: 'POST',
        data: {
            month_id: id
        },
        success: function(data) {
        	document.getElementById("reason_data").innerHTML=data;
        }
    });

    if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12)
    {
    	document.getElementById('30').style.display="";
    	document.getElementById('31').style.display="";
    }

	if(month == 4 || month == 6 || month == 9 || month == 11)
	{
    	document.getElementById('31').style.display="none";
	}
	
	if(month == 2)
	{
		document.getElementById('30').style.display="none";
		document.getElementById('31').style.display="none";
	}
	else
	{
		document.getElementById('30').style.display="";
	}    
});
});
//get month from ddn
// for april,june
// for textbox id > 30
// 	hide


// for January,March
// for textbox id > 31
// 	hide

// for February year % 4 ==0
// for textbox id > 29
// 	hide
// else
// 	>28

function sujeet(id,value){
	$.ajax({
        url: 'holiday_date_status.php',
        type: 'POST',
        data: {
            id: id,
            month_id: value
        },
        success: function(data) {
            //$('#issue_status').val(data);
        }
    });
}
</script>
