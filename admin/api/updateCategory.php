<?php 

    //拿到提交的数据
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];


    //修改数据库
    require_once "tools/doSql.php";
    $sql = "update categories set name='$name',slug='$slug' where id='$id'";
    $result = my_ZSG($sql);

    if($result){

        echo 'ok';
    }else{

        echo 'fail';
    }
?>