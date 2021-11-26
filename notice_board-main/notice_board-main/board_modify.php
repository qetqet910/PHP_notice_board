<?php
    include('header.php');

    if($_SESSION['authority'] != 2){
        Location('index.php');
    }

    isset($_POST['USID']) ? $userid = $_POST['USID'] : $userid = null; 

    $sql = "SELECT * FROM notice_info WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $list = '';

    $catesql = "SELECT * FROM notice_cate";
    $cateres = mysqli_query($conn, $catesql);

    while($row = mysqli_fetch_array($result)){

        $title = str_replace('<br>', '', $row['title']);
        $title = nl2br($title);

        $sql5 = "SELECT * FROM notice_file WHERE idx = '$userid'";
        $res5 = mysqli_query($conn, $sql5);
        $num5 = mysqli_num_rows($res5);

        $catesql = "SELECT * FROM notice_cate WHERE id = '$row[cateid]'";
        $cateres = mysqli_query($conn, $catesql);
        $caterow = mysqli_fetch_array($cateres);

        $des = $row['des'];
        $des = str_replace('<br />', '', $des);

        $TFN = $_POST['TFN'];

        if(!empty($row['password'])){
            $list = $list."<li>
                <span>
                    <div class=\"method\">Board ID</div><div><input type=\"text\" disabled name=\"id\" value=\"$userid\"></div>
                </span>
                <span>
                    <div class=\"method\">Author(encryption)</div><div><input type=\"text\" name=\"author\" value=\"$row[usname]\"></div>
                </span>
                <span>
                    <div class=\"method\">Title</div><div><input type=\"text\" name=\"title\" value=\"$title\"></div>
                </span>
                <span>
                    <div class=\"method\">description</div><div class=\"T\"><textarea name=\"des\">$des</textarea></div>
                </span>
                <span>
                    <div class=\"method\">Date</div><div><input type=\" number\" name=\"date\" max=\"3\" value=\"$row[date]\"></div>
                </span>
                <span>
                    <div class=\"method\">hit</div><div><input type=\"text\" name=\"hit\" max=\"10\" value=\"$row[hit]\"></div>
                </span>
                <span>
                    <div class=\"method\">Alert</div><div><input type=\"text\" name=\"alert\" max=\"10\" value=\"$row[Bulletin]\"></div>
                </span>
                <span>
                    <div class=\"method\">Non-members Board Password</div><div><input type=\"text\" name=\"NonM\" max=\"10\" value=\"$row[password]\"></div>
                </span>
                <span>
                    <div class=\"method\">Category</div><div><input type=\"text\" name=\"cate\" value=\"$caterow[name]\"></div>
                </span>
                <input type=\"hidden\" name=\"id\" value=\"$row[id]\">";
        }else{
            $list = $list."<li>
                <span>
                    <div class=\"method\">Board ID</div><div><input type=\"text\" disabled name=\"id\" value=\"$userid\"></div>
                </span>
                <span>
                    <div class=\"method\">Author(encryption)</div><div><input type=\"text\" name=\"author\" value=\"$row[usname]\"></div>
                </span>
                <span>
                    <div class=\"method\">Title</div><div><input type=\"text\" name=\"title\" value=\"$title\"></div>
                </span>
                <span>
                    <div class=\"method\">description</div><div class=\"T\"><textarea name=\"des\">$des</textarea></div>
                </span>
                <span>
                    <div class=\"method\">Date</div><div><input type=\"text\" name=\"date\" max=\"3\" value=\"$row[date]\"></div>
                </span>
                <span>
                    <div class=\"method\">hit</div><div><input type=\"text\" name=\"hit\" max=\"10\" value=\"$row[hit]\"></div>
                </span>
                <span>
                    <div class=\"method\">Alert</div><div><input type=\"text\" name=\"alert\" max=\"10\" value=\"$row[Bulletin]\"></div>
                </span>
                <span>
                    <div class=\"method\">Category</div><div><input type=\"text\" name=\"cate\" value=\"$caterow[name]\"></div>
                </span>
                <input type=\"hidden\" name=\"id\" value=\"$row[id]\">";
        }
    }
?>

<bodyW>
    <main>
        <h1 class="buze">게시판 정보 수정</h1>
        <ul class="userlist" id="su">
            <form action="realmodify_board.php" enctype="multipart/form-data" method="POST">
                <?php echo $list;?>
                <div class="previewIMG">
                    <?php
                        while($row1 = mysqli_fetch_array($res5)){
                            $R = $row1['route'];
                            $F = $row1['file_name'];
                            $id = $row1['id'];
                            ?>
                            <span style="margin: 0px; padding: 0px;">
                                <img onclick="symbol" src="<?=$R?>" id="<?=$id?>" alt="<?=$F?>">
                                <div class="closebtn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </div>
                            </span>
                            <?php
                        }
                    ?>
                </div>
                <input style="display: none;" type="file" id="F" name="file[]" multiple onchange="setThumbnail(event)">
                <label style="max-width: 8vw; text-align: center;" for="F" class="gbtn"><i class="fas fa-save"></i>이미지 첨부</label>
                <button id="b" class="btn" type="submit">수정 완료</button>
            </li>;
            </form>
        </ul>
    </main>
</body>

<?php include('footer.php');?>

<script>
    const area = document.querySelector("textarea");

    height()

    area.addEventListener('keyup', function(){
        height()
    }, false)

    function height(){
        const textEle = $('textarea');
        textEle[0].style.height = 'auto';
        const textEleHeight = textEle.prop('scrollHeight');
        textEle.css('height', textEleHeight);   
    }

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