<?php

    include("funtion.php");

    session_start();
    session_unset();
    session_destroy();
    
    Location("index.php")
?>