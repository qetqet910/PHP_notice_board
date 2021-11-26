<?php

    $sql1 = "SELECT * FROM notice_info WHERE title LIKE '%$key%'";
    $res = mysqli_query($conn, $sql1);
    $total_article = mysqli_num_rows($res); 


    $total_page = ceil($total_article / $view_article);

    if($page % 10){
        $start_page = $page - $page % 10 + 1;
    }else{
        $start_page = $page - 9;
    }
    $end_page = $start_page + 10;

    $prev_group = $start_page - 1;
    if($prev_group < 1) $prev_group = 1;

    $next_group = $end_page;
    if($next_group > $total_page) $next_group = $total_page;



    if($page != 1){
        echo ("<a href=\"?page=1&keyword=$key\"><i class=\"fas fa-angle-double-left now\"></i></a>");
    }else{
        echo ("<span class=\"now\">First</span>");
    }

    if($page != 1){
        echo ("<a href=\"?page=$prev_group&keyword=$key\"><i class=\"fas fa-angle-left now\"></i></a>");
    }

    for($i = $start_page; $i < $end_page; $i++){
        if($i > $total_page) break;
        else if($i==$page) echo ("<span class=\"now\">$i</span>");
        else{
            echo ("<a class=\"a\" href=\"?page=$i&keyword=$key\">$i</a>");
        }
    }
    
    if($page != $total_page){
        echo ("<a href=\"?page=$next_group&keyword=$key\"><i class=\"fas fa-angle-right now\"></i></a>");
    }

    if($page != $total_page){
        echo ("<a href=\"?page=$total_page&keyword=$key\"><i class=\"fas fa-angle-double-right now\"></i></a>");
    }else{
        echo ("<span class=\"now\">Last</span>");
    } 
?>