<?php
//开启session 
session_start();
//删除session
unset($_SESSION['userInfo']);
//跳转到登录页
header('location:../login.html');