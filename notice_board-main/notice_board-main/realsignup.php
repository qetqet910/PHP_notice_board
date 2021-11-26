<?php
    include('funtion.php');

    isset($_POST['password']) ? $p1 = $_POST['password'] : $p1 = null; 
    isset($_POST['passwordcheck']) ? $p2 = $_POST['passwordcheck'] : $p2 = null; 
    isset($_POST['chs']) ? $chk = $_POST['chs'] : $chk = 2;
    isset($_POST['username']) ? $username = $_POST['username'] : $username = null;

    $TF = null;
    $Block = ['ㅄ', '븅신', '병신', '시발', '비회원', '늑엄마소스', '늑엄마', '느검마']; // API 없나요

    $email = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_EMAIL);

    if($email){
        if($chk == 2){
            echo "<script>parent.alert('중복 확인을 해주세요.')</script>";
            echo "<script>location.href='signup.php'</script>";
        }else{
            if($p1 != $p2){
                echo "<script>parent.alert('비밀번호가 일치하지 않습니다.')</script>";
                echo "<script>location.href='signup.php'</script>";
            }else{
                if(strlen($username) > 10){
                    echo "<script>parent.alert('사용자 이름의 길이가 맞지 않습니다 Limit : <10>.')</script>";
                    echo "<script>location.href='signup.php'</script>";
                }else{
                    if(in_array($username, $Block)){
                        echo "<script>parent.alert('사용자의 이름에 금칙어가 포함되어 있습니다.')</script>";
                        echo "<script>location.href='signup.php'</script>";
                    }
                    else{
                        $sql = "SELECT * FROM notice_user";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_array($result)){
                            if($row['username'] == $username){
                                $TF = 1;
                                break;
                            }else{
                                $TF = 0;
                            }
                        }
                        if($TF != 1){

                            mysqli_real_escape_string($conn, $username);
                            mysqli_real_escape_string($conn, $p1);
                            
                            $username = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $username);
                            
                            $birthday = "$_POST[Y]-$_POST[M]-$_POST[D]";
                            isset($_POST['gender']) ? $gender = $_POST['gender'] : $gender = null;
                            isset($_POST['age']) ? $age = $_POST['age'] : $age = null;
    
                            $sql = "INSERT INTO notice_user (userid, password, username, gender, age, birthday, authority) VALUE('$email', '$p1', '$username', '$gender', '$age', '$birthday', '1')";
                            mysqli_query($conn, $sql);
                                                        
                            echo "<script>parent.alert('성공적으로 가입했습니다!')</script>";
                            echo "<script>location.href='index.php'</script>";                        
    
                            $TF = 0;
                        }else{
                            echo "<script>parent.alert('이미 있는 사용자 아이디 입니다.')</script>";
                            echo "<script>location.href='signup.php'</script>";
                            
                            $TF = 0;
                        }
                    }
                }
            }
        }
    }else{
        echo "<script>parent.alert('아이디 형식이 맞지 않습니다.')</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    $chk = 2;
?>