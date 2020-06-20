<?php
//先接收参数
$status = $_POST['status'];
$id=$_POST['id'];

//操作数据库
$link=mysqli_connect('127.0.0.1','root','root','baixiu');
//操作数据库
$sql="update comments set status = '$status' where id in($id)";
$result=mysqli_query($link,$sql);

mysqli_close($link);

if($result){
    echo 'ok';
}else{
    echo 'fail';
}

