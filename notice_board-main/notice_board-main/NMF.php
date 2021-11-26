<link rel="stylesheet" href="style/style.css">
<?php

include("funtion.php");

    $title = $_POST['title'];

    $des = $_POST['des'];
    $des = preg_replace("/[#\&\+\-%@=\/\\\:;'\"`~\_|\*$#<>()\[\]\{\}]/i", "", $des);
    $des = nl2br($des);
    
    isset($_POST['Bulletin']) ? $Bulletin = $_POST['Bulletin'] : $Bulletin = 0;
    $usname = '비회원';

    date_default_timezone_set("Asia/Seoul");
    $time = date("Y-m-d H:i:s");

    $cate = $_POST['cate'];

    $title = mysqli_real_escape_string($conn, $title);
    $des = mysqli_real_escape_string($conn, $des);

?>
<main>
    <div class="passmodal">
        <div class="pm">
            <p>비회원 전용</p>
            <p>게시물 비밀번호</p>
            <form action="NMD.php" enctype="multipart/form-data" method="POST">
                <div>
                    <input autofocus type="text" class="inp" placeholder="게시물 고유 비밀번호를 입력해주세요" required name="password">
                    <input type="file" id="F" name="file[]" multiple onchange="setThumbnail(event)">
                    <button style="margin-left: 10px;" type="submit" class="btn">확인</button>
                </div>
                <label for="F" class="Fbtn"><i class="fas fa-save"></i>이미지 첨부</label>
                <input type="hidden" name="title" value="<?=$title?>">
                <input type="hidden" name="des" value="<?=$des?>">
                <input type="hidden" name="usname" value="<?=$usname?>">
                <input type="hidden" name="time" value="<?=$time?>">
                <input type="hidden" name="Bulletin" value="<?=$Bulletin?>">
                <input type="hidden" name="cate" value="<?=$cate?>">
            </form>
            <div class="previewIMG">

            </div>
        </div>
    </div>
</main>
<script>
    const PIMG = document.querySelector(".previewIMG");
    PIMG.style.display = 'none';
    function setThumbnail(event){ 
        const PI = document.querySelectorAll('.previewIMG img')
        PI.forEach((e) => {
            e.remove();
        })
        console.log(PI);
        for(let image of event.target.files){
                const reader = new FileReader(); 
                reader.onload = function(event){ 
                const img = document.createElement("img"); 
                img.setAttribute("src", event.target.result); 
                PIMG.appendChild(img);
                PIMG.style.display = 'grid';
                
            }; 
            reader.readAsDataURL(image); 
        }
    }

</script>