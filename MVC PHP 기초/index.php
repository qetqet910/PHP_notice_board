<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        list-style: none;
        text-decoration: none;
        box-sizing: border-box;
    }

    html {
        font-size: 62.5%;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
        overflow: hidden;
        background-color: skyblue;
    }

    .note {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 24vw;
        height: 36vw;
        background: white;
    }

    .note::after {
        content: '';
        position: absolute;
        left: 0px;
        top: -12px;
        width: 100%;
        height: 12px;
        background: linear-gradient(135deg, transparent 50%, white 50%);
        background-size: 8px;
    }

    .note::before {
        content: '';
        position: absolute;
        left: 0px;
        bottom: -12px;
        width: 100%;
        height: 12px;
        background: linear-gradient(135deg, white 50%, transparent 50%);
        background-size: 8px;
    }

    .note h1 {
        font-size: 2rem;
        margin-bottom: 40px;
    }

    .note .buze {
        font-size: 1.4rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
    }

    .note ul {
        margin: 16px 20px;
    }

    .note ul li {
        font-size: 1.3rem;
        font-weight: bold;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .note a {
        display: block;
        color: black;
        text-decoration: underline;
        font-size: 1.4rem;
    }

    .note ul:last-child {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: -6px;
    }

    .note ul:last-child li a {
        font-size: 1.2rem;
        font-weight: 500;
        margin: 0px 30px;
        text-decoration: none;
    }

    .last {
        margin-bottom: 50px !important;
    }

    /* overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;   */
</style>

<body>
    <div class="note">
        <h1>MVC 첫만남</h1>
        <p class="buze">이게 정확하게 구현한 걸까 잘 모르겠지만<br>일단 구현이라도 해봤다</p>
        <ul>
            <li>1. 첫 번째 M(model)</li>
            <li>
                <p>TaskModel 이라는 class 안에 all이라는 function을 만들어 어디서든지 all 함수로 task 값을 가져올 수 있다</p>
            </li>
        </ul>
        <ul>
            <li>2. 두 번째 V(view)</li>
            <li>
                <p>모바일 환경은 json으로, pc 환경은 html로 가져올 수 있도록 페이지를 나누었다 model을 통해 가져온 tasks 값을 이용하여 화면에 뿌려준다</p>
            </li>
        </ul>
        <ul class="last">
            <li>3. 세 번째 C(controller)</li>
            <li>
                <p>index.php 와 닮았다 model과 view를 관리하는 곳(?) 이다 이 모든 전체 과정을 관장한다</p>
            </li>
        </ul>
        <p>코드는 귀찮다 다음 기회로</p>
        <a target="_blank" href="https://okky.kr/article/740317">전자정부프레임워크와 Spring의 명확한 차이</a>
        <hr>

    </div>
</body>

</html>