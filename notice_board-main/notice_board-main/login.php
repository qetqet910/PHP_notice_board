<?php
    require_once("funtion.php");

    $status;
    if($_SESSION){
        Location('index.php');
    }else{
        if(isset($_POST['Login'] )){
            isset($_POST['id']) ? $email = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_EMAIL) : $email = null;
            isset($_POST['password']) ? $password = mysqli_real_escape_string($conn, $_POST['password']) : $password = null;
            
            if($email == true){
                if(identity($email, $password)){
                    Location("index.php");
                    die();
                }else{
                    $status = "아이디 비밀번호 에러";
                }
            }else{
                $status = '이메일 에러';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="shortcut icon" href="image/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="" method="POST" class="login">
        <h1>로그인</h1>
        <p>
            <label for="ID">이메일</label>
            
            <input type="text" name="id" id="ID" placeholder="이메일을 입력해주세요" required>
        </p>
        <p>
            <label for="PASSWORD">비밀번호</label>
            
            <input type="password" name="password" id="PASSWORD" placeholder="비밀번호를 입력해주세요" required>
        </p>
        <button class="btn" type="submit" value="로그인" name="Login">
            <i class="fas fa-sign-in-alt"></i>
            로그인
        </button>
    </form>
    <div class="modal">
        <i class="fas fa-exclamation-triangle"></i>
        <div class="error">
            <?php
                if(isset($status)){
                    echo $status;?>
                    <script>
                        const md = document.querySelector(".modal");
                        md.addEventListener('click', function(e){
                            md.style.display = "none";
                        })
                        B(md);
                    </script><?php
                }
            ?>  
        </div>
    </div>
</body>
</html>