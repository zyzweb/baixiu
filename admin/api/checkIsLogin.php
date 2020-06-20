<?php
//有没有登录就看有没有session
    //开启session
    session_start();
    if(isset($_SESSION['userInfo'])){
        echo "ok";

    }else{
        echo "fail";
    }