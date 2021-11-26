<?php
include('header.php');

echo $_SERVER["DOCUMENT_ROOT"];

if ($_SESSION['authority'] != 2) {
    Location('index.php');
}

isset($_POST['USID']) ? $userid = $_POST['USID'] : $userid = null;

$sql = "SELECT * FROM notice_user WHERE id = '$userid'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$list = '';

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
                <div class=\"method\">UserID</div><div><input type=\"text\" name=\"userid\" value=\"$row[userid]\"></div>
            </span>
            <span>
                <div class=\"method\">UserPassword</div><div><input type=\"text\" name=\"password\" value=\"$row[password]\"></div>
            </span>
            <span>
                <div class=\"method\">UserName</div><div><input type=\"text\" name=\"username\" value=\"$row[username]\"></div>
            </span>
            <span>
                <div class=\"method\">Gender</div><div><input type=\"text\" name=\"gender\" value=\"$row[gender]\"></div>
            </span>
            <span>
                <div class=\"method\">Age</div><div><input type=\"text\" name=\"age\" max=\"3\" value=\"$row[age]\"></div>
            </span>
            <span>
            <div class=\"method\">Birthday</div><div><input type=\"text\" name=\"birthday\" max=\"10\" value=\"$row[birthday]\"></div>
            </span>
            <input type=\"hidden\" name=\"id\" value=\"$row[id]\">
            <button id=\"b\" class=\"btn\" type=\"submit\">수정 완료</button>
        </li>";
}
?>

<body>
    <main>
        <h1 class="buze">회원 정보 수정</h1>
        <ul class="userlist" id="us">
            <form action="realmodify.php" method="POST">
                <?php echo $list; ?>
            </form>
        </ul>
    </main>
</body>

<?php include('footer.php'); ?>