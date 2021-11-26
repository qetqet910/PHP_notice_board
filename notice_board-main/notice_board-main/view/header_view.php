<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notice_board</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="/notice_board-main/notice_board-main/style/style.css">
    <link rel="shortcut icon" href="../notice_board-main/server/imageS/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <div class="headerback"></div>
        <a class="logo" href="index.php">
            <ion-icon name="logo-slack"></ion-icon>
            <div>Kcals</div>
        </a>
        <input type=" checkbox" id="responsivebtn"></input>
        <label for="responsivebtn">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <nav id="menu">
            <?php
            $List = '';
            foreach ($cates as $cate) :
                $List = $List . "<li><a href=\"index.php?cate=$cate[kind]\">$cate[name]</a></li>";
            endforeach;
            echo $List;
            ?>
        </nav>
        <span class="user">
            <?php
            if ($_SESSION) {
                echo "<span class=\"userName\">" . $_SESSION['username'] . "님</span>";
                if ($_SESSION['authority'] == 2) {
                    echo "  
                        <div class=\"adminmenu\" >
                            <span>관리자 메뉴</span>
                            <ul class=\"list\">
                                <li><a href=\"admin/userlist.php\">사용자</a></li>
                                <li><a href=\"notice_board_list.php\">게시물</a></li>
                                <li><a href=\"create_by_category.php\">카테고리</a></li>
                            </ul>
                        </div>";
                    // echo "<a href=\"userlist.php\">회원목록 관리</a>";
                    // echo "<a href=\"notice_board_list.php\">게시글 관리</a>";
                }
                echo "<a href=\"logout.php\">로그아웃</a>";
            } else {
                echo "<a href=\"login.php\">로그인</a>";
                echo "<a href=\"signup.php\">회원가입</a>";
            }
            ?>
        </span>
    </header>