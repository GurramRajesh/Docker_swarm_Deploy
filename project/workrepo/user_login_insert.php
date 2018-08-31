<?php
session_start();
include('connect.php');

$error_msg=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
	header("Location: index.php");
	//$error_msg = "Username or Password is invalid";
}
else
{
// Define $username and $password
 $username=$_POST['username'];
 $password=$_POST['password'];
 $date = date("Y-m-d g:i a");
 $ip_address = $_SERVER["REMOTE_ADDR"];
 $login_status = 1;
 
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT id,username,first_name,emp_id FROM `users` WHERE username ='$username' AND password ='$password'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
	    {
	    	 $_SESSION['user_id']=$row['id'];
	    	 $_SESSION['user_name']=$row['username'];
	    	 $_SESSION['name'] = $row['first_name'];
	    	 $_SESSION['emp_id'] = $row['emp_id'];
	    }
	   
	    $sql = "INSERT INTO `user_login`(emp_id, login_status, login_ip_address, login_time) VALUES ('".$_SESSION['emp_id']."', '".$login_status."', '".$ip_address."', '$date')";
	    if($conn->query($sql) === TRUE){
	    	header("Location: user_work_report.php");	
	    }else{
	    	header("Location: index.php");
	    }
	    
	}
	else{
		header("Location: index.php");
	}
}
}

?>
