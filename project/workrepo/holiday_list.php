<?php
session_start();
include("connect.php");
$month_id = $_POST['month_id'];
$sql = "SELECT * FROM `holidays` WHERE `month` = '$month_id'";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>".'';
			if($row["month"]==1){echo "January";}elseif($row["month"]==2){echo "February";}elseif($row["month"]==3){echo "March";}elseif($row["month"]==4){echo "April";}elseif($row["month"]==5){echo "May";}elseif($row["month"]==6){echo "June";}elseif($row["month"]==7){echo "July";}elseif($row["month"]==8){echo "August";}elseif($row["month"]==9){echo "September";}elseif($row["month"]==10){echo "October";}elseif($row["month"]==11){echo "November";}else{echo "December";}
			'"'."</td>";
		echo "<td>".$row['holiday_date']."</td>";
		echo "<td>".$row['reason']."</td>";
		echo "<td>".'<label class="switch"><input type="checkbox" id="'.$row["month"].','.$row["holiday_date"].'" value="'.$row["status"].'"'; 
			if($row["status"]==1){echo 'checked';}
		echo "".' onclick=sujeet(this.value,this.id);><div class="slider round"></div></label>'."</td>";
		echo "</tr>";
	} }
else{
	echo "<tr>";
	echo "<td colspan='4'>Please Add Holiday</td>";
	echo "</tr>";
	}	
?>