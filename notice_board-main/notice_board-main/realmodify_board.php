<?php
    include('funtion.php');

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }

    isset($_POST['id']) ? $id = $_POST['id'] : $id = null; 
    isset($_POST['author']) ? $author = $_POST['author'] : $author = null; 
    isset($_POST['title']) ? $title = $_POST['title'] : $title = null;
    isset($_POST['des']) ? $des = nl2br($_POST['des']) : $des = null;
    isset($_POST['date']) ? $date = $_POST['date'] : $date = null;
    isset($_POST['hit']) ? $hit = $_POST['hit'] : $hit = null;
    isset($_POST['alert']) ? $alert = $_POST['alert'] : $alert = null;
    isset($_POST['NonM']) ? $NonM = $_POST['NonM'] : $NonM = null;
    isset($_POST['cate']) ? $cate = $_POST['cate'] : $cate = null;

    $catesql = "SELECT * FROM notice_cate WHERE name = '$cate'";
    $cateres = mysqli_query($conn, $catesql);
    $caterow = mysqli_fetch_array($cateres);
    $ci = $caterow['id'];

    mysqli_real_escape_string($conn, $id);
    mysqli_real_escape_string($conn, $author);
    mysqli_real_escape_string($conn, $title);
    mysqli_real_escape_string($conn, $des);
    mysqli_real_escape_string($conn, $date);
    mysqli_real_escape_string($conn, $hit);
    mysqli_real_escape_string($conn, $alert);
    mysqli_real_escape_string($conn, $NonM);
    mysqli_real_escape_string($conn, $cate);

    $sql = "UPDATE notice_info SET usname = '$author', title = '$title', des = '$des', date = '$date', hit = '$hit', Bulletin = '$alert', password = '$NonM', cateid = '$ci' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

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

    Location('notice_board_list.php');
?>