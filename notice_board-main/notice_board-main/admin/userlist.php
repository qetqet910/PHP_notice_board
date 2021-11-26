<?php
require_once("../header.php");

if ($_SESSION['authority'] != 2) {
    Location('index.php');
}

$list = '';

$sql = "SELECT * FROM notice_user WHERE authority = '1'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    if ($row['gender'] == null) {
        $row['gender'] = '';
    }
    if ($row['age'] == 0) {
        $row['age'] = '';
    }
    if ($row['birthday'] == "none-none-none") {
        $row['birthday'] = '';
    }
    $list = $list . "<li>
            <span>
                <div class=\"method\">UserID</div><div>$row[userid]</div>
            </span>
            <span>
                <div class=\"method\">UserPassword</div><div>$row[password]</div>
            </span>
            <span>
                <div class=\"method\">UserName</div><div>$row[username]</div>
            </span>
            <span>
                <div class=\"method\">Gender</div><div>$row[gender]</div>
            </span>
            <span>
                <div class=\"method\">Age</div><div>$row[age]</div>
            </span>
            <span>
                <div class=\"method\">Birthday</div><div>$row[birthday]</div>
            </span>
            <form method=\"POST\" action=\"userlist_modify.php\">
                <input type=\"hidden\" name=\"USID\" value=\"$row[id]\"/>

                <a href=\"userdelete.php?id=$row[id]\" class=\"btn\"><i class=\"fas fa-trash\"></i>회원 정보 삭제</a>
                <button id=\"b\" class=\"btn\" type=\"submit\"><i class=\"fas fa-pen\"></i>회원 정보 수정</button>
            </form>
        </li>";
}
?>

<body>
    <main>
        <h1 class="buze">회원목록</h1>
        <ul class="userlist" id="us">
            <?php echo $list; ?>
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
<?php require_once('../footer.php') ?>