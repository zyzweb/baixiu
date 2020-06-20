<?php 

    //接收提交的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $created = $_POST['created'];
    $category_id= $_POST['category'];
    $status = $_POST['status'];

    //获得文件信息
    $feature = $_FILES['feature'];
    //获得文件名
    $name = $feature['name'];
    //获得临时目录
    $tmp = $feature['tmp_name'];

    //转成GBK的名字
    $gbkName = iconv('utf-8','gbk',$name);

    //移动到新的目录 PHP不支持根目录
    $path = "../../uploads/$gbkName";
    
    //移动
    move_uploaded_file($tmp,$path);

    //取出session里保存的用户id
    session_start();
    $userID = $_SESSION['userInfo']['id'];

    //应该写入到数据库
    //先把path变为utf-8的编码，因为数据库是用的utf-8
    $path = "/uploads/$name";
    $sql = "insert into 
                posts(title,content,slug,created,category_id,status,feature,user_id) 
                values('$title','$content','$slug','$created','$category_id','$status','$path','$userID')";

    include_once "tools/doSql.php";
    $result = my_ZSG($sql);

    if($result){

        echo 'ok';

    }else{

        echo 'fail';
    }
?>