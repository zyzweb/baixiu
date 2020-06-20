<?php 

    //拿到提交的数据
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    //写入到数据库去
    include_once "tools/doSql.php";

    $sql = "insert into categories(name,slug) values('$name','$slug')";

    $result = my_ZSG($sql);

    if($result){

        echo 'ok';
    }else{
        echo 'fail';
    }

?>