<!DOCTYPE html>
<html>
<head>
	<title>Admin For Work Report</title>
  <link rel="shortcut icon" href="image/nbd.png" type="image/png">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Link-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="libs/css/bootstrap3.3.6cssbootstrap.min.css">
  <link rel="stylesheet" href="libs/css/bootstrap3.3.7cssbootstrap.min.css"> -->
  <link rel="stylesheet" href="libs/css/cdn.datatables.net1.10.13cssjquery.dataTables.min.css">
  <link rel="stylesheet" href="libs/css/cdnjs.cloudflare.comajaxlibsbootstrap-multiselect0.9.13cssbootstrap-multiselect.css">
  <link rel="stylesheet" href="libs/css/code.jquery.comui1.12.1themes.base.jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="libs/css/style.css">

  <!--JavaScript-->
  <!---Library for Checkbox and Drop down-->
  <script type="text/javascript" src="libs/js/ajax.googleapis.comajaxlibsjquery1.9.1jquery.js"></script>
  <script type="text/javascript" src="libs/js/cdn.datatables.net1.10.13jsjquery.dataTables.min.js"></script>
  <script type="text/javascript" src="libs/js/cdnjs.cloudflare.comajaxlibsbootstrap-multiselect0.9.13jsbootstrap-multiselect.js"></script>
  <script type="text/javascript" src="libs/js/code.jquery.comui-1.12.1-jquery-ui.js"></script>
  <script type="text/javascript" src="libs/js/maxcdn.bootstrapcdn.combootstrap3.3.6jsbootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="navbar navbar-default navbar-fixed-top">
			<header id="header-site">
			
				<div class="logo-site">
					<h1>NBD<a href="admin_dashbord.php">Leistung</a></h1>
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
							<img alt="" class="img-circle" src="image/admin.jpg" width="30"> 
							<span class="hidden-xs"><?php echo $_SESSION['user_name'];?></span> 
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
							<li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
							<li class="divider"></li>
							<li><a href="admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<!--End::Header Right-->

				
				<!--Begin::Nav-->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
		            <li><a id="dash" href="admin_dashbord.php">Dashbord</a></li>
		            <li><a id="home" href="create_project.php">Project</a></li>
		            <li><a id="phase" href="create_project_phase.php">Project Phase</a></li>
					<li><a id="task" href="assign_task.php">Task</a></li>
					<li><a id="adduser" href="add_user.php">Add User</a></li>
					<li><a id="listuser" href="list_of_user.php">List of User</a></li>
		            <li><a id="holiday" href="holiday.php">Holiday</a></li>
		            <li><a id="payroll" href="payroll.php">Payroll</a></li>
		            <li><a id="certifi" href="certificate.php">Certificate</a></li>
		            <li><a id="univer" href="universal_task.php">Univar Task</a></li>
		            <li><a id="fixed" href="fixed_task.php">Fixed Task</a></li>
				</ul>
				</div>
				<!--End::Nav--> 
				
			</header>
		</div>
	</div>
</div>
</body>
</html>