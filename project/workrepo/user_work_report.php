<style type="text/css">
#home{ 
  color: #ca3f02;
}

background-color: #e0ddec;
</style>

<?php
session_start();
include("connect.php");
$emp_id = $_SESSION['emp_id'];
$mont_day = date('m');
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$date_time = $date->format("Y/m/d");

if(!empty($_SESSION))
{
    include("user_home.php");

$holiday = $conn->query("SELECT count(*) as count FROM `holidays` WHERE month = '$mont_day' AND status = 1")->fetch_assoc(); //Counting No of holidays in a month
$attandance = $conn->query("SELECT count(*) as count FROM `user_workreport_login` WHERE emp_id = '$emp_id'")->fetch_assoc(); //Counting Number of Present in month
$payable = $conn->query("SELECT count(*) as count FROM `work_report` WHERE emp_id = '$emp_id'")->fetch_assoc(); //Counting number of days to pay the salary

$month  = date('m');
$year  = date('Y');
function getDays($year,$month){ 
  $days = cal_days_in_month(CAL_GREGORIAN, $month,$year);
  $sun = array();
  for($i = 1; $i<= $days; $i++){
      $day  = date('Y-m-'.$i);
      $result = date("l", strtotime($day));
    if($result == "Sunday"){
      $sun[] = date("Y-m-d", strtotime($day))."<br>";
     }
  }
 return  $sun;
}
$sun = getDays($year,$month);
$sat_count = 2; //Counting number of Saturdays
$sun_count = sizeof($sun); //Counting number of Sundays
$days_payable = array($sat_count, $sun_count, $holiday['count'], $attandance['count']); //Putting all count in array
$days_payable = array_sum($days_payable); //adding Saturday count, Sunday count, Holiday of month, Attendance of the month
$sat_sun = array($sat_count,$sun_count); //Putting Saturday count and Sunday count in array
$sat_sun = array_sum($sat_sun); //Adding Sat and Sun count 
$total_day = date('t'); //Number of days in current month
$total_working = $total_day - $sat_sun - $holiday['count']; //Substracting Total days of current month and all Sat and Sun

$sql = "SELECT * FROM users WHERE emp_id= '$emp_id'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
   while($row = $result->fetch_assoc())
    {
      $salary = ceil($row['salary'] / $total_day * $days_payable); //Calculating Salary
?>

<div class="container contain">
  <div class="row" id="accordion">
 <h3>Basic User Information</h3>
    <div class="row">
      <div class="col-md-4">
        <table class="table table-bordered tab">
          <tbody>
            <tr>
              <td>Emp Id : - <?php echo $row['emp_id'];?></td>
              <td><?php echo $row['designation'];?></td>
            </tr>
            <tr>
            <td colspan="3">
            Name : - <?php echo $row['first_name'];?> <?php echo $row['middle_name'];?> <?php echo $row['last_name'];?>
            </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-8">
        <table class="table table-bordered tabl">
          <thead>
            <tr>
              <th>T</th>
              <th>S/S</th>
              <th>H</th>
              <th>TW</th>
              <th>L</th>
              <th>A</th>
              <th>DP</th>
              <th>Sl</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo date('t');?></td>
              <td><?php echo $sat_count;?> / <?php echo $sun_count;?></td>
              <td><a href="#" title="Holiday" data-trigger="focus" data-toggle="popoverx" data-placement="bottom" data-content="
              <?php
                $sql = "SELECT * FROM holidays";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                  while($rows = $result->fetch_assoc()){
                    echo "Date :-". $rows['holiday_date']; echo ",";
                    echo "Reason :-". $rows['reason'];
                  }
                } else{ echo "0 result";}
              ?>
              "><span><?php echo $holiday['count'];?></span></a></td>
              <td><?php echo $total_working;?></td>
              <td>0</td>
              <td><?php echo $attandance['count'];?></td>
              <td><?php echo $days_payable;?></td>
              <td><a href="#" title="Salary" data-trigger="focus" data-toggle="popover" data-placement="bottom" data-content="Basic : <?php echo $row['salary'];?>, Net Take Home : <?php echo $salary;?>"><i class="fa fa-inr"></i></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    
    <form action="workreport_login_insert.php" method="POST">
      <div class="form-group col-sm-12 col-md-12">
        <div class="col-sm-2 col-md-2">
          <input type="text" name="login_date" id="end_date" class="form-control login_date" placeholder="Date">
          <input type="hidden" name="emp_id" value="<?php echo $emp_id;?>">   
        </div>
        <div class="col-sm-2">
          <select class="hour " style="width: auto;" name="login_hour">
            <option value=""></option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
          </select>

            :

          <select class="minute " style="width: auto;" name="login_minute">
            <option value=""></option><option value="00">00</option><option value="05">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option>
          </select>

          <select class="ampm " name="login_ampm" style="width: auto;">
            <option value=""></option><option value="am">AM</option><option value="pm">PM</option>
          </select>
        </div>
        <div class="col-sm-4">
          <?php 
            $sql_select = "SELECT * FROM `user_workreport_login` WHERE `login_date` = '$date_time' AND `emp_id`='$emp_id'";
            $result = $conn->query($sql_select);
            if ($result->num_rows > 0) {
              echo "Logged in";
            }
            else{
              echo '<input type="submit" name="submit" value="Login" class="btn btn-success btn-sm">';
            }
          ?>
           <a class="btn btn-danger btn-sm" onclick="timeupdate('<?php echo $emp_id;?>')">Logout</a>
           <!--<a href="work_report_details.php" class="btn btn-primary btn-sm">View</a>-->
        </div>
      </div>
    </form>
  </div>
   </div>
  <?php
    $sql_select = "SELECT * FROM user_workreport_login WHERE emp_id='$emp_id' AND login_date='$date_time' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql_select);
      if($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
          {
              //echo "<label style='color:green;'>You are Loged In</label>";
              echo "<div class='pull-right login_time'><label>".$date->format('l')." ".$row['login_date']." ".$row['login_time']."
              </label></div>";
          } 
      }
      else
      {
        echo "<label style='color:red;'>You have not Loged In</label>";
      }
  ?>
</div>

<!-- Work Report Drag drop-->
<div class="contain" style="margin-top:-25px;">
  <h4 class="not_str">Not Started</h4>
  <h4 class="in_pro">Started</h4>
  <h4 class="code">Code</h4>
  <h4 class="comple">Completed</h4>
  <hr class="hr">
  <div class="row rw">
  
  <ul id="sortable1" class="dropfalse"> <!-- First ul start -->
    <?php 
      $sqlUlindexone = "SELECT * FROM `work_report_data` WHERE ul_index=0 AND active_status=1 ORDER BY li_index";
      $resultulindexone = $conn->query($sqlUlindexone);
      $cardcount = $conn->query("SELECT count(*) as count FROM `work_report_data` JOIN `assign_task` ON work_report_data.task_id=assign_task.created_task_id WHERE work_report_data.ul_index=0 AND work_report_data.active_status=1 AND assign_task.emp_id='$emp_id'")->fetch_assoc();    // Count the number of task
      if($cardcount['count'] != 0){
      if($resultulindexone->num_rows > 0)
      { 
        while($rowulindexone=$resultulindexone->fetch_assoc())
        { 
          $sqlAssignData = "SELECT * FROM `assign_task` WHERE emp_id = '$emp_id' AND `created_task_id`= ".$rowulindexone['task_id']."";
          $resultassigndata = $conn->query($sqlAssignData);
          if($resultassigndata->num_rows > 0)
          { 
            while($rowforassigndata=$resultassigndata->fetch_assoc())
            {
                if($rowulindexone['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowulindexone['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";

                include('work_report_card.php');  //Included card(li)
      } } } } 
      else { ?> <label>Drop here</label><?php } }
      else { ?> <label>Drop here</label><?php } ?>   
  </ul>
  <!-- First ul End -->

  <!-- Second ul start -->
  <ul id="sortable2" class="dropfalse">
    <?php 
      $sqlUlindextow = "SELECT * FROM `work_report_data` WHERE ul_index=1 AND active_status=1 ORDER BY li_index";
      $resultUlindextwo = $conn->query($sqlUlindextow);
      $cardcount = $conn->query("SELECT count(*) as count FROM `work_report_data` JOIN `assign_task` ON work_report_data.task_id=assign_task.created_task_id WHERE work_report_data.ul_index=1 AND work_report_data.active_status=1 AND assign_task.emp_id='$emp_id'")->fetch_assoc();            // Count the number of task
      if($cardcount['count'] != 0){
      if($resultUlindextwo->num_rows>0)
      {
        while($rowUlindextwo=$resultUlindextwo->fetch_assoc())
        {  
          $sqlAssignDataUltwo = "SELECT * FROM `assign_task` WHERE emp_id = '$emp_id' AND `created_task_id`= ".$rowUlindextwo['task_id']."";
          $resultAssigndataUltwo = $conn->query($sqlAssignDataUltwo);
          if($resultAssigndataUltwo->num_rows>0)
          { 
            while($rowforassigndata = $resultAssigndataUltwo->fetch_assoc())
            { 
                if($rowUlindextwo['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUlindextwo['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";

              include('work_report_card.php');
      } } } } 
      else { ?> <label>Drop here</label><?php } }
      else { ?> <label>Drop here</label><?php } ?>  
    </ul>
    <!-- Second ul End -->

    <!-- Third ul Start -->
    <ul id="sortable3" class="dropfalse">
      <?php 
      $sqlUlindexthree = "SELECT * FROM `work_report_data` WHERE ul_index=2 AND active_status=1 ORDER BY li_index";
      $resultUlindexthree = $conn->query($sqlUlindexthree);
      $cardcount = $conn->query("SELECT count(*) as count FROM `work_report_data` JOIN `assign_task` ON work_report_data.task_id=assign_task.created_task_id WHERE work_report_data.ul_index=2 AND work_report_data.active_status=1 AND assign_task.emp_id='$emp_id'")->fetch_assoc();      // Count the number of task
      if($cardcount['count'] != 0){
      if($resultUlindexthree->num_rows>0)
      {
        while($rowUlthree=$resultUlindexthree->fetch_assoc())
        {  
          $sqlAssignDataUlthree = "SELECT * FROM `assign_task` WHERE emp_id = '$emp_id' AND `created_task_id`= ".$rowUlthree['task_id']."";
          $resultassignUlthree = $conn->query($sqlAssignDataUlthree);
          if($resultassignUlthree->num_rows>0)
          { 
            while($rowforassigndata=$resultassignUlthree->fetch_assoc())
            { 
                if($rowUlthree['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUlthree['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
              include('work_report_card.php');
      } } } } 
      else { ?> <label>Drop here</label><?php } }
      else { ?> <label>Drop here</label><?php } ?> 
    </ul>
    <!-- Third ul End -->

    <!-- Fourth ul Start -->
    <ul id="sortable4" class="dropfalse">
    <?php 
      $sqlUlindexfour = "SELECT * FROM `work_report_data` WHERE ul_index=3 AND active_status=1 ORDER BY li_index";
      $resultUlindexfour = $conn->query($sqlUlindexfour);
       $cardcount = $conn->query("SELECT count(*) as count FROM `work_report_data` JOIN `assign_task` ON work_report_data.task_id=assign_task.created_task_id WHERE work_report_data.ul_index=3 AND work_report_data.active_status=1 AND assign_task.emp_id='$emp_id'")->fetch_assoc();      // Count the number of task
      if($cardcount['count'] != 0){
      if($resultUlindexfour->num_rows>0)
      {
        while($rowUlfour=$resultUlindexfour->fetch_assoc())
        {  
          $sqlAssignDataUlfour = "SELECT * FROM `assign_task` WHERE emp_id = '$emp_id' AND `created_task_id`= ".$rowUlfour['task_id']."";
          $dataUlfour = $conn->query($sqlAssignDataUlfour);
          if($dataUlfour->num_rows>0)
          { 
            while($rowforassigndata=$dataUlfour->fetch_assoc())
            { 
                if($rowUlfour['progress_status'] == 1)
                    $border_left = "border_ontime";
                else if($rowUlfour['progress_status'] == 2)
                    $border_left = "border_delay";
                else
                    $border_left = "border_before";
              include('work_report_card.php');
      } } } } 
      else { ?> <label>Drop here</label><?php } }
      else { ?> <label>Drop here</label><?php } ?>
    </ul>
    <!-- Fourth ul End -->

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
          <h4 class="modal-title">Project Plan</h4>
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
                  <th>Plan Name</th>
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
}
  else{ echo "0 result"; }
}
else{
    header("Location: index.php");
}?>
</body>
</html>


<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="popover"]').popover(); 
  $('#datatables').DataTable();

  function timeupdate(emp_id) {
    var logout_date = $(".login_date").val();
    var logout_hr = $(".hour").val();
    var logout_mnt = $(".minute").val();
    var logout_ampm = $(".ampm").val();
    $.ajax({
      url: 'logout_time_update.php',
      type: 'POST',
      data: {
        logout_date: logout_date,
        logout_hr : logout_hr,
        logout_mnt : logout_mnt,
        logout_ampm : logout_ampm,
        emp_id: emp_id
      },
      success: function(data){
        window.location = "index.php";
      }
    });
  }

  $(function(){
    $("#end_date").datepicker({ dateFormat: 'yy/mm/dd'}).bind("change",function(){
      var minValue = $(this).val();
      minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
      minValue.setDate(minValue.getDate()+1);
    })  
  });

  /*$("#assigned_task").change(function(){
    var task_name = ($("#assigned_task option:selected").text());
    $.ajax({
      url: 'select_task.php',
      type: 'post',
      data : {
        task_name: task_name
      },
      success: function(data) {
        var temp = new Array();
        // this will return an array with strings "1", "2", etc.
        temp = data.split(",");
        $("#test").append("<input type='text' value='"+temp[0]+"' name='project' class='form-control cont'>");
        $("#project").remove();
        $("#phase_append").append("<input type='text' value='"+temp[1]+"' name='phase' class='form-control'>");
        $("#phase").remove();
        $("#task_name").remove();
      }
    });
  })*/

  $(function() {
  $("#accordion").show().accordion({
      active: false,
      autoHeight: false,
      navigation: true,
      collapsible: true
  });
  });

  $(function() {
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
      });
      }} 
    });
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
          //window.location.reload();
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


