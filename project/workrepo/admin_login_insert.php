<?php
session_start();
include('connect.php');

$error_msg=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
	header("Location: admin_login.php");
	//$error_msg = "Username or Password is invalid";
}
else
{
// Define $username and $password
 $username=$_POST['username'];
 $password=$_POST['password'];

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT id,username FROM `admin_login` WHERE username ='$username' AND password ='$password'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
	    {
	    	 $_SESSION['user_id']=$row['id'];
	    	 $_SESSION['user_name']=$row['username'];
	    }
	    header("Location: admin_dashbord.php");
	}
	else{
		header("Location: admin_login.php");
	}
}
}

?>