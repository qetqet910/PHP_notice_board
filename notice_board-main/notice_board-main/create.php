<?php
    require_once("header.php");

    $sql = "SELECT * FROM notice_cate";
    $res = mysqli_query($conn, $sql);

    $OptionList = '';

    while($row = mysqli_fetch_array($res)){
        if($row['id'] != 5){ // 공지사항 빼기
            if(isset($_SESSION['authority'])){
                if($row['p_write'] == 1){
                    $OptionList = $OptionList."<option value=\"$row[id]\">$row[name]</option>";
                }
            }else{
                if($row['n_write'] == 1){
                    $OptionList = $OptionList."<option value=\"$row[id]\">$row[name]</option>";
                }
            }
        }
    }
?>

<main>
    <section class="wall">
        <h2 class="buze">게시물 만들기</h2>
        <!-- enctype="multipart/form-data" -->
        <?php
            if($_SESSION){
                ?>
                    <form class="create" enctype="multipart/form-data" method="POST" action="realcreate.php">
                <?php
            }else{
                ?>
                    <form class="create" enctype="multipart/form-data" method="POST" action="NMF.php">
                <?php
            }
        ?>
            <p>
                <label for="title">제목</label>
                
                <input required placeholder="제목을 입력해주세요." type="text" name="title" id="title">
            </p>
            <p>
                <label for="des">내용</label>
                <span class="reference">사용 가능한 특수 문자 <strong>? ! ^ . ,</strong></span>
                <textarea required type="text" name="des" id="des"></textarea>
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

            </div>
            <button class="btn" type="submit" name="create"><i class="fas fa-plus"></i>만들기</button>
            <?php
            if($_SESSION){
                ?>
                    <input type="file" id="F" name="file[]" multiple onchange="setThumbnail(event)">
                    <label for="F" class="Fbtn"><i class="fas fa-save"></i>이미지 첨부</label>
                <?php
            }
                isset($_SESSION['authority']) ? $aut = $_SESSION['authority'] : $aut = null;
                if($aut == 2){
                    ?>
                    <div class="Bulletin">
                        <label for="Bu">공지</label>
                        <input class="chkb" id="Bu" type="checkbox" name="Bulletin" value="1">
                    </div>
                    <?php
                }
            ?>
        </form>
    </section>
</main>

<!-- ////////////////////////////////////////////////////// GREEN -->

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

<?php
    require_once("footer.php");
?>