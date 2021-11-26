<main>
    <section class="wall">
        <h2 class="buze">통합 게시판</h2>
        <?php
        require_once("list.php");

        isset($_GET['cate']) ? $cate = $_GET['cate'] : $cate = null;
        isset($_SESSION['authority']) ? $aut = $_SESSION['authority'] : $aut = null;

        if ($aut >= 1) {
            if ($cate != null) {
                $NavSql = "SELECT * FROM notice_cate WHERE kind = '$cate'";
                $NavRes = mysqli_query($conn, $NavSql);
                $NavRow = mysqli_fetch_array($NavRes);
                if ($NavRow['p_write'] == '1') {
                    echo ("<a class=\"btn\" href=\"create.php\"><i class=\"fas fa-plus\"></i>만들기</a>");
                }
            } else {
                echo ("<a class=\"btn\" href=\"create.php\"><i class=\"fas fa-plus\"></i>만들기</a>");
            }
        } else {
            if ($cate != null) {
                $NavSql = "SELECT * FROM notice_cate WHERE kind = '$cate'";
                $NavRes = mysqli_query($conn, $NavSql);
                $NavRow = mysqli_fetch_array($NavRes);
                if ($NavRow['n_write'] == '1') {
                    echo ("<a class=\"btn\" href=\"create.php\"><i class=\"fas fa-plus\"></i>만들기</a>");
                }
            } else {
                echo ("<a class=\"btn\" href=\"create.php\"><i class=\"fas fa-plus\"></i>만들기</a>");
            }
        }
        ?>
    </section>
</main>