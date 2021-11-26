
<?php
    include('funtion.php');

    isset($_POST['name']) ? $name = $_POST['name'] : $name = null;
    isset($_POST['attr']) ? $attr = $_POST['attr'] : $attr = null;

    $name = mysqli_real_escape_string($conn, $name);
    $attr = mysqli_real_escape_string($conn, $attr);

    isset($_POST['P-ENTER']) ? $P_ENTER = $_POST['P-ENTER'] : $P_ENTER = 0;
    isset($_POST['P-READ']) ? $P_READ = $_POST['P-READ'] : $P_READ = 0;
    isset($_POST['P-UPDATE']) ? $P_UPDATE = $_POST['P-UPDATE'] : $P_UPDATE = 0;
    isset($_POST['P-CREATE']) ? $P_CREATE = $_POST['P-CREATE'] : $P_CREATE = 0;
    isset($_POST['P-DELETE']) ? $P_DELETE = $_POST['P-DELETE'] : $P_DELETE = 0;
    isset($_POST['N-ENTER']) ? $N_ENTER = $_POST['N-ENTER'] : $N_ENTER = 0;
    isset($_POST['N-READ']) ? $N_READ = $_POST['N-READ'] : $N_READ = 0;
    isset($_POST['N-UPDATE']) ? $N_UPDATE = $_POST['N-UPDATE'] : $N_UPDATE = 0;
    isset($_POST['N-CREATE']) ? $N_CREATE = $_POST['N-CREATE'] : $N_CREATE = 0;
    isset($_POST['N-DELETE']) ? $N_DELETE = $_POST['N-DELETE'] : $N_DELETE = 0;

    $sql = "INSERT INTO notice_cate (name, kind, p_enter, p_read, p_write, p_update, p_delete, n_enter, n_read, n_write, n_update, n_delete) VALUES ('$name', '$attr', '$P_ENTER', '$P_READ', '$P_UPDATE', '$P_CREATE', '$P_DELETE', '$N_ENTER', '$N_READ', '$N_UPDATE', '$N_CREATE', '$N_DELETE')";
    mysqli_query($conn, $sql);

    // $sql = "SELECT * FROM notice_cate";
    // $res = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($res);


    Location("index.php");
?>
<!--
P-ENTER
P-READ
P-UPDATE
P-CREATE
P-DELETE

N-ENTER
N-READ
N-UPDATE
N-CREATE
N-DELETE 
-->