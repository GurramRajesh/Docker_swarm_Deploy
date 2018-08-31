<?php
session_start();
include('connect.php');

$task_id = $_POST['task_id'];
$sqlIssue = "SELECT *,issue_details.id as issueid FROM issue_details JOIN users ON issue_details.emp_id=users.emp_id WHERE issue_details.task_id='$task_id'";
  $resultforissue = $conn->query($sqlIssue);
  if($resultforissue->num_rows>0)
  {
    $i=0;
    while($rwoforissue = $resultforissue->fetch_assoc())
    { 
    	echo "<tr>";
      	echo "<td>".$rwoforissue['issue_title']."</td>";
      	echo "<td>".$rwoforissue['first_name']."</td>";
      	echo "<td>".$rwoforissue['issue_details']."</td>";
      	echo "<td>".$rwoforissue['issue_origin']."</td>";
      	echo "<td>";
      		if($rwoforissue['issue_type']==1){echo "Blocker";}
      		elseif($rwoforissue['issue_type']==2){echo "Critical";}
      		elseif($rwoforissue['issue_type']==3){echo "Major";}
      		elseif($rwoforissue['issue_type']==4){echo "Minor";}

      		 "</td>";
      	echo "<td>";
      		 if($rwoforissue['issue_tech_nontech']==1){echo "Technical";}
      		 else{echo "Non-Tech";}
      		 "</td>";
      	echo "<td>";
      		$sqlissuestatus = "SELECT * FROM issue_assign WHERE task_id=".$rwoforissue['task_id']."";
      		$resultforissuestatus = $conn->query($sqlissuestatus);
      		if($resultforissuestatus->num_rows>0)
      		{	
      			while($rowissuestatus = $resultforissuestatus->fetch_assoc())
      			{
      				if($rowissuestatus['issue_status']==0)
		      		{
		      			echo "Closed";
		      		}
		      		else
		      		{
		      			echo "<select name='issue_status' id='issue_status_".$i."' class='form-control'>
		      			<option value='1'>Open</option><option value='0'>Close</option><option value='2'>Reopened</option>
		      			</select></td>";
		      		}
      			}
      		}
      	echo "<td><select name='emp_id' id='emp_id_".$i."' class='form-control'>";
      	echo "<option value=".$rwoforissue['emp_id'].">".$rwoforissue['first_name']."</option>";
      	echo "<option value='0'>Select one</option>";
  			$sql = "SELECT * FROM users";
  			$result = $conn->query($sql);
  			if($result->num_rows>0)
  			{
  				while($row = $result->fetch_assoc())
  				{
  					echo "<option value=".$row['emp_id'].">".$row['first_name']."</option>";
  				}
  			}else{ echo "No data"; }
      	echo "</select></td>";
      	echo "<td><button type='button' id='issueassignbtn' name='issueassignbtn' class='btn btn-default assign_data' onclick='test(".$rwoforissue['issueid'].",".$rwoforissue['task_id'].",".$i.")' data-dismiss='modal'>Assign</button></td>";
    	echo "</tr>";
      $i++;
	}
} 
else{ echo "No data"; }
?>


<script type="text/javascript">
  function test(issueid,task_id,i){
    var emp_id = $("#emp_id_"+i).val();
    var issue_status = $("#issue_status_"+i).val();
    $.ajax({
      type: 'post',
      url: 'issue_assign_insert.php',
      data: {
        issue_id: issueid,
        task_id: task_id,
        emp_id: emp_id,
        issue_status: issue_status
      },
      success: function(data){}
    });

  }
</script>