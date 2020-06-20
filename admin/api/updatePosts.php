<?php
//接收提交的数据
//文章id
$postId = $_POST['postId'];
$title = $_POST['title'];
$content = $_POST['content'];
$slug = $_POST['slug'];
$created = $_POST['created'];
$category_id = $_POST['category'];
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

//在修改数据库之前,把path改回utf-8的编码
$path = "/uploads/$name";

include_once "tools/doSql.php";

if($name !=""){
    //如果图片名不为空,证明你修改的时候肯定改过图片了,那么就要修改新的路径
    $sql = "update posts
                    set title='$title',
                    content= '$content',
                    slug = '$slug',
                    created = '$created',
                    category_id = '$category_id',
                    status = '$status',
                    feature = '$path'
                    where id = '$postId'";
}else{
    //来到这里证明图片名为空,证明你没修改图片,就不用去改动图片
    $sql = "update posts
            set title= '$title',
            content = '$content',
            slug = '$slug',
            created = '$created',
            category_id = '$category_id',
            status = '$status'
            where id = '$postId'";
}
$result = my_ZSG($sql);

if($result){
    echo 'ok';
}else{
    echo 'fail';
}