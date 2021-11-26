<?php
    include('funtion.php');

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }
    isset($_POST['id']) ? $id = $_POST['id'] : $id = null; 
    isset($_POST['userid']) ? $userid = $_POST['userid'] : $userid = null; 
    isset($_POST['password']) ? $password = $_POST['password'] : $password = null; 
    isset($_POST['username']) ? $username = $_POST['username'] : $username = null;
    isset($_POST['gender']) ? $gender = $_POST['gender'] : $gender = null;
    isset($_POST['age']) ? $age = $_POST['age'] : $age = null;
    isset($_POST['birthday']) ? $birthday = $_POST['birthday'] : $birthday = null;

    mysqli_real_escape_string($conn, $userid);
    mysqli_real_escape_string($conn, $password);
    mysqli_real_escape_string($conn, $username);
    mysqli_real_escape_string($conn, $gender);
    mysqli_real_escape_string($conn, $age);
    mysqli_real_escape_string($conn, $birthday);

    // echo $userid."<br>";
    // echo $password."<br>";
    // echo $username."<br>";
    // echo $gender."<br>";
    // echo $age."<br>";
    // echo $birthday."<br>";

    // $sql = "UPDATE notice_info SET title = '$title', des = '$des' WHERE id = $id";
    $sql = "UPDATE notice_user SET userid = '$userid', password = '$password', username = '$username', gender = '$gender', age = '$age', birthday = '$birthday' WHERE id = '$id'";
    // $sql = "UPDATE notice_user SET userid = '$userid', password = '$password', username = '$username', gender = '$gender', age = '$age', birthday = '$birthday' WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    Location('userlist.php');
?>