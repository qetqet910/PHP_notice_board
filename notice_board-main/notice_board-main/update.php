<?php
require_once("header.php");

    $id = $_POST['row1'];
    $title = $_POST['row2'];
    $des = $_POST['row3'];

    $list = '';
    $OptionList = '';
    
    $catesql = "SELECT * FROM notice_cate";
    $cateres = mysqli_query($conn, $catesql);

    while($row = mysqli_fetch_array($cateres)){
        if($row['id'] != 5){
            $OptionList = $OptionList."<option value=\"$row[id]\">$row[name]</option>";
        }
    }

    $title = str_replace('<br>', '', $title);
    $des = str_replace('<br />', '', $des);
    
    mysqli_real_escape_string($conn, $title);
    mysqli_real_escape_string($conn, $des);

    $sql1 = "SELECT * FROM notice_file WHERE idx = '$id'";
    $res1 = mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($res1);

    function DeleteNoticeFile($id){
        if($id != null){
            $conn = mysqli_connect('localhost', 'root', '', 'notice_board');
            $sql2 = "DELETE FROM notice_file WHERE id = '$id'";
            mysqli_query($conn, $sql2);
        }
    }
?>
<main>
    <section class="wall">
        <h2 class="buze">게시물 수정하기</h2>
        <form action="realupdate.php" enctype="multipart/form-data" method="POST" class="create">
            <input type="hidden" name="id" id="id" value="<?=$id?>">
            <p>
                <label for="title">제목</label>
                
                <input value="<?=$title?>" required placeholder="제목을 입력해주세요." type="text" name="title" id="title">
            </p>
            <p>
                <label for="des">내용</label>
                <span class="reference">사용 가능한 특수 문자 <strong>? ! ^ . ,</strong></span>
                <textarea required type="text" name="des" id="des"><?=$des?></textarea>
            </p>
            <p>
                <label for="cate">카테고리</label>
                <select required name="cate" id="cate">
                    <?php
                        echo $OptionList;
                    ?>
                </select>
            </p>
            <div class="previewIMG">
                <?php
                    while($row1 = mysqli_fetch_array($res1)){
                        $R = $row1['route'];
                        $F = $row1['file_name'];
                        $id = $row1['id'];
                        ?>
                        <span>
                            <img onclick="symbol" src="<?=$R?>" id="<?=$id?>" alt="<?=$F?>">
                            <div class="closebtn">
                                <ion-icon name="close-outline"></ion-icon>
                            </div>
                        </span>
                        <?php
                    }
                ?>
            </div>
            <input class="btn" type="submit" name="create" value="수정마치기">
            <input type="file" id="F" name="file[]" multiple onchange="setThumbnail(event)">
            <label for="F" class="Fbtn"><i class="fas fa-save"></i>이미지 첨부</label>
        </form>
    </section>
</main>
<?php
    require_once("footer.php");
?>
<script>
    const PIMG = document.querySelector(".previewIMG");

function setThumbnail(event){ 
    // const PI = document.querySelectorAll('.previewIMG img')
    // PI.forEach((e) => {
    //     e.remove();
    // })

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

const closebtn = document.querySelectorAll('.closebtn');

closebtn.forEach((e) => {
    e.addEventListener('click', function(e){
        e.preventDefault();
        const Paren = e.target.parentElement;
        Paren.style.display = 'none';
        const idValue = Paren.querySelector('img').getAttribute('id');

        $.ajax({
            url: 'funtion.php',
            type: 'post',
            data: { "id": idValue},
        });
    })
})
</script>

<?php
    $id = "<script> document.write(idValue); </script>";
    DeleteNoticeFile($id);
?>