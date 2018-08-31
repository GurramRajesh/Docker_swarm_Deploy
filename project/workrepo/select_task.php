<?php
session_start();
include("connect.php");
$task_name = $_POST['task_name'];

$sql_select = "SELECT `project_title`,`phase_title` FROM `create_task` WHERE `task_name` = '$task_name'";
//$result = $conn->query($sql_select);
if ($result = $conn->query($sql_select)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
        printf ("%s,%s\n", $obj->project_title, $obj->phase_title);
    }

    /* free result set */
    //$result->close();
}

?>