<?php
include("connect.php");
$status = $_POST['id'] == 1?0:1;

$month = $_POST['month_id'];

$str_explode=explode(",",$month);

$month_id = $str_explode[0]; 	
$holiday_date = $str_explode[1];


$update = "UPDATE `holidays` SET `status`= '$status' WHERE month = '$month_id' AND holiday_date = '$holiday_date'";
if($conn->query($update) === TRUE)
{
	echo "Record updated successfully";
}
else{
	echo "not updated";
}


?>