<?php
include('connect.php');
$month = $_POST['month'];
for($i=0;$i<=sizeof($_POST['holiday_date']);$i++){

	if($_POST['holiday_date'][$i]!=''){

		$_POST['holiday_date'][$i];
		$val = $_POST['holiday_date'][$i];
		$reason = $_POST['holi_reason'][$val-1];
		$sql = "INSERT INTO holidays (month, holiday_date, reason) VALUES ('$month', '$val', '$reason')";
		if($conn->query($sql) === TRUE)
		{
			//echo "inserted";
			header("Location: holiday.php");
		}
		else{
			//echo "not inserted";
			header("Location: holiday.php");
		}
	}
}




?>