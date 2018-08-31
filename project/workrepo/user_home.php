<!DOCTYPE html>
<html>
<head>
<title>Work Report</title>
<link rel="shortcut icon" href="image/nbd.png" type="image/png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

<!---Library for Checkbox and Drop down-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

</head>
<style type="text/css">
	body {
    font-family: "Open Sans",sans-serif;
    font-size: 13px;
    font-style: normal;
    font-weight: normal;
    line-height: 22px;
    white-space: normal;
}
#header-site {
    background: #262727 none repeat scroll 0 0;
    border-bottom: 2px solid #cf4137;
    float: left;
    position: fixed;
    top: 0;
    width: 100%;
}
.logo-site {
    float: left;
    /*height: 50px;*/
    margin: 5px 0 0px 10px;
    width: 140px;
}
.logo-site h1 {
    margin: 0;
}
.logo-site h1 a {
 float: left;
    height: 56px;
    width: 60px;
    text-indent: -999px;
    background-image: url(image/nbd.png);
    background-repeat: no-repeat;
    background-position: 0px;
    background-size: 60px;
}

/*Notification Bell dropdown*/
.top-nav {
    padding: 0 5px;
}
.top-nav > li {
    display: inline-block;
    float: left;
}
.top-nav > li > a {
    color: #fff;
    font-size: 13px;
    line-height: 20px;
    padding-bottom: 12px;
    padding-top: 12px;
}
.top-nav > li span.badge {
    background: #ca3f02 none repeat scroll 0 0;
    border: 3px solid #262727;
    font-family: "Open Sans",sans-serif;
    font-size: 11px;
    font-weight: 300;
    padding: 2px 5px;
    position: absolute;
    right: 3px;
    top: 3px;
}
.dropdown-notification .dropdown-menu{width:275px;   max-width: 275px;
    min-width: 160px;}
.dropdown-notification > a {
    font-size: 18px !important;
    line-height: 29px !important;
}
.top-nav .dropdown-menu .dropdown-menu-list {
    list-style: outside none none;
    padding-left: 0;
    padding-right: 0 !important;
}
.top-nav > li.dropdown-notification .dropdown-menu > li.external {
    border-radius: 4px 4px 0 0;
    display: block;
    letter-spacing: 0.5px;
    overflow: hidden;
    padding: 15px;
}
.top-nav > li.dropdown-notification .dropdown-menu > li.external > h3 {
    display: inline-block;
    float: left;
    font-size: 13px;
    margin: 0;
    padding: 0;
}
.top-nav > li.dropdown-notification .dropdown-menu > li.external > a {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 0 none;
    color: #888;
    clear: inherit;
    display: inline-block;
    font-size: 13px;
    font-weight: 300;
    margin-top: -1px;
    padding: 0;
    position: absolute;
    right: 10px;
}
.top-nav > li.dropdown-notification .dropdown-menu > li.external {
    background: #eaedf2 none repeat scroll 0 0;
}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list {
    list-style: outside none none;
}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li > a {
    clear: both;
    display: block;
    font-size: 13px;
    font-weight: 300;
    line-height: 20px;
    padding: 16px 15px 18px;
    text-shadow: none;
    white-space: normal;
    border-bottom: 1px solid #eff2f6 !important;

}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li a .time {
    float: right;
    font-size: 11px;
    font-weight: 400;
    max-width: 75px;
    opacity: 0.7;
    padding: 1px 5px;
    text-align: right;
    background: #f1f1f1 none repeat scroll 0 0;
}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li a .details {
    font-size:13px;
}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li a .details .label-icon {
    border-radius: 50%;
    margin-right: 10px;
}
.top-nav > li > a:hover, .top-nav > li > a:focus, .top-nav > .open > a, .top-nav > .open > a:hover, .top-nav > .open > a:focus {
    background-color: #171717;
    color: #999999;
}
.top-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li > a:hover {
    background: #f8f9fa none repeat scroll 0 0;
}
.navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
    background-color: transparent;
    color: #ca3f02;
}
.navbar-default .navbar-nav>li>a {
    color: #42b5fd;
    font-size: 15px;
}
/*Toggle Navigation design*/
.navbar-default .navbar-toggle{ border:none;}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background: none;
}

@media(max-width:768px){
.navbar-collapse{ clear:both;}
    
}
.navbar-nav>li>a {
    padding-top: 23px;
    padding-bottom: 15px;
}

.box{
	 margin-top: 10px;
    border: 1px solid lightblue;
    border-radius: 5px;
    padding-top: 15px;
    box-shadow: 0px 0px 5px 0px lightblue;
    padding-left: 10px;
    padding-right: 10px;
    background-color: rgba(193, 193, 193, 0.23);
}
.myborder{
    border: 1px solid lightblue;
    border-radius: 5px;
    box-shadow: 0px 0px 5px 0px lightblue;
    
}
.boxs{
    border: 1px solid lightblue;
    border-radius: 5px;
    padding-top: 15px;
    box-shadow: 0px 0px 5px 0px lightblue;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 5px;
    background-color: rgba(193, 193, 193, 0.23);
}
thead{
	background-color: white;
    color: black;
}
h4{
    text-align: center;
}
h1{
    color: #42b5fd;
}

.badge{
        display: inline-block;
    min-width: 10px;
    padding: 7px 17px;
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
    margin-left: 5px;
}
.bag{
    display: inline-block;
    min-width: 10px;
    font-weight: 600;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #823c02;
    border-radius: 30px;
    height: 15px;
    width: 6%;
    margin-top: -15px;
    margin-left: -8px;
    padding-top: 2px;
}
.tds{
    width: 7%;
}
.tdd{
    width: 11%;
}
.contain {
    margin-top: 75px;
    width: 1271px;
    padding-bottom: 20px;
}
.day_style{
        margin-left: 75%;
    font-size: 18px;
    color: #42b5fd;
    margin-top: 22px;
}
.fa{
    font-size: 22px;
}
.hour, .minute,.ampm{
    font-size: 17px;
    height: 34px;
    border-radius: 5px;
    background-color: white;
}
.login_time{
    font-size: 15px;
    color: green;
}
.tab{
    font-size: 12px;
}
.tabl{
    font-size: 12px;
}
.cont{
    margin-left: 32px;
    margin-top: -25px;
    width: 78%;
}
.tds{
    width: 15%;
}
.img-circle{
    background-color: white;
}
.ui-accordion .ui-accordion-header {
    display: block;
    cursor: pointer;
    position: relative;
    margin: 2px 0 0 0;
    padding: .5em .5em .5em .7em;
    font-size: 160%;
}
.left_mar{
    margin-left: -15px;
}
/*-----------------Dashbord-----------------*/
#sortable1, #sortable2, #sortable3, #sortable4 {
    border: 1px solid #eee;
    width: 24%;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
    height: auto;
    min-height: 800px;

  }
  #sortable1 li, #sortable2 li, #sortable3 li, #sortable4 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
  }
   .rw{
    margin-left: 15px;
    
  }
   .img{
    width: 20%;
    height: 51px;
    border: 1px solid #f6f6f6;
    border-radius: 30px;
  }
  .border_left{
    border-left: 1px solid red;
    height: auto;
    padding: 5px 0px 0px 11px;
  }
  .left-border{
    border-left: 1px solid yellow;
    height: auto;
    padding: 5px 0px 0px 11px;
  }
  .border_delay{
    border-left: 1px solid red;
    height: auto;
    padding: 5px 0px 0px 5px;
  }
  .border_before{
    border-left: 1px solid yellow;
    height: auto;
    padding: 5px 0px 0px 5px;
  }
  .border_ontime{
    border-left: 1px solid green;
    height: auto;
    padding: 5px 0px 0px 5px;
  }
  .btnss{
    border-width: 0px;
    background-color: #f6f6f6;
  }
.modal_dialog {
    width: auto;
    margin: 10px auto;
}
.modal{
  padding-left: 15px;
}
.myborders{
  border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px 16px 5px 16px;
}
.contain{
    width: 1265px;
    margin-top: 70px;
    margin-left: 6px;
}
.stle{
  margin-left: -15px;
}
.bt{
  margin-left: 70%;
}
.in_pro{
      margin-left: -25%;
    margin-top: -30px;
}
.code{
      margin-left: 25%;
    margin-top: -30px;
}
.comple{
      margin-left: 75%;
    margin-top: -30px;
}
.lft_stl{
  margin-left: 25px;
}
.not_str{
      margin-left: -75%;
}
.hr{
  margin-top: 0px;
    margin-bottom: 5px;
    border-top: 1px solid black;
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #337ab7;
    background: #567698;
    font-weight: normal;
    color: #ffffff;
}

.project_style{
    font-size: 11px; 
    color: #228f9c; 
    letter-spacing: 2px;
}
.phase_style{
    padding-bottom: 10px; 
    font-size: 12px; color: 
    rgb(106, 69, 158); 
    letter-spacing: 1.5px;
    margin-left: -3px;
}
.task_style{
    font-weight: 400;
    font-size: 13px;
    margin-left: 30px;
    margin-top: -20px;
    width: 15em;
}
.task_desc{
        width: 16em;
    margin: -22px 0px 0px 75px;
    color: rgba(69, 69, 69, 0.86);
}
.stamp-size{
    width: 15%;
    float: right;
    border-radius: 45px;
    border: 1px solid rgba(4, 3, 3, 0);
    height: 38px;
    margin-top: -5px;
}

.btn-circle {
  width: 20px;
  height: 20px;
  text-align: center;
  padding: 3px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  color: rgba(85, 85, 85, 0.94);
}
.plan{
    color: white;
    padding: 3px 0;
    margin-top: -5px;
}
.descrip{
  margin-top: 5px;
}
/*----------------------------------END---------------------*/
/*----------------------------------Plann Design------------*/
.task_box{
     margin-top: 75px;
    border: 1px solid lightblue;
    border-radius: 5px;
    padding-bottom: 20px;
    padding-top: 0px;
    box-shadow: 0px 0px 5px 0px lightblue;
}
.taskbox{
    margin-top: 20px;
    border: 1px solid lightblue;
    border-radius: 5px;
    padding-bottom: 10px;
    padding-top: 0px;
    box-shadow: 0px 0px 5px 0px lightblue;
}
.fixed_color{
  background-color: red;
  color: white;
  width: 42%;
}
/*----------------------------------Plann Design End------------*/
</style>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="navbar navbar-default navbar-fixed-top">
			<header id="header-site">
			
				<div class="logo-site">
					<h1>NBD<a href="#">Leistung</a></h1>
				</div>
				
				<!--Begin::Mobile View Navigation-->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
				</button>
				<!--End::Mobile View Navigation-->
				
				<!--Begin::Header right-->
				<ul class="nav navbar-right pull-right top-nav">
					<!-- <li class="dropdown dropdown-notification"> <a class="dropdown-toggle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> <i class="fa fa-bell-o"></i> <span class="badge badge-default"> 3 </span> </a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3> <span class="bold">12 pending</span> notifications</h3>
								<a href="page_user_profile_1.html">view all</a> 
							</li>
							<li>
								<ul class="dropdown-menu-list">
									<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> New user registered. </span> </a> </li>
									<li> <a href="javascript:;"> <span class="time">3 mins</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i> </span> Server #12 overloaded. </span> </a> </li>
									<li> <a href="javascript:;"> <span class="time">10 mins</span> <span class="details"> <span class="label label-sm label-icon label-warning"> <i class="fa fa-bell-o"></i> </span> Server #2 not responding. </span> </a> </li>
									<li> <a href="javascript:;"> <span class="time">14 hrs</span> <span class="details"> <span class="label label-sm label-icon label-info"> <i class="fa fa-bullhorn"></i> </span> Application error. </span> </a> </li>
								</ul>
							</li>
						</ul>
					</li> -->
					<li class="dropdown"> 
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <?php
                                $sql = "SELECT * FROM users WHERE emp_id='".$_SESSION['emp_id']."'";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                            ?>
                            <img alt="Img" class="img-circle" src="image/<?php echo $row['photo'];?>" width="35">
							 
							<span class="hidden-xs"><?php echo $row['first_name'];?></span> 
                            <?php } }
                            else{ echo "No Data"; }
                                ?>
						</a>
						<ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
							<li class="divider"></li>
							<li><a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<!--End::Header Right-->

				
				<!--Begin::Nav-->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li><a id="home" href="user_work_report.php">Work Report</a></li>
                         <li><a id="task" href="create_universal_task.php">Task</a></li>
						<!-- <li><a id="task" href="new_task_list.php">New Task List</a></li>
                        <li><a id="statask" href="started_task_list.php">Started Task List</a></li>
                        <li><a id="rejtask" href="rejected_task_list.php">Rejected Task List</a></li> -->
					</ul>
                    <?php $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));?>
                     <div class="day_style">
                        <label><?php echo $date->format('l');?></label> 
                                <?php echo $date->format('M d,Y');?></div>
				</div>
				<!--End::Nav--> 
				
			</header>
		</div>
	</div>
</div>
</body>
</html>