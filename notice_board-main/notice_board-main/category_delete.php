<?php
    include("funtion.php");

    $asd = $_POST['target'];

    for($i = 0; $i < count($asd); $i++){
        $sql = "DELETE FROM notice_cate WHERE id = '$asd[$i]'";
        mysqli_query($conn, $sql);

        $sql2 = "SELECT * FROM notice_info WHERE cateid = '$asd[$i]'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);
        $id = $row2['id'];
    
        $sql3 = "DELETE FROM notice_info WHERE id = $id";
        mysqli_query($conn, $sql3);
        $sql1 = "DELETE FROM notice_file WHERE idx = '$id'";
        mysqli_query($conn, $sql1);
    }

    Location('index.php');
?>