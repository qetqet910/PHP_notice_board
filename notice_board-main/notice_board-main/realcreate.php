<?php
    include("funtion.php");

    $title = $_POST['title'];
    $title = preg_replace("/[#\&\+\-%@=\/\\\:;'\"`~\_|\*$#<>()\[\]\{\}]/i", "", $title);

    $cate = $_POST['cate'];

    $des = $_POST['des'];
    $des = preg_replace("/[#\&\+\-%@=\/\\\:;'\"`~\_|\*$#<>()\[\]\{\}]/i", "", $des);
    $des = nl2br($des);
    
    isset($_POST['Bulletin']) ? $Bulletin = $_POST['Bulletin'] : $Bulletin = 0;
    isset($_SESSION['username']) ? $usname = $_SESSION['username'] : $usname = null;
    
    date_default_timezone_set("Asia/Seoul");
    $time = date("Y-m-d H:i:s");

    $title = mysqli_real_escape_string($conn, $title);
    $des = mysqli_real_escape_string($conn, $des);

    $catesql = "SELECT * FROM notice_cate WHERE id = '$cate'";
    $cateres = mysqli_query($conn ,$catesql);
    $caterow = mysqli_fetch_array($cateres);
    isset($caterow['id']) ? $cateid = $caterow['id'] : $cateid = 0;
    
    if($Bulletin == 1){
        $sql = "INSERT INTO notice_info (usname, title, des, date, hit, Bulletin, cateid) VALUES('$usname', '$title', '$des', '$time', '0', '$Bulletin', '5')";
        mysqli_query($conn, $sql);
    }else{
        $sql = "INSERT INTO notice_info (usname, title, des, date, hit, Bulletin, cateid) VALUES('$usname', '$title', '$des', '$time', '0', '$Bulletin', '$cateid')";
        mysqli_query($conn, $sql);
    }


    // $sql2 = "SELECT * FROM notice_info ORDER BY date DESC limit 1";
    // $res2 = mysqli_query($conn, $sql2);
    // $row2 = mysqli_fetch_array($res2); // $row2는 id를 얻기 위함

    // if($Bulletin == 1){
    //     $sql3 = "INSERT INTO notice_category (id, cate) VALUES ('$row2[id]', 'alert')";
    //     $res3 = mysqli_query($conn, $sql3);
    // }else{
    //     $sql3 = "INSERT INTO notice_category (id, cate) VALUES ('$row2[id]', '$cate')";
    //     $res3 = mysqli_query($conn, $sql3);
    // }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if($_FILES['file']['name'][0] != false){
        if($_FILES['file']){  
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

