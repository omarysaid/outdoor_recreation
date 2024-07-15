<?php
session_start();
include '../../connection/connection.php';
$request_id = $_REQUEST['request_id'];
$query = "DELETE FROM request WHERE request_id=$request_id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($result) {

    header("Location: ./view.php?success=1");
} else {

    header("Location: ./view.php?success=0");
}
exit();