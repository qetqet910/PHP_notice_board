<?php
    require_once('funtion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/signup.css">
    <link rel="shortcut icon" href="image/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="realsignup.php" method="POST" class="login">
        <h1>회원가입</h1>
        <p>
            <label for="ID">이메일</label>
            
            <input type="text" name="id" id="ID" placeholder="이메일을 입력해주세요" required>
            <button type="button" class="btn" id="btn" onclick="OpenCheck()" value="중복확인"><i class="fas fa-check"></i>중복확인</button>
            <input type="hidden" value="2" name="chs" id="chs">
            <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1"></iframe>
        </p>
        <p>
            <label for="PASSWORD">비밀번호</label>
            
            <input type="password" name="password" id="PASSWORD" placeholder="비밀번호를 입력해주세요" required>
        </p>
        <p>
            <label for="passwordcheck">비밀번호 확인</label>
            
            <input type="password" name="passwordcheck" id="passwordcheck" placeholder="비밀번호를 입력해주세요" required>
        </p>
        <p>
            <label for="USERNAME">사용자 이름</label>
            
            <input type="text" name="username" id="USERNAME" placeholder="사용자 이름을 입력해주세요" required>
        </p>
        <p>
            <label for="Gender">성별</label>
            
            <span class="genderI">
                <input type="radio" name="gender" value="남자" id="man">
                <input type="radio" name="gender" value="여자" id="girl">

                <span class="genderL">
                    <label for="man">남</label>
                    <label for="girl">여</label>
                </span>
            </span>
            
            <label for="나이">나이</label>
            <input type="number" name="age" min="0" max="200" placeholder="나이를 입력해주세요">
        </p>
        <p>
            <label for="birthday">생년월일</label>
            <select name="Y" id="Select">
                <option value="none">⇎ 연도 ⇎</option>
            </select>
            <select name="M" id="Select">
                <option value="none">⇎ 월 ⇎</option>
            </select>
            <select name="D" id="Select">
                <option value="none">⇎ 일 ⇎</option>
            </select>
        </p>
        <button class="btn" type="submit" value="회원가입" name="signup"><i class="fas fa-user-plus"></i>회원가입</button>
    </form>
</body>
</html>
<script>
    function OpenCheck(){
        const chk = document.querySelector('#chs').value = 0;
        const userid = document.querySelector("#ID").value;
        if(userid){
            ifrm1.location.href = `idcheck.php?userid=${userid}`;
        }else{
            alert("ID를 입력하세요")
        }
    }

    // SELECT 옵션 생성 //

    const Select1 = document.querySelectorAll("#Select")[0];
    const Select2 = document.querySelectorAll("#Select")[1];
    const Select3 = document.querySelectorAll("#Select")[2];

    const date = new Date();
    for(let i = date.getFullYear() - 118; i <= date.getFullYear(); i++){
        const option = document.createElement('option');
        Select1.value = date.getFullYear();
        option.innerText = i;
        option.value = `${i}`;
        Select1.append(option);
    }
    console.log(Select1);

    for(let i = 1; i <= 12; i++){
        const option = document.createElement('option');
        option.innerText = i;
        if(String(i).length > 1){
            option.value = `${i}`;
        }else{
            option.value = `0${i}`;
        }
        Select2.append(option);
    }

    for(let i = 1; i <= 31; i++){
        const option = document.createElement('option');
        option.innerText = i;
        if(String(i).length > 1){
            option.value = `${i}`;
        }else{
            option.value = `0${i}`;
        }
        Select3.append(option);
    }

</script>