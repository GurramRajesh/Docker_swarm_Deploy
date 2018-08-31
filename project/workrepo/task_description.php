<?php
session_start();
include("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
if (isset($_POST['submit'])) {
if(empty($_POST['description']))
{
	header("Location: assign_task.php");
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

echo $description_title = $_POST['description_title'];	
echo $project_id = $_POST['project_id'];
echo $phase_id = $_POST['phase_id'];
echo $task_id = $_POST['created_task_id'];
echo $description = $_POST['description'];
echo $photo =  $_FILES["fileToUpload"]["name"];
echo $datetime = $date->format("Y/m/d g:i a");

$sql = "INSERT INTO task_description (project_id, phase_id, created_task_id, description_title, description_text, files, inserted_datetime) VALUES ('$project_id', '$phase_id', '$task_id', '$description_title', '$description', '$photo', '$datetime')";
if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
    	header("Location: assign_task.php");
    	
	} else {
		header("Location: assign_task.php");
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
}
?>