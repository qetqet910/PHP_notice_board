<?php
    include("funtion.php");

    $usname = $_POST['usname'];
    $title = $_POST['title'];
    $des = $_POST['des'];
    $time = $_POST['time'];
    $Bulletin = $_POST['Bulletin'];
    $password = $_POST['password'];
    $cate = $_POST['cate'];

    $title = preg_replace("/[#\&\+\-%@=\/\\\:;'\"`~\_|\*$#<>()\[\]\{\}]/i", "", $title);
    
    $sql = "INSERT INTO notice_info (usname, title, des, date, hit, Bulletin, password, cateid) VALUES('$usname', '$title', '$des', '$time', '0', '$Bulletin', '$password', '$cate')";
    mysqli_query($conn, $sql);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if($_FILES['file']['name'][0] != false){
        if($_FILES['file']){
            $sql2 = "SELECT * FROM notice_info ORDER BY date DESC limit 1";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($res2);

            $id = $row2['id'];

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
    Location("index.php");
?>