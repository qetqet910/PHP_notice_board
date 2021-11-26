<?php
    require_once("header.php");

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }

    $list = '';

    $sql = "SELECT * FROM notice_info ORDER BY Bulletin DESC, date DESC";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $infoidx = "SELECT * FROM notice_info ORDER BY date DESC limit 1";
    $idxres = mysqli_query($conn, $infoidx) or die(mysqli_error($conn));
    $idxrow = mysqli_fetch_array($idxres);

    while($row = mysqli_fetch_array($res)){
        $id = $row['id'];

        $sql4 = "SELECT * FROM notice_file WHERE idx = '$id'";
        $res4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
        $row4 = mysqli_fetch_array($res4);
        $num4 = mysqli_num_rows($res4);

        $catesql = "SELECT * FROM notice_cate WHERE id = $row[cateid]";
        $cateres = mysqli_query($conn, $catesql);
        $caterow = mysqli_fetch_array($cateres);
        $cate = $caterow['name'];
        

        if(!empty($row['password'])){
            $list = $list."<li>
                <span>
                    <div class=\"method\">Board ID</div><div>$id</div>
                </span>
                <span>
                    <div class=\"method\">Author</div><div>$row[usname]</div>
                </span>
                <span>
                    <div class=\"method\">Title</div><div>$row[title]</div>
                </span>
                <span>
                    <div class=\"method\">Description</div><div>$row[des]</div>
                </span>
                <span>
                    <div class=\"method\">Date</div><div>$row[date]</div>
                </span>
                <span>
                    <div class=\"method\">hit</div><div>$row[hit]</div>
                </span>
                <span>
                    <div class=\"method\">Alert</div><div>$row[Bulletin]</div>
                </span>
                <span>
                    <div class=\"method\">Non-members Board Password</div><div>$row[password]</div>
                </span>
                <span>
                    <div class=\"method\">Category</div><div>$cate</div>
                </span>
                <span>
                    <div class=\"method\">Image Count</div><div>$num4</div>
                </span>
                <form method=\"POST\" action=\"board_modify.php\">
                    <input type=\"hidden\" name=\"USID\" value=\"$row[id]\"/>
                    <input type=\"hidden\" name=\"USID2\" value=\"$row[cateid]\">

                    <a href=\"boarddelete.php?id=$row[id]\" class=\"btn\"><i class=\"fas fa-trash\"></i>게시물 정보 삭제</a>
                    <button id=\"b\" class=\"btn\" type=\"submit\"><i class=\"fas fa-pen\"></i>게시물 정보 수정</button>
                </form>
            </li>";
        }else{
            $list = $list."<li>
                <span>
                    <div class=\"method\">Board ID</div><div>$row[id]</div>
                </span>
                <span>
                    <div class=\"method\">Author</div><div>$row[usname]</div>
                </span>
                <span>
                    <div class=\"method\">Title</div><div>$row[title]</div>
                </span>
                <span>
                    <div class=\"method\">Description</div><div>$row[des]</div>
                </span>
                <span>
                    <div class=\"method\">Date</div><div>$row[date]</div>
                </span>
                <span>
                    <div class=\"method\">hit</div><div>$row[hit]</div>
                </span>
                <span>
                    <div class=\"method\">Alert</div><div>$row[Bulletin]</div>
                </span>
                    <span>
                    <div class=\"method\">Category</div><div>$cate</div>
                </span>
                <span>
                    <div class=\"method\">Image Count</div><div>$num4</div>
                </span>
                <form method=\"POST\" action=\"board_modify.php\">
                    <input type=\"hidden\" name=\"USID\" value=\"$row[id]\"/>
                    <input type=\"hidden\" name=\"USID2\" value=\"$row[cateid]\">

                    <a href=\"boarddelete.php?id=$row[id]\" class=\"btn\"><i class=\"fas fa-trash\"></i>게시물 정보 삭제</a>
                    <button id=\"b\" class=\"btn\" type=\"submit\"><i class=\"fas fa-pen\"></i>게시물 정보 수정</button>
                </form>
            </li>";
        }
    }
?>
<body>
    <main>
        <h1 class="buze">게시글 목록</h1>
        <ul class="userlist">
            <?php echo $list;?>
            <div class="sidebar">
                <ul>
                    <li>관리자 메뉴 <i class="fas fa-user-shield"></i></li>
                    <li><a href="userlist.php">회원 목록</a></li>
                    <li><a href="notice_board_list.php">게시글 목록</a></li>
                    <li><a href="create_by_category.php">카테고리</a></li>
                    <li><a href="#">아직 미정</a></li>
                    <li><a href="#">아직 미정</a></li>
                    <li><a href="#">아직 미정</a></li>
                    <li><a href="#">아직 미정</a></li>
                    <li><a href="#">아직 미정</a></li>
                </ul>
            </div>
        </ul>
    </main>
</body>
<?php require_once('footer.php')?>
