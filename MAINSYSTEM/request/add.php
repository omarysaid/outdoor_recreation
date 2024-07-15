<?php
session_start();
include '../../connection/connection.php';
$Status = "";

if (isset($_POST["add_request"])) {
    $user_id = $_POST['user_id'];
    $recreation_id = $_POST['recreation_id'];
    $date = $_POST['date'];
     $time = $_POST['time'];
  $participants = $_POST['participants'];
    if (empty($errors)) {
        $insert_new = "INSERT INTO request (user_id, recreation_id, date,time,participants) 
                            VALUES (' $user_id', ' $recreation_id', ' $date', ' $time ','$participants')";

        if (mysqli_query($connect, $insert_new)) {
            $Status = "Requested successfully";
             header("Location: ../../recreation_lists.php");
        } else {
            $Status = "Error occurred while adding user";
        }
    }
}

?>