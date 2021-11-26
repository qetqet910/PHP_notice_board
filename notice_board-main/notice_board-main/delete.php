<?php
    include("funtion.php");

    $viewid = $_POST['id'];
    $sql = "DELETE FROM notice_info WHERE id = $viewid";
    mysqli_query($conn, $sql);

    $sql1 = "DELETE FROM notice_file WHERE idx = $viewid";
    mysqli_query($conn, $sql1);

    if($viewid == "-1"){
        echo "<script>history.back()</script>";
    }else{
        Location("index.php");
    }
?>