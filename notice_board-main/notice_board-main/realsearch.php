<?php

include('header.php');

$list = '';

isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;

$view_article = 9;
$start = ($page - 1) * $view_article;

isset($_GET['result']) ? $keyword = mysqli_real_escape_string($conn, $_GET['result']) : $keyword = null;
isset($_GET['keyword']) ? $key = $_GET['keyword'] : $key = $keyword;

$sql = "SELECT * FROM notice_info WHERE title LIKE '%$keyword%' ORDER BY Bulletin DESC, date DESC limit $start, $view_article";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$http_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$link = "$_SERVER[REQUEST_URI]";
$tmpNumber = str_replace('/notice_board-main/notice_board-main/', '', $link);
$_SESSION['url'] = $tmpNumber;
?>
<main>
    <section class="wall">
        <h2 class="buze">검색 결과</h2>
        <ul class="mg">
            <li class="TopBar">
                <span>번호</span>
                <span>글쓴이</span>
                <span>제목</span>
                <span>시간</span>
                <span>조회수</span>
            </li>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                if ($row['Bulletin'] == 1) {
                    $list = $list . "<li class=\"Bulletin\">
                    <span>[공지]</span> 
                    <span>$row[usname]</span>
                    <span><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></span>
                    <span>$row[date]</span>
                    <span>$row[hit]</span></li>";
                } else {
                    $list = $list . "<li>
                    <span>No.$row[id]</span> 
                    <span>$row[usname]</span>
                    <span><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></span>
                    <span>$row[date]</span>
                    <span>$row[hit]</span></li>";
                }
            }
            if ($list != null) {
                echo $list;
            ?>
                <div class="paging">
                    <?php
                    include('search_page.php');
                    ?>
                </div>
            <?php
            } else {
                echo "<span class=\"searche\">죄송합니다 원하시는 검색 결과를 찾을 수 없습니다<hr><a href=\"index.php\" class=\"power\">홈으로 돌아가기<a></span>";
                unset($_SESSION['url']);
            }
            ?>
        </ul>
    </section>
</main>
<?php
include('footer.php');
?>