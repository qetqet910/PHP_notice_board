<?php include('config.php')?>
<?php
    function Location($root){
        if(isset($_SESSION['url'])){
            header("location: ".$_SESSION['url']);
        }else{
            header("location: $root");
        }
    }

    function identity($id, $password){
        $conn = mysqli_connect('localhost', 'root', '', 'notice_board');
        $sql = "SELECT * FROM notice_user WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)).'<br> <a href="index.php">메인페이지로 돌아가기</a>';
        $row = mysqli_fetch_array($result);
        isset($row['userid']) ? $id = $row['userid'] : $id = null;
        if($id && $password == $row['password']){
            $_SESSION['username'] = $row['username'];
            $_SESSION['authority'] = $row['authority'];

            return true;
        }else{
            return false;
        }
    }

    function func1($id){
        $conn = mysqli_connect('localhost', 'root', '', 'notice_board');
        $sql2 = "DELETE FROM notice_file WHERE id = '$id'";
        mysqli_query($conn, $sql2);
    }

    if (isset($_POST['id'])) {
        func1($_POST['id']);
    }

?>
<script>
    function B(modal){
        modal.style.display = "block";
    }
</script>
