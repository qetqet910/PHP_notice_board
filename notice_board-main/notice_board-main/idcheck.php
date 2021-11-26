    <link rel="stylesheet" href="style/reset.css">
<link rel="stylesheet" href="style/signup.css">
<?php
	include('funtion.php');

	$userid = $_GET["userid"];
    $sql = "SELECT * FROM notice_user WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    $email = filter_input(INPUT_GET, 'userid', FILTER_VALIDATE_EMAIL);

    if($email == true){
        if($row == 0){
            ?>
            <script>
                parent.document.querySelector('#chs').value = 2;
                parent.alert('사용 가능한 아이디 입니다.');
                parent.document.querySelector('#chs').value = 1;
            </script>
        <?php
        }else{
        ?>
            <script>
                parent.alert('중복된 아이디 입니다.');
                parent.document.querySelector('#id').value = '';
                parent.document.querySelector('#chs').value = 2;
            </script>
        <?php
        }
    }else{?>
            <script>
                parent.alert('이메일 형식에 맞지 않습니다.')
                parent.document.querySelector('#id').value = '';
                parent.document.querySelector('#chs').value = 2;
            </script>
        <?php
    }
?>