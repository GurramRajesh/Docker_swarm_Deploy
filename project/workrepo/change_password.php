<?php
session_start();
include("connect.php");
if(!empty($_SESSION))
{
	include("user_home.php");
?>



<?php
}
else{
	header("Location: index.php");
}
?>