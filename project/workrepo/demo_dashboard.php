<style type="text/css">
#dash{
    color: #ca3f02;
  }
.stamp-size{
  width: 23%;
  float: right;
  border-radius: 45px;
  border: 1px solid rgba(4, 3, 3, 0);
  height: 63px;
}
</style>
<?php
session_start();
include("connect.php");
if(!empty($_SESSION))
{
  include("admin_home.php");
?>
  
<div class="contain">
  <h4 class="not_str">Not Started</h4>
  <h4 class="in_pro">In Progress</h4>
  <h4 class="code">Code</h4>
  <h4 class="comple">Completed</h4>
  <hr class="hr">
  <div class="row rw">
  
  <ul id="sortable1" class="dropfalse"> <!-- First ul start -->
    <?php 
      $sql_select = "SELECT * FROM `work_report_data` WHERE ul_index=0 AND active_status=1 ORDER BY li_index";
      $results = $conn->query($sql_select);
      if($results->num_rows>0)
      {
        while($rows=$results->fetch_assoc())
        {
          $sqlAssignData = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rows['task_id']."";
          $result = $conn->query($sqlAssignData);
          if($result->num_rows>0)
          {
            while($row=$result->fetch_assoc())
            {

                if($rows['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rows['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
    ?>

    <li id="<?php echo $row['created_task_id'];?>" class="ui-state-default">
    <div class="<?php echo $border_left;?>">
    <?php //For Users Image 
      $sqlforimage = "SELECT * FROM users WHERE emp_id='".$row['emp_id']."'"; 
      $resultforimage = $conn->query($sqlforimage);
        if($resultforimage->num_rows > 0)
        {
          while($rowforimage = $resultforimage->fetch_assoc())
          {
            echo '<img class="stamp-size" src="image/'.$rowforimage['photo'].'">';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php //For Project
      $sqlforproject = "SELECT * FROM project_details WHERE id='".$row['project_id']."'";
      $resultforproject = $conn->query($sqlforproject);
        if($resultforproject->num_rows > 0)
        {
          while($rowforproject = $resultforproject->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforproject['project_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
    <?php
      $sqlforphase = "SELECT * FROM phase_details WHERE id='".$row['phase_id']."'";
      $resultforphase = $conn->query($sqlforphase);
      if($resultforphase->num_rows > 0)
        {
          while($rowforphase = $resultforphase->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforphase['phase_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php
      $sqlfortask = "SELECT * FROM create_task WHERE id='".$row['created_task_id']."'";
      $resultfortask = $conn->query($sqlfortask);
      if($resultfortask->num_rows > 0)
        {
          while($rowfortask = $resultfortask->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowfortask['task_name'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <span><button type="button" class="btnss" data-toggle="modal" data-target="#description" onclick="desc(<?php echo $row['created_task_id'];?>)">Descirption</button> This describes the task...</span>
    </div>
    </li>
    <?php } } } } 
      else { ?> <label>Drop here</label><?php } ?>       
  </ul>
  <!-- First ul End -->

    <!-- Second ul start -->
    <ul id="sortable2" class="dropfalse">
          <?php 
      $sql_select = "SELECT * FROM `work_report_data` WHERE ul_index=1 AND active_status=1 ORDER BY li_index";
      $results = $conn->query($sql_select);
      if($results->num_rows>0)
      {
        while($rows=$results->fetch_assoc())
        {
          $sqlAssignData = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rows['task_id']."";
          $result = $conn->query($sqlAssignData);
          if($result->num_rows>0)
          {
            while($row=$result->fetch_assoc())
            {

                if($rows['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rows['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
    ?>

    <li id="<?php echo $row['created_task_id'];?>" class="ui-state-default">
    <div class="<?php echo $border_left;?>">
    <?php //For Users Image 
      $sqlforimage = "SELECT * FROM users WHERE emp_id='".$row['emp_id']."'"; 
      $resultforimage = $conn->query($sqlforimage);
        if($resultforimage->num_rows > 0)
        {
          while($rowforimage = $resultforimage->fetch_assoc())
          {
            echo '<img class="stamp-size" src="image/'.$rowforimage['photo'].'">';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php //For Project
      $sqlforproject = "SELECT * FROM project_details WHERE id='".$row['project_id']."'";
      $resultforproject = $conn->query($sqlforproject);
        if($resultforproject->num_rows > 0)
        {
          while($rowforproject = $resultforproject->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforproject['project_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
    <?php
      $sqlforphase = "SELECT * FROM phase_details WHERE id='".$row['phase_id']."'";
      $resultforphase = $conn->query($sqlforphase);
      if($resultforphase->num_rows > 0)
        {
          while($rowforphase = $resultforphase->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforphase['phase_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php
      $sqlfortask = "SELECT * FROM create_task WHERE id='".$row['created_task_id']."'";
      $resultfortask = $conn->query($sqlfortask);
      if($resultfortask->num_rows > 0)
        {
          while($rowfortask = $resultfortask->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowfortask['task_name'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <span><button type="button" class="btnss" data-toggle="modal" data-target="#description" onclick="desc(<?php echo $row['created_task_id'];?>)">Descirption</button> This describes the task...</span>
    </div>
    </li>
    <?php } } } } 
      else { ?> <label>Drop here</label><?php } ?>
    </ul>
    <!-- Second ul End -->

    <ul id="sortable3" class="dropfalse">
      <?php 
      $sql_select = "SELECT * FROM `work_report_data` WHERE ul_index=3 AND active_status=1 ORDER BY li_index";
      $results = $conn->query($sql_select);
      if($results->num_rows>0)
      {
        while($rows=$results->fetch_assoc())
        {
          $sqlAssignData = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rows['task_id']."";
          $result = $conn->query($sqlAssignData);
          if($result->num_rows>0)
          {
            while($row=$result->fetch_assoc())
            {

                if($rows['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rows['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
    ?>

    <li id="<?php echo $row['created_task_id'];?>" class="ui-state-default">
    <div class="<?php echo $border_left;?>">
    <?php //For Users Image 
      $sqlforimage = "SELECT * FROM users WHERE emp_id='".$row['emp_id']."'"; 
      $resultforimage = $conn->query($sqlforimage);
        if($resultforimage->num_rows > 0)
        {
          while($rowforimage = $resultforimage->fetch_assoc())
          {
            echo '<img class="stamp-size" src="image/'.$rowforimage['photo'].'">';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php //For Project
      $sqlforproject = "SELECT * FROM project_details WHERE id='".$row['project_id']."'";
      $resultforproject = $conn->query($sqlforproject);
        if($resultforproject->num_rows > 0)
        {
          while($rowforproject = $resultforproject->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforproject['project_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
    <?php
      $sqlforphase = "SELECT * FROM phase_details WHERE id='".$row['phase_id']."'";
      $resultforphase = $conn->query($sqlforphase);
      if($resultforphase->num_rows > 0)
        {
          while($rowforphase = $resultforphase->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforphase['phase_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php
      $sqlfortask = "SELECT * FROM create_task WHERE id='".$row['created_task_id']."'";
      $resultfortask = $conn->query($sqlfortask);
      if($resultfortask->num_rows > 0)
        {
          while($rowfortask = $resultfortask->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowfortask['task_name'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <span><button type="button" class="btnss" data-toggle="modal" data-target="#description" onclick="desc(<?php echo $row['created_task_id'];?>)">Descirption</button> This describes the task...</span>
    </div>
    </li>
    <?php } } } } 
      else { ?> <label>Drop here</label><?php } ?>
    </ul>

    <ul id="sortable4" class="dropfalse">
    <?php 
      $sql_select = "SELECT * FROM `work_report_data` WHERE ul_index=3 AND active_status=1 ORDER BY li_index";
      $results = $conn->query($sql_select);
      if($results->num_rows>0)
      {
        while($rows=$results->fetch_assoc())
        {
          $sqlAssignData = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rows['task_id']."";
          $result = $conn->query($sqlAssignData);
          if($result->num_rows>0)
          {
            while($row=$result->fetch_assoc())
            {

                if($rows['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rows['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
    ?>

    <li id="<?php echo $row['created_task_id'];?>" class="ui-state-default">
    <div class="<?php echo $border_left;?>">
    <?php //For Users Image 
      $sqlforimage = "SELECT * FROM users WHERE emp_id='".$row['emp_id']."'"; 
      $resultforimage = $conn->query($sqlforimage);
        if($resultforimage->num_rows > 0)
        {
          while($rowforimage = $resultforimage->fetch_assoc())
          {
            echo '<img class="stamp-size" src="image/'.$rowforimage['photo'].'">';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php //For Project
      $sqlforproject = "SELECT * FROM project_details WHERE id='".$row['project_id']."'";
      $resultforproject = $conn->query($sqlforproject);
        if($resultforproject->num_rows > 0)
        {
          while($rowforproject = $resultforproject->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforproject['project_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
    <?php
      $sqlforphase = "SELECT * FROM phase_details WHERE id='".$row['phase_id']."'";
      $resultforphase = $conn->query($sqlforphase);
      if($resultforphase->num_rows > 0)
        {
          while($rowforphase = $resultforphase->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowforphase['phase_title'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <?php
      $sqlfortask = "SELECT * FROM create_task WHERE id='".$row['created_task_id']."'";
      $resultfortask = $conn->query($sqlfortask);
      if($resultfortask->num_rows > 0)
        {
          while($rowfortask = $resultfortask->fetch_assoc())
          {
            echo '<label class="lft_stl">'.$rowfortask['task_name'].'</label><br/>';
          }
        }
        else{
          echo "No data";
        }
    ?>
    <span><button type="button" class="btnss" data-toggle="modal" data-target="#description" onclick="desc(<?php echo $row['created_task_id'];?>)">Descirption</button> This describes the task...</span>
    </div>
    </li>
    <?php } } } } 
      else { ?> <label>Drop here</label><?php } ?>
    </ul>
  </div>
</div>

  

 <!-- Modal -->
  <div class="modal fade" id="issue_reg" role="dialog">
    <div class="modal-dialog modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Issue</h4>
        </div>
        <div class="modal-body">

          <div class="row">
          <form action="" method="" >
            <div class="form-group col-md-2">
              <input type="text" name="" class="form-control" placeholder="Issue Title">
            </div>
             <div class="col-md-2">
              <input type="text" name="" class="form-control" placeholder="Details">
            </div>
             <div class="col-md-2">
              <input type="text" name="" class="form-control" placeholder="Origin">
            </div>
             <div class="col-md-2">
              <select name="" id="" class="form-control">
                <option>Blocker</option>
                <option>Critical</option>
                <option>Major</option>
                <option>Minor</option>
              </select>
            </div>
             <div class="col-md-2">
              <select name="" id="" class="form-control">
                <option>Tech</option>
                <option>Non-tech</option>
              </select>
            </div>
             <div class="col-md-2">
              <input type="submit" name="" class="btn btn-default">
            </div>
          </form>
          </div>
          <div class="row">
            <div class="col-md-12 myborders">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Issue Title</th>
                  <th>Details</th>
                  <th>Origin</th>
                  <th>Status Type</th>
                  <th>Issue Type</th>
                  <th>Issue Status</th>
                  <th>User</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
                  <td>5</td>
                  <td>6</td>
                  <td><select name="" id="" class="form-control"><option>Open</option><option>Close</option><option>Reopened</option></select></td>
                  <td><select name="" id="" class="form-control"><option></option></select></td>
                  <td><button type="button" class="btn btn-default">Assign</button></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <!-- Modal -->
  <div class="modal fade" id="description" role="dialog">
    <div class="modal-dialog modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Description</h4>
        </div>
        <div class="modal-body">
        <div class="row">
           <div class="col-md-12">
             <table class="table table-bordered">
               <thead>
                 <tr>
                   <th>Task Name</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                   <th></th>
                   <th></th>
                 </tr>
               </thead>
               <tbody>
                <?php
                  if (isset($_POST['task_id'])) {
                      $id=$_POST['task_id'];
                      echo $id;
                  }
                  else{
                      $id=0;
                  }
                  $sql = "SELECT * FROM create_task WHERE id = '$id' ";
                  $result = $conn->query($sql);
                  if($result->num_rows>0)
                    {
                      while ($rows = $result->fetch_assoc()) 
                      {
                        echo "<tr>";
                        echo "<td>".$rows['task_name']."</td>";
                        echo "<td>".$rows['start_date']."</td>";
                        echo "<td>".$rows['end_date']."</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                 } } else{ echo "no data"; } ?>
               </tbody>
             </table>
           </div>
        </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<?php }
else{ 
  header("Location: index.php"); 
  } ?>





  <script>
  $( function() {
    $( "ul.droptrue" ).sortable({
      connectWith: "ul"
    });
 
    $( "ul.dropfalse" ).sortable({
      connectWith: "ul",
      dropOnEmpty: false,
      update: function( event, ui ) {
        if (this === ui.item.parent()[0]){
      var liId = ui.item.attr("id");
      var liIndex = ui.item.index();
      var ulIndex = $(this).index();
      //alert("li " +liIndex);
      //alert("ul "+ulIndex);
      //alert("liId " + liId);
      $.ajax({
            type: 'POST',
            url: 'work_report_data.php',
            data: {
              liId: liId,
              liIndex: liIndex,
              ulIndex: ulIndex 
      },
       success: function(data){
       if(data == 2)
       {
       // alert('delay');
         $('#'+liId).addClass("border_delay"); 
       }
       if(data == 1)
       {
        //alert('ontime');
         $('#'+liId).addClass("border_ontime");
       }
       if(data == 0)
       {
         //alert('before'+ data + ' ' +liId);
         $('#'+liId).addClass("border_before");
       }
       window.location.reload();
      }
    }); } } });
    $( "#sortable1, #sortable2, #sortable3, #sortable4" ).disableSelection();
  });


function desc(created_task_id)
{
  //alert(created_task_id);
  $.ajax({
    type: 'POST',
    url: 'admin_dashbord.php',
    data: {"task_id" : created_task_id},
    success: function(data){
        //alert( data );
    }
});
}

$(document).ready(function(){

 var ids = $(".border-left").attr('id');
 $('#'+ids).addClass("boreder-delay");

});


</script>