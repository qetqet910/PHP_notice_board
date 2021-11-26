<?php
include("header.php");

$lll = '';
$lll1 = '';

$asdasd = "SELECT * FROM notice_cate";
$asdres = mysqli_query($conn, $asdasd);

while ($asdrow = mysqli_fetch_array($asdres)) {
    $lll = $lll . "<li>
                        <input type=\"checkbox\" name=\"target[]\" value=\"$asdrow[id]\" id=\"$asdrow[id]\">
                        <label for=\"$asdrow[id]\">$asdrow[name]</label> 
                    </li>";

    $lll1 = $lll1 . "<li>
                            <input type=\"radio\" name=\"target\" value=\"$asdrow[id]\" id=\"$asdrow[id]1\">
                            <label for=\"$asdrow[id]1\">$asdrow[name]</label> 
                    </li>";
}
?>
<main>
    <section class="wall">
        <h2 class="buze">카테고리</h2>
        <form action="realcategory.php" class="cateform" method="POST">
            <input type="text" required placeholder="카테고리의 이름을 입력해주세요." name="name" />
            <input type="text" required placeholder="카테고리의 속성을 골라주세요." list="cars" name="attr">
            <datalist id="cars">
                <option>Free</option>
                <option>Alert</option>
                <option>Debate</option>
                <option>Fixed</option>
                <option>Tice</option>
            </datalist>
            <datalist id="pos">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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
                    <span>
                        <input type="checkbox" name="P-ENTER" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="P-READ" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="P-CREATE" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="P-UPDATE" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="P-DELETE" value="1">
                    </span>
                    <span>
                        비회원
                    </span>
                    <span>
                        <input type="checkbox" name="N-ENTER" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="N-READ" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="N-CREATE" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="N-UPDATE" value="1">
                    </span>
                    <span>
                        <input type="checkbox" name="N-DELETE" value="1">
                    </span>
                </div>
            </section>
            <button class="btn">
                <ion-icon name="create-outline"></ion-icon>
                만들기
            </button>
        </form>

        <form id="catedelete" action="category_delete.php" method="POST">
            <nav>
                <ul>
                    <?php
                    echo $lll;
                    ?>
                </ul>
            </nav>
            <button style="background-color: rgb(247, 88, 71);" type="submit" class="btn">
                <ion-icon name="trash-outline"></ion-icon>
                삭제하기
            </button>
        </form>

        <form id="cateupdate" action="category_update.php" method="POST">
            <nav>
                <ul>
                    <?php
                    echo $lll1;
                    ?>
                </ul>
            </nav>
            <button style="background-color: rgb(71, 88, 247);" type="submit" class="btn">
                <ion-icon name="cloud-upload-outline"></ion-icon>
                수정하기
            </button>
        </form>
    </section>
</main>
<?php
include("footer.php");
?>
<!-- <script type="text/javascript" src="vanilla-tilt.js"></script> -->
<script>
    // VanillaTilt.init(document.querySelector(".grid"), {
    // 	max: 8,
    // 	speed: 140
    // });

    // //It also supports NodeList
    // const inputs = document.querySelectorAll('.grid span input');

    // // console.log(inputs[0]);
    // // console.log(inputs[5]);
</script>