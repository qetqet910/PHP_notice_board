<?php
    include("funtion.php");

    $id = $_POST['id'];
    $title = $_POST['title']."(수정됨)";

    $des = $_POST['des'];
    $des = preg_replace("/[#\&\+\-%@=\/\\\:;'\"`~\_|\*$#<>()\[\]\{\}]/i", "", $des);
    $des = nl2br($des);

    $cate = $_POST['cate'];

    date_default_timezone_set("Asia/Seoul");

    mysqli_real_escape_string($conn, $title);
    mysqli_real_escape_string($conn, $des);

    $sql = "UPDATE notice_info SET title = '$title', des = '$des', cateid = '$cate' WHERE id = $id";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql1);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    if($_FILES['file']['name'][0] != false){
        if($_FILES['file']){  
            $cnt = count($_FILES['file']['name']);
            $file = $_FILES['file'];
            $my_directory = 'server/imageS/';
        
            for($i = 0; $i < $cnt; $i++){
                $name = $file['name'][$i];
                $type = $file['type'][$i];
                $size = $file['size'][$i];
                $tmp_name = $file['tmp_name'][$i];
                $finishR = $my_directory.$name;
        
                $route = move_uploaded_file($tmp_name, $my_directory.$name);
        
                $sql1 = "INSERT INTO notice_file (route, file_name, type, size, idx) VALUES ('$finishR', '$name', '$type', '$size', '$id')";
                $res1 = mysqli_query($conn, $sql1);
            }
        }
    }

    Location('index.php');
?>