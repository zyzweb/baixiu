<?php

    $email = $_POST['email'];
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];

    //拿到上传的文件
    $avatar = $_FILES['avatar'];
    //先拿文件名
    $name = $avatar['name'];
    //拿临时路径
    $tmp =$avatar['tmp_name'];

    //装成gbk的图片名
    $gbkName = iconv('utf-8','gbk',$name);

    //准备一个路径
    $path = "../../uploads/$gbkName";

    //移动上传文件
    move_uploaded_file($tmp,$path);

    //准备修改数据库
    include_once "tools/doSql.php";

    //把路径变回utf-8
    $path = "../../uploads//$name";

    //准备sql语句
    if($name !=""){

        $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio',avatar='$path'
            where email = '$email'";
    }else{
        $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio'
                            where email = '$email'";
    }

    $result = my_ZSG($sql);

    if($result){ //用户信息是存在session里的,修改数据库成功之后要同步修改session

        //开启session
        session_start();
        
        $_SESSION['userInfo']['slug'] = $slug;
        $_SESSION['userInfo']['nickname'] = $nickname;
        $_SESSION['userInfo']['bio'] = $bio;
        if($name != "")
            $_SESSION['userInfo']['avatar'] = $path;

        echo 'ok';
    }else{

        echo 'fail';
    }