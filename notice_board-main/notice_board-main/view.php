<?php

    include("header.php");

    isset($_GET['cate']) ? $cate = $_GET['cate'] : $cate = null;
    isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
    isset($_SESSION['authority']) ? $authority = $_SESSION['authority'] : $authority = null;

    $sql = "SELECT * FROM notice_info WHERE id = $id";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    $sp1 = $row['id'];
    $sp1 = str_replace('<br>', '', $sp1);
    $sp2 = $row['title'];
    $sp2 = str_replace('(수정됨)', '', $sp2);
    $sp3 = $row['des'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $cateid = $row['cateid'];
    $sql1234 = "SELECT * FROM notice_cate WHERE id = '$cateid'";
    $sql12345 = mysqli_query($conn, $sql1234);
    $sql123456 = mysqli_fetch_array($sql12345);

    if(isset($_SESSION['authority'])){
        // 회원
        if($sql123456['p_enter'] == 1 || $authority == 2){
            // 회원 통과
        }else{
            // 회원 통과 실패
            echo "<script> alert('로그인이 필요한 서비스 입니다 로그인 후 이용해주세요.')</script>";
            echo "<script> location.href = 'signup.php'</script>";
        }

        if($sql123456['p_read'] == 1 || $authority == 2){
                        
        }else{
            echo "<script> alert('읽기 권한이 없습니다')</script>";
            echo "<script> location.href = 'index.php'</script>";
        }
    }else{
        // 비회원
        if($sql123456['n_enter'] == 1 || $authority == 2){
            // 비회원 통과
        }else{
            echo "<script> alert('로그인이 필요한 서비스 입니다 로그인 후 이용해주세요.')</script>";
            echo "<script> location.href = 'signup.php'</script>";
        }

        if($sql123456['p_read'] == 1 || $authority == 2){
                        
        }else{
            echo "<script> alert('읽기 권한이 없습니다')</script>";
            echo "<script> location.href = 'index.php'</script>";
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    isset($row['usname']) ? $usname = $row['usname'] : $usname = null;
    isset($_SESSION['username']) ? $username = $_SESSION['username'] : $username = null;
    isset($_SESSION['authority']) ? $aut = $_SESSION['authority'] : $aut = null;

    $sql1 = "SELECT * FROM notice_file WHERE idx = '$id'";
    $res1 = mysqli_query($conn, $sql1);
    $cnt1 = mysqli_num_rows($res1);
    
    if(!empty($id) && empty($_COOKIE["board_free_$id"])) {
        $sql = "UPDATE notice_info SET hit = hit + 1 WHERE id = $id";
        $result = mysqli_query  ($conn, $sql) or die(mysqli_error($conn));
        setcookie("board_free_$id", TRUE, time() + (60 * 60 * 24), '/');
    }
    
    if(isset($id)){?>
    <main>
        <section class="wall">
            <h2 class="buze">상세 보기</h2>
            <ul class="view">
            <?php
                if(isset($row)){
                    echo "<div>
                    <li>
                        <div><h6>고유 번호</h6><span>{$sp1}</span></div>";
                    echo "<div><h6>제목</h6><span>{$sp2}</span></div>";
                    echo "<div><h6>내용</h6><span>{$sp3}</span></div></li>
                        </div>";
                }
            ?>
            </ul>
            <?php
                if($cnt1 > 0){
                ?>
                    <div class="previewIMG">
                        <?php
                            while($row1 = mysqli_fetch_array($res1)){
                                $R = $row1['route'];
                                $F = $row1['file_name'];
                                ?>
                                <a href="download.php?file=<?=$R?>"><img src="<?=$R?>" alt="<?=$F?>"></a>
                                <?php
                            }
                        ?>
                    </div>
                <?php
                } 
            ?>
            <div class="buttons">
            <?php
                if(isset($_SESSION['authority'])){
                    // 회원
                    if($sql123456['p_update'] == 1 && $username == $usname || $authority == 2){
                        ?>
                            <form action="update.php" method="POST">
                                <input type="hidden" id="row" name="row1" value="<?=$sp1?>">
                                <input type="hidden" id="row" name="row2" value="<?=$sp2?>">
                                <input type="hidden" id="row" name="row3" value="<?=$sp3?>">
                                <button class="btn"><i class="fas fa-pen"></i>수정하기</button>
                            </form>
                        <?php
                    }

                    if($sql123456['p_delete'] == 1 && $username == $usname || $authority == 2){
                        ?>
                            <form action="delete.php" method="POST">
                                <input type="hidden" id="id" name="id" value="<?=$id?>">
                                <button class="btn" onclick="cut()"><i class="fas fa-trash"></i>삭제하기</button>
                            </form>
                        <?php
                    }
                }else{
                    // 비회원
                    if($sql123456['n_update'] == 1 && $usname == "비회원"){
                        ?>
                            <form action="NMVU.php" method="POST">
                                <input type="hidden" id="row" name="row1" value="<?=$sp1?>">
                                <input type="hidden" id="row" name="row2" value="<?=$sp2?>">
                                <input type="hidden" id="row" name="row3" value="<?=$sp3?>">
                                <button class="btn"><i class="fas fa-pen"></i>수정하기</button>
                            </form> 
                        <?php
                    }

                    if($sql123456['n_delete'] == 1 && $usname = "비회원"){
                        ?>
                            <form action="NMVD.php" method="POST">
                                <input type="hidden" id="id" name="id" value="<?=$id?>">
                                <button class="btn"><i class="fas fa-trash"></i>삭제하기</button>
                            </form>
                        <?php
                    }
                }
            ?>
            </div>
        </section>
    </main>
    <?php
    }
    include("footer.php");
?>
<script>
    function cut(){
        const cf = confirm("정말 지우시겠습니까?");
        if(cf){
            alert("성공적으로 삭제되었습니다.");
        }else{
            const id = document.querySelector("#id");
            id.value = "-1";
        }
    }
</script>