<li id="<?php echo $rowforassigndata['created_task_id'];?>" class="ui-state-default">
    <div class="<?php echo $border_left;?>">
 
    <?php //For Project
      $sqlforproject = "SELECT * FROM project_details WHERE id='".$rowforassigndata['project_id']."'";
      $resultforproject = $conn->query($sqlforproject);
        if($resultforproject->num_rows > 0)
        {
          while($rowforproject = $resultforproject->fetch_assoc())
          {
            echo '<label class="project_style">'.$rowforproject['project_title'].'</label> / ';
          }
        }
        /*else{
          echo "No data";
        }*/
    ?>
    
    <?php
      $sqlforphase = "SELECT * FROM phase_details WHERE id='".$rowforassigndata['phase_id']."'";
      $resultforphase = $conn->query($sqlforphase);
      if($resultforphase->num_rows > 0)
        {
          while($rowforphase = $resultforphase->fetch_assoc())
          {
            echo '<label class="phase_style">'.$rowforphase['phase_title'].'</label><br/>';
          }
        }
        /*else{
          echo "No data";
        }*/
    ?>
       <?php //For Users Image 
      $sqlforimage = "SELECT * FROM users WHERE emp_id='".$rowforassigndata['emp_id']."'"; 
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
    <div>
      <button type="button" class="btnss issues btn btn-info btn-circle" data-toggle="modal" data-target="#issue_reg" id="<?php echo $rowforassigndata['created_task_id'];?>,<?php echo $rowforassigndata['emp_id'];?>"><i class="glyphicon glyphicon-exclamation-sign"></i></button>
      <?php $issuecount = $conn->query("SELECT count(*) AS count FROM `issue_assign` WHERE  task_id='".$rowforassigndata['created_task_id']."' AND emp_id='".$rowforassigndata['emp_id']."'")->fetch_assoc();
        if($issuecount['count']>0)
        {
          echo "<sup class='bag'>".$issuecount['count']."</sup></div>";
        }
        
      ?>

    <?php
      $sqlfortask = "SELECT * FROM create_task WHERE id='".$rowforassigndata['created_task_id']."'";
      $resultfortask = $conn->query($sqlfortask);
      if($resultfortask->num_rows > 0)
        {
          while($rowfortask = $resultfortask->fetch_assoc())
          {
            if($rowfortask['project_id']=='fixed'){
              echo '<label class="task_style fixed_color">'.$rowfortask['task_name'].'</label><br/>';
            }
              else{
            echo '<label class="task_style">'.$rowfortask['task_name'].'</label><br/>';
          }
          }
        }
        else{
          echo "No data";
        }
    ?>

    <button type="button" class="btn btn-primary btn-circle plan" data-toggle="modal" data-target="#planning" id="<?php echo $rowforassigndata['created_task_id'];?>,<?php echo $rowforassigndata['emp_id'];?>"><span class="">P</span></button>

    <div style="font-size: 12px;">
    <div><button type="button" class="btnss descrip" id="<?php echo $rowforassigndata['created_task_id'];?>" data-toggle="modal" data-target="#description" id="">Descirption</button></div>
        <?php
      $sqlfordescription = "SELECT * FROM task_description WHERE created_task_id='".$rowforassigndata['created_task_id']."'";
      $resultfordescription = $conn->query($sqlfordescription);
      if($resultfordescription->num_rows > 0)
        {
          while($rowfordescription = $resultfordescription->fetch_assoc())
          {
            echo '<label class="task_desc">'.$rowfordescription['description_text'].'</label>';
          }
        }
        else{
          echo "<label class='task_desc'>No data</label>";
        }
    ?>
    </div>
    </div>
    </li>