<?php
    include("funtion.php");

    $id = $_POST['row1'];
    $title = $_POST['row2'];
    $des = $_POST['row3'];

    $sql = "SELECT * FROM notice_info WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="style/style.css">
<main>
    <div class="passmodal">
        <div class="pm">
            <p>수정 하려면 게시물 비밀번호를 입력하세요.</p>
            <p>게시물 비밀번호</p>
            <?php
                if(!empty($_POST['password'])){
                    $pass = $row['password'];
                    $ps = $_POST['password'];

                    if($pass == $ps){
                        ?>
                        <form action="update.php" method="POST">
                            <button type="submit" autofocus class="btn">확인</button>
                            <input type="hidden" name="row1" value="<?=$id?>">
                            <input type="hidden" name="row2" value="<?=$title?>">
                            <input type="hidden" name="row3" value="<?=$des?>">
                        </form>
                        <?php
                    }else{
                        echo "<script>alert('게시물 비밀번호와 일치하지 않습니다.')</script>";
                        ?>
                            <form action="" method="POST">
                                <input type="text" autofocus class="inp" placeholder="게시물 고유 비밀번호를 입력해주세요" required name="password">
                                <button type="submit" class="btn">확인</button>
                                <input type="hidden" name="row1" value="<?=$id?>">
                                <input type="hidden" name="row2" value="<?=$title?>">
                                <input type="hidden" name="row3" value="<?=$des?>">
                            </form>
                        <?php
                    }
                }else{
                    ?>
                        <form action="" method="POST">
                            <input type="text" class="inp" autofocus placeholder="게시물 고유 비밀번호를 입력해주세요" required name="password">
                            <button type="submit" class="btn">확인</button>
                            <input type="hidden" name="row1" value="<?=$id?>">
                            <input type="hidden" name="row2" value="<?=$title?>">
                            <input type="hidden" name="row3" value="<?=$des?>">
                        </form>
                    <?php
                }
            ?>
        </div>
    </div>
</main>