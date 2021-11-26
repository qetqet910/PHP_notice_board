<?php

$filename = $_GET['file']; 
$file_path = realpath(__FILE__);
$real_path = str_replace("download.php", "", $file_path).$filename;

image_down($real_path);

function image_down($img_path) {
    $IMAGE_PATH = $img_path;
    $IMAGE_SIZE = getimagesize($IMAGE_PATH);

    if($IMAGE_SIZE) {
        $FILENAME = 'File.'.strtolower(substr($IMAGE_PATH,strlen($IMAGE_PATH)-3,3));
        header("Content-Type: ".$IMAGE_SIZE['mime']);
        header("Content-Disposition: attachment;filename=$FILENAME");
        header("Content-Transfer-Encoding: binary");    
        header("Content-Length: ".filesize($IMAGE_PATH));
        readfile($IMAGE_PATH);
    }
}

// echo $root_path."<br>";
// if (is_file($file)) {
 
//     if (preg_match("MSIE", $_SERVER['HTTP_USER_AGENT'])) { 
//         header("Content-type: application/octet-stream"); 
//         header("Content-Length: ".filesize("$file"));
//         header("Content-Disposition: attachment; filename=$filename"); // 다운로드되는 파일명 (실제 파일명과 별개로 지정 가능)
//         header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//         header("Pragma: public"); 
//         header("Expires: 0"); 
//     }
//     else { ㅣ
//         header("Content-type: file/unknown"); 
//         header("Content-Length: ".filesize("$file")); 
//         header("Content-Disposition: attachment; filename=$filename"); // 다운로드되는 파일명 (실제 파일명과 별개로 지정 가능)
//         header("Content-Description: PHP3 Generated Data"); 
//         header("Pragma: no-cache"); 
//         header("Expires: 0"); 
//     }
 
//     $fp = fopen($file, "rb"); 
//     fpassthru($fp);
//     fclose($fp);
// }
// else {
//     echo "해당 파일이 없습니다.";
// }
    
// function image_view($img_path) {
//     $IMAGE_PATH = $img_path;
//     $IMAGE_SIZE = getimagesize($IMAGE_PATH);
//     if($IMAGE_SIZE) {
//         $FILENAME = 'download.'.strtolower(substr($IMAGE_PATH,strlen($IMAGE_PATH)-3,3));
//         header("Content-Type: ".$IMAGE_SIZE['mime']);
//         header("Content-Disposition: inline;filename=$FILENAME");
//         header("Content-Length: ".filesize($IMAGE_PATH));
//         readfile($IMAGE_PATH);
//     }
// }
?>