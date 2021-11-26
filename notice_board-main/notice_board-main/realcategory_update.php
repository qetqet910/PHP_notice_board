<?php

    include('funtion.php');

    isset($_POST['name']) ? $name = $_POST['name'] : $name = null;
    isset($_POST['attr']) ? $attr = $_POST['attr'] : $attr = null;
    isset($_POST['cateid']) ? $cateid = $_POST['cateid'] : $cateid = null;

    $name = mysqli_real_escape_string($conn, $name);
    $attr = mysqli_real_escape_string($conn, $attr);

    isset($_POST['P-ENTER']) ? $P_ENTER = $_POST['P-ENTER'] : $P_ENTER = 0;
    isset($_POST['P-READ']) ? $P_READ = $_POST['P-READ'] : $P_READ = 0;
    isset($_POST['P_WRITE']) ? $P_WRITE = $_POST['P_WRITE'] : $P_WRITE = 0;
    isset($_POST['P_UPDATE']) ? $P_UPDATE = $_POST['P_UPDATE'] : $P_UPDATE = 0;
    isset($_POST['P_DELETE']) ? $P_DELETE = $_POST['P_DELETE'] : $P_DELETE = 0;

    isset($_POST['N_ENTER']) ? $N_ENTER = $_POST['N_ENTER'] : $N_ENTER = 0;
    isset($_POST['N_READ']) ? $N_READ = $_POST['N_READ'] : $N_READ = 0;
    isset($_POST['N_UPDATE']) ? $N_UPDATE = $_POST['N_UPDATE'] : $N_UPDATE = 0;
    isset($_POST['N_WRITE']) ? $N_WRITE = $_POST['N_WRITE'] : $N_WRITE = 0;
    isset($_POST['N_DELETE']) ? $N_DELETE = $_POST['N_DELETE'] : $N_DELETE = 0;

    $sql = "UPDATE notice_cate SET name = '$name', kind = '$attr', p_enter = '$P_ENTER', p_read = '$P_READ' , p_write = '$P_WRITE', p_update = '$P_UPDATE', p_delete = '$P_DELETE', n_enter = '$N_ENTER', n_read = '$N_READ', n_write = '$N_WRITE', n_update = '$N_UPDATE', n_delete = '$N_DELETE' WHERE id = '$cateid'";
    mysqli_query($conn, $sql);

    Location('index.php')
