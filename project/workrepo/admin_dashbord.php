<style type="text/css">
#dash{
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
  
<div class="contain">
  <h4 class="not_str">Tickets</h4>
  <h4 class="in_pro">In Progress</h4>
  <h4 class="code">Code</h4>
  <h4 class="comple">Completed</h4>
  <hr class="hr">
  <div class="row rw">
  
  <ul id="sortable1" class="dropfalse"> <!-- First ul start -->
    <?php 
      $sqlUlindexone = "SELECT * FROM `work_report_data` WHERE ul_index=0 AND active_status=1 ORDER BY li_index";
      $resultUlindexone = $conn->query($sqlUlindexone);
      if($resultUlindexone->num_rows>0)
      {
        while($rowUlindexone=$resultUlindexone->fetch_assoc())
        {
          $sqlAssignDataone = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rowUlindexone['task_id']."";
          $resultAssignUlone = $conn->query($sqlAssignDataone);
          if($resultAssignUlone->num_rows>0)
          {
            while($rowforassigndata=$resultAssignUlone->fetch_assoc())
            {
              if($rowUlindexone['progress_status'] == 1)
                  $border_left = "border_ontime";
              else if($rowUlindexone['progress_status'] == 2)
                  $border_left = "border_delay";
              else
                  $border_left = "border_before";

              include('work_report_card.php');  //Included card(li)

      } } } } 
      else { ?> <label>Drop here</label><?php } ?>       
  </ul>
  <!-- First ul End -->

    <!-- Second ul start -->
    <ul id="sortable2" class="dropfalse">
      <?php 
      $sqlUlindextwo = "SELECT * FROM `work_report_data` WHERE ul_index=1 AND active_status=1 ORDER BY li_index";
      $resultUlindextwo = $conn->query($sqlUlindextwo);
      if($resultUlindextwo->num_rows>0)
      {
        while($rowUltwo=$resultUlindextwo->fetch_assoc())
        {
          $sqlAssignDataUltwo = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rowUltwo['task_id']."";
          $resultAssignUltwo = $conn->query($sqlAssignDataUltwo);
          if($resultAssignUltwo->num_rows>0)
          {
            while($rowforassigndata=$resultAssignUltwo->fetch_assoc())
            {

                if($rowUltwo['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUltwo['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";

            include('work_report_card.php');  //Included card(li)

      } } } } 
      else { ?> <label>Drop here</label><?php } ?>
    </ul>
    <!-- Second ul End -->

    <ul id="sortable3" class="dropfalse">
      <?php 
      $sqlUlindexthree = "SELECT * FROM `work_report_data` WHERE ul_index=2 AND active_status=1 ORDER BY li_index";
      $resultUlindexthree = $conn->query($sqlUlindexthree);
      if($resultUlindexthree->num_rows>0)
      {
        while($rowUlindexthree=$resultUlindexthree->fetch_assoc())
        {
          $sqlAssignDataUlthree = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rowUlindexthree['task_id']."";
          $resultAssignUlthree = $conn->query($sqlAssignDataUlthree);
          if($resultAssignUlthree->num_rows>0)
          {
            while($rowforassigndata=$resultAssignUlthree->fetch_assoc())
            {

                if($rowUlindexthree['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUlindexthree['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
            include('work_report_card.php');  //Included card(li)
      } } } } 
      else { ?> <label>Drop here</label><?php } ?>
    </ul>

    <ul id="sortable4" class="dropfalse">
    <?php 
      $sqlUlindexfour = "SELECT * FROM `work_report_data` WHERE ul_index=3 AND active_status=1 ORDER BY li_index";
      $resultUlindexfour = $conn->query($sqlUlindexfour);
      if($resultUlindexfour->num_rows>0)
      {
        while($rowUlindexfour=$resultUlindexfour->fetch_assoc())
        {
          $sqlAssignDataUlfour = "SELECT * FROM `assign_task` WHERE `created_task_id`= ".$rowUlindexfour['task_id']."";
          $resultAssignUlfour = $conn->query($sqlAssignDataUlfour);
          if($resultAssignUlfour->num_rows>0)
          {
            while($rowforassigndata=$resultAssignUlfour->fetch_assoc())
            {

                if($rowUlindexfour['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUlindexfour['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
            include('work_report_card.php');  //Included card(li)
        } } } } 
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
          <form action="insert_issue_details.php" method="POST">
            <div class="form-group col-md-2">
              <input type="text" name="issue_title" id="issue_title" class="form-control" placeholder="Issue Title">
            </div>
             <div class="col-md-2 left_mar">
              <input type="text" name="issue_details" id="issue_details" class="form-control" placeholder="Details">
            </div>
             <div class="col-md-2 left_mar">
              <input type="text" name="issue_origin" id="issue_origin" class="form-control" placeholder="Origin">
            </div>
            <input type="hidden" name="task_id" id="created_task_id">
            <input type="hidden" name="emp_id" id="emp_id">
            <div class="col-md-2 left_mar">
              <select name="issue_type" id="issue_type" class="form-control">
                <option value="0">Select one</option>
                <option value="1">Blocker</option>
                <option value="2">Critical</option>
                <option value="3">Major</option>
                <option value="4">Minor</option>
              </select>
            </div>
             <div class="col-md-2 left_mar">
              <select name="issue_tech_nontech" id="issue_tech_nontech" class="form-control">
                <option value="">Select one</option>
                <option value="1">Tech</option>
                <option value="0">Non-tech</option>
              </select>
            </div>
             <div class="col-md-2 left_mar">
              <select name="emp_id" id="emp_id" class="form-control">
              <option value="0">Select one</option>
              <?php
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo "<option value=".$row['emp_id'].">".$row['first_name']."</option>";
                  }
                }else{ echo "No data"; }
              ?>
              </select>
            </div>
            <input type="submit" name="submit" class="btn btn-default">
          </form>
          </div>
          <div class="row">
            <div class="col-md-12 myborders">
                <table class="table table-bordered" style="font-size:12px;">
                  <thead>
                    <tr>
                      <th>Issue Title</th>
                      <th>Assigned By</th>
                      <th>Details</th>
                      <th>Origin</th>
                      <th>Status Type</th>
                      <th>Issue Type</th>
                      <th>Issue Status</th>
                      <th>User</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="issuedetailsdisplay">
                  
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
               <div id="issuedescription">
                
               </div>
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
  <div class="modal fade" id="planning" role="dialog">
    <div class="modal-dialog modal_dialog">
    
       <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Project Plann</h4>
        </div>
        <div class="modal-body">

          <div class="row">

          <form id="plann_form" action="insert_plann_detail.php" method="POST">
            <div class="form-group col-md-3">
              <input type="text" name="plann_name" id="plann_name" class="form-control" placeholder="Plann Name">
            </div>
             <div class="col-md-3">
              <input type="text" name="plann_details" id="plann_details" class="form-control" placeholder="Details">
            </div>
             <div class="col-md-2">
              <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From date">
            </div>
            <input type="hidden" name="tasks_id" id="task_id">
            <input type="hidden" name="empid" id="empid">
            <div class="col-md-2">
              <input type="date" name="to_date" id="to_date" class="form-control" placeholder="From date">
            </div>
            <input type="submit" name="submit" class="btn btn-default">
          </form>


          </div>

          <div class="row">
            <div class="col-md-12 myborders">
            <table class="table table-bordered" style="font-size:12px;">
              <thead>
                <tr>
                  <th>Planne Name</th>
                  <th>Details</th>
                  <th>From Date</th>
                  <th>To Date</th>
                </tr>
              </thead>
              <tbody id="planndetailsdisplay">
              
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





<script type="text/javascript">
$(document).ready(function(){

  $(function(){
    
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
          $('#'+liId).addClass("border_delay"); 
        }
        if(data == 1)
        {
          $('#'+liId).addClass("border_ontime");
        }
        if(data == 0)
        {

          $('#'+liId).addClass("border_before");
        }
          window.location.reload();
        }
    }); } } });
    $( "#sortable1, #sortable2, #sortable3, #sortable4" ).disableSelection();
  });





  $(".issues").click(function(){
    var taskemp = this.id;
    var task_id = taskemp.split(",")[0];
    var emp_id = taskemp.split(",")[1];
    $("#created_task_id").val(task_id);
    $("#emp_id").val(emp_id);
    $.ajax({
      type: 'post',
      url: 'issue_display_details.php',
      data: { task_id: task_id, emp_id: emp_id},
      success: function(data){
        $("#issuedetailsdisplay").html(data);
      }
    });
  });

  $(".descrip").click(function(){
    var task_id = this.id;
    $.ajax({
      type: 'POST',
      url: 'issue_description.php',
      data: {"task_id" : task_id},
      success: function(data){
        $("#issuedescription").html(data);
      }
    });
  });

    $(".plan").click(function(){
    var taskemp = this.id;
    var task_id = taskemp.split(",")[0];
    var emp_id = taskemp.split(",")[1];
    $("#task_id").val(task_id);
    $("#empid").val(emp_id);

    $.ajax({
      type: 'post',
      url: 'plann_details_display.php',
      data: { task_id: task_id, emp_id: emp_id},
      success: function(data){
        $("#planndetailsdisplay").html(data);
      }
    });
  });

});
</script>
