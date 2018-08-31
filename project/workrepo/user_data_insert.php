<?php
session_start();
include("connect.php");
//print_r($_POST);
if (isset($_POST['submit'])) {
if(empty($_POST['emp_id']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['mobileno']) ||empty($_POST['emailid']) ||empty($_POST['designation']))
{
	header("Location: add_user.php");
	//echo "Not Insertted";
}
else{

$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$emp_id = $_POST['emp_id'];
$first_name = $_POST['first_name'];
$mid_name = $_POST['mid_name'];
$last_name = $_POST['last_name'];
$mobileno = $_POST['mobileno'];
$emailid = $_POST['emailid'];
$designation = $_POST['designation'];
$salary = $_POST['salary'];
$status = $_POST['status'];
$employmenttype = $_POST['employmenttype'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$insertted_by = $_SESSION['user_name'];
$insertted_on = date("Y-m-d h:i:s");
$photo =  $_FILES["fileToUpload"]["name"];

	$sql = "INSERT INTO users (emp_id, first_name, middle_name, last_name, mobile_no, email_id, designation, salary, status, employment_type, username, password, photo, inserted_by, inserted_on) VALUES ('$emp_id', '$first_name', '$mid_name', '$last_name', '$mobileno', '$emailid', '$designation', '$salary', '$status', '$employmenttype', '$user_name', '$password', '$photo' ,'$insertted_by', '$insertted_on')";
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
    	header("Location: add_user.php");
    	
	} else {
		header("Location: add_user.php");
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}




}
?>