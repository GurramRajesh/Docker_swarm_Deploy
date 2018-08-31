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
  
</head>
<body>
<div class="contain">
  <div class="row rw">
    <div class="col-md-3">
      <h4>Not Started</h4>
      <hr>
        <ul id="not_started" class="connectedSortable">
          <li class="ui-state-default" id="sortable1_1">
             <div class="border-left">
                <img src="image/rajesh.jpg" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> --> 
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="sortable1_2">
             <div class="border-left">
                <img src="image/sujeet.png" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="sortable1_3">
             <div class="border-left">
                <img src="image/Rohit.jpg" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
        </ul>
    </div>

    <div class="col-md-3">
       <div class="border_le">
       <h4>In Progress</h4>
       <hr>

        <ul id="in_progress" class="connectedSortable" style="margin-left:7px;">
          <li class="ui-state-default" id="drag_4"> 
            <div class="border-progress">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div></li>
          <li class="ui-state-default" id="drag_5"> 
            <div class="border-progress">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                 <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div></li>
          <li class="ui-state-default" id="drag_6"> 
            <div class="border-progress">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                 <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div></li>
        </ul>
        
      </div>
    </div>

    <div class="col-md-3">
       <div class="border_le">
       <h4>Code</h4>
       <hr>

        <ul id="code" class="connectedSortable" style="margin-left:7px;">
          <li class="ui-state-default" id="drag_7">
             <div class="border-left">
                <img src="image/dr.png" alert="Image" class="pull-right img">
               <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="drag_8">
             <div class="border-left">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                 <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="drag_9">
             <div class="border-left">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
        </ul>
        
      </div>
    </div>

    <div class="col-md-3">
       <div class="border_le">
       <h4>Completed</h4>
       <hr>

        <ul id="completed" class="connectedSortable" style="margin-left:7px;">
          <li class="ui-state-default" id="drag_11">
             <div class="border-complete">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="drag_12">
             <div class="border-complete">
                <img src="image/dr.png" alert="Image" class="pull-right img">
               <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
          <li class="ui-state-default" id="drag_13">
             <div class="border-complete">
                <img src="image/dr.png" alert="Image" class="pull-right img">
                <div style="margin-left:30px;">
                <label>Project</label><br>
                <button type="button" class="btnss" data-toggle="modal" data-target="#issue_reg"><span class="badges bad">!</span></button>
                <label>Phase</label><br>
                <!-- <button type="button" class="btnss" data-toggle="modal" data-target="#issue_sts"><span class="glyphicon glyphicon-arrow-up"></span></button> -->
                <label>Task</label><br>
                <span><button type="button" class="btnss" data-toggle="modal" data-target="#description">Descirption</button>for task which is assigned</span>
                </div>
            </div>
          </li>
        </ul>
        
      </div>
    </div>

  </div>
</div>
 



 <!-- Modal -->
  <div class="modal fade" id="issue_reg" role="dialog">
    <div class="modal-dialog">
    
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
  <div class="modal fade" id="issue_sts" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Issue Status</h4>
        </div>
        <div class="modal-body">
          <span>Some text in the modal.</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

   <!-- Modal -->
  <div class="modal fade" id="description" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Description</h4>
        </div>
        <div class="modal-body">
          <span>Some text in the modal.</span>
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


  <div id="fromRow"></div>
  <div id="toRow"></div>
  <div id="startIndex"></div>
  <div id="updateIndex"></div>
  <div id="li_ele"></div>





<script type="text/javascript">

  $(document).ready(function() {
    $( "#not_started, #in_progress, #code, #completed" ).sortable({
     
      start: function(event, ui) { 
          var start = ui.item.index();  //Starting index(Position) 
          $('#startIndex').append(start);
          console.log('start:- ' + start);
      },
      stop: function(event, ui)
      {
        var from = this.id; // printing source ul id
        console.log('From:-',from); 
        $('#fromRow').append(from);
        
      },
      receive: function(event, ui) {
        var to = event.target.id; // printing destination ul id
        $('#toRow').append(to);  
        console.log('To:-',to);
      },
        update: function( event, ui ) {
        var id = ui.item.attr("id");  // printing li id
        //console.log('item:-',id);
        var arr = id.split('_');  // spliting id in two valriables
        var first = arr[0];
        var second = arr[1];
        $('#li_ele').append(second);

        var update = ui.item.index();   //Updated index(Position)
        $('#updateIndex').append(update);
        console.log('Update: ', + update);

        var updateIndex = document.getElementById('updateIndex');
       $.ajax({
            type: 'POST',
            url: 'updates.php',
            data: {
              update: updateIndex,
              
      },
      success: function(data){

      }
    });

      },
      connectWith: ".connectedSortable"
    }).disableSelection();

    /*var from = document.getElementById('fromRow');
    var to = document.getElementById('toRow');
    var startIndex = document.getElementById('startIndex');
    var updateIndex = document.getElementById('updateIndex');
    var li_ele = document.getElementById('li_ele');

    $.ajax({
            type: 'POST',
            url: 'updates.php',
            data: {
              update: updateIndex,
              start: startIndex,
              from: from,
              to: to,
              li_ele: li_ele
      },
      success: function(data){

      }
    });*/



/*$( "#sortable" ).sortable({ 
placeholder: "ui-state-highlight", 
opacity: 0.6, 
update: function(event, ui) { 
var info = $(this).sortable("serialize"); 
$.ajax({ 
type: "POST", 
url: "http://localhost/frame/admin/pages/sort_items", 
data: info, 
context: document.body, 
success: function(){ // alert("cool"); 
} 
}); 
} 
}); $( "#sortable" ).disableSelection();*/

  });

</script>