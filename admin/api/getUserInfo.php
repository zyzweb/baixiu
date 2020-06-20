<?php
 //开启session
 session_start();

 //拿到userInfo里存的值
 $userInfo = $_SESSION['userInfo'];

 //转成JSON字符串
 echo json_encode($userInfo);
 