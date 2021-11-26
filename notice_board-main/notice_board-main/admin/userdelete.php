<?php
    include("funtion.php");

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM notice_user WHERE id = $id";
    mysqli_query($conn, $sql);
    Location("userlist.php");
?>