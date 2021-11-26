<?php
    include("funtion.php");

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }
    
    $id = $_GET['id'];
    $sql = "DELETE FROM notice_info WHERE id = $id";
    mysqli_query($conn, $sql);

    $sql2 = "DELETE FROM notice_category WHERE id = $id";    
    mysqli_query($conn, $sql2);
    
    Location("notice_board_list.php");
?>