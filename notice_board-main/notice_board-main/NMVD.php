<?php
    include("funtion.php");

    isset($_POST['id']) ? $id = $_POST['id'] : $id = null;
    isset($_POST['password']) ? $password = $_POST['password'] : $password = null;

    $sql = "SELECT * FROM notice_info WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
        if(!empty($password)){
            if($password == $row['password'] && strlen($password) == strlen($row['password'])){
                $sql = "DELETE FROM notice_info WHERE id = $id";
                mysqli_query($conn, $sql);
                Location("index.php");
                // var_dump($password);
                // var_dump($row['password']);
            }
            else{
                echo "<script>alert('게시물 비밀번호와 일치하지 않습니다.')</script>";
            }
        }
?>
<link rel="stylesheet" href="style/style.css">
<main>
    <div class="passmodal">
        <div class="pm">
            <p>삭제 하려면 게시물 비밀번호를 입력하세요.</p>
            <p>게시물 비밀번호</p>
            <form action="" method="POST">
                <input type="text" name="password" autofocus class="inp" placeholder="게시물 고유 비밀번호를 입력해주세요" required name="password">
                <button type="submit" class="btn">확인</button>
                <input type="hidden" name="id" value="<?=$id?>">
            </form>
        </div>
    </div>
</main>
