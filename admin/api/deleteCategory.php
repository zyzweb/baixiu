<?php 

    //获得id
    $id = $_POST['id'];

    //导入文件
    require_once "tools/doSql.php";

    //准备sql语句
    $sql = "delete from categories where id in($id)";

    $result = my_ZSG($sql);

    if($result){

        echo 'ok';
    }else{

        echo 'fail';
    }
?>