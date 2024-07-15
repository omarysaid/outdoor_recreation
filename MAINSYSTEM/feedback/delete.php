<?php
session_start();
include '../../connection/connection.php';
$info_id = $_REQUEST['info_id'];
$query = "DELETE FROM info WHERE info_id=$info_id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($result) {

    header("Location: ./view.php?success=1");
} else {

    header("Location: ./view.php?success=0");
}
exit();