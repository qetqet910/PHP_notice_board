<?php
if (!empty($_GET['cate'])) {
    $cate = $_GET['cate'];
} else {
    $cate = null;
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$list = '';

$view_article = 8;
$start = ($page - 1) * $view_article;

if (empty($_GET['cate'])) {
    $sql1 = "SELECT * FROM notice_info";
    $re = mysqli_query($conn, $sql1);
    $total_article = mysqli_num_rows($re);
} else {
    $sp12345 = "SELECT * FROM notice_cate WHERE kind = '$cate'";
    $res12345 = mysqli_query($conn, $sp12345);
    $row12345 = mysqli_fetch_array($res12345);

    $sql2 = "SELECT * FROM notice_info WHERE cateid = $row12345[id]";
    $res2 = mysqli_query($conn, $sql2);
    $total_article = mysqli_num_rows($res2);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($cate == null) {
    $sql = "SELECT * FROM notice_info ORDER BY Bulletin DESC, date DESC limit $start, $view_article";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $cateres = $conn->query("SELECT * FROM notice_cate WHERE id = $row[cateid]");
        $caterow = mysqli_fetch_array($cateres);



        $nid = $row['id'];

        if ($row['Bulletin'] == 1) {
            $list = $list . "<tr class=\"Bulletin\">
                <td><i class=\"fas fa-bullhorn\"></i></td> 
                <td>공지사항</td>
                <td><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></td>
                <td>$row[usname]</td>
                <td>$row[date]</td>
                <td>$row[hit]</td>
                </tr>";
        } else {
            $list = $list . "<tr>
                <td>$row[id]</td>          
                <td>$caterow[name]</td>
                <td><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></td>
                <td>$row[usname]</td>
                <td>$row[date]</td>
                <td>$row[hit]</td>  
                </tr>";
        }
    }
} else {
    $catesql1 = "SELECT * FROM notice_cate WHERE kind = '$cate' LIMIT $start, $view_article";
    $cateres1 = mysqli_query($conn, $catesql1);

    while ($caterow1 = mysqli_fetch_array($cateres1)) {

        $sql = "SELECT * FROM notice_info WHERE cateid = '$caterow1[id]' ORDER BY date DESC";
        $res = mysqli_query($conn, $sql);



        while ($row = mysqli_fetch_array($res)) {
            if ($row['Bulletin'] == 1) {
                $list = $list . "<tr class=\"Bulletin\">
                    <td><i class=\"fas fa-bullhorn\"></i></td> 
                    <td>alert</td>
                    <td><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></td>
                    <td>$row[usname]</td>
                    <td>$row[date]</td>
                    <td>$row[hit]</td>
                    </tr>";
            } else {
                $list = $list . "<tr>
                    <td>$row[id]</td> 
                    <td>$caterow1[name]</td>
                    <td><a class=\"power\" href=\"view.php?id=$row[id]\">$row[title]</a></td>
                    <td>$row[usname]</td>
                    <td>$row[date]</td>
                    <td>$row[hit]</td>
                    </tr>";
            }
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<div class="main">
    <li class="TopBar" id="Top1">
        <?php
        require("search.php");
        ?>
    </li>
    <table>
        <thead class="TopBar" id="Top2">
            <tr>
                <td>번호</td>
                <td>카테고리</td>
                <td>제목</td>
                <td>글쓴이</td>
                <td>시간</td>
                <td>조회수</td>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $list;
            ?>
        </tbody>
    </table>
    <div class="paging">
        <?php
        include('list_page.php');
        ?>
    </div>
</div>