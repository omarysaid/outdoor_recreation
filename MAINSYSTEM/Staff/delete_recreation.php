<?php
session_start();
include '../../connection/connection.php';
$recreation_id = $_REQUEST['recreation_id'];
$query = "DELETE FROM recreation WHERE recreation_id=$recreation_id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($result) {

    header("Location: ./view_recreation.php?success=1");
} else {

    header("Location: ./view_recreation.php?success=0");
}
exit();