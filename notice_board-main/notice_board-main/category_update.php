<?php
    include("header.php");

    $cateid = $_POST['target'];
    $sql = "SELECT * FROM notice_cate WHERE id = '$cateid'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $catename = $row['name'];
    $cateattr = $row['kind'];

    $p_enter = $row['p_enter'];
    $p_read = $row['p_read'];
    $p_write= $row['p_write'];
    $p_update = $row['p_update'];
    $p_delete = $row['p_delete'];

    $n_enter = $row['n_enter'];
    $n_read = $row['n_read'];
    $n_write = $row['n_write'];
    $n_update = $row['n_update'];
    $n_delete = $row['n_delete'];



?>
<main>
    <section class="wall">
    <h2 class="buze">카테고리</h2>
        <form action="realcategory_update.php" class="cateform" method="POST" >
            <input type="text" required placeholder="카테고리의 이름을 입력해주세요." value="<?= $catename ?>" name="name" />
            <input type="text" required placeholder="카테고리의 속성을 골라주세요." value="<?= $cateattr ?>" list="cars" name="attr">
            <datalist id="cars">
                <option>Free</option>
                <option>Alert</option>
                <option>Debate</option>
                <option>Fixed</option>
                <option>Tice</option>
            </datalist>
            <h6 class="bububuze">Checking - 가능 UnChecking 불가능</h6>
            <section>
                <div class="grid">
                    <span>
                        <div>대상</div>
                        <div>행동<br>권한</div>
                    </span>
                    <span>
                        접근여부
                    </span>
                    <span>
                        읽기
                    </span>
                    <span>
                        만들기
                    </span>
                    <span>
                        수정하기
                    </span>
                    <span>
                        삭제하기
                    </span>
                    <span>
                        회원
                    </span>
                    <?php
                        if($p_enter == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="P-ENTER" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="P-ENTER" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($p_read == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="P-READ" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="P-READ" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($p_write == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="P_WRITE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="P_WRITE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($p_update == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="P_UPDATE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="P_UPDATE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($p_delete == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="P_DELETE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="P_DELETE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <span>
                        비회원
                    </span>
                    <?php
                        if($n_enter == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="N_ENTER" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="N_ENTER" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($n_read == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="N_READ" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="N_READ" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($n_write == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="N_WRITE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="N_WRITE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($n_update == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="N_UPDATE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="N_UPDATE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                    <?php
                        if($n_delete == 1){
                            ?>
                                <span>
                                    <input type="checkbox" name="N_DELETE" value="1" checked>
                                </span>
                            <?php
                        }else{
                            ?>
                                <span>
                                    <input type="checkbox" name="N_DELETE" value="1">
                                </span>
                            <?php
                        }
                    ?>
                </div>
            </section>
            <button class="btn">
                <ion-icon name="create-outline"></ion-icon>
                만들기
            </button>
            <input type="hidden" name="cateid" value="<?= $cateid ?>">
        </form>
    </section>
</main>
<?php
    include('footer.php');
?>