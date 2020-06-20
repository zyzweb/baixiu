<?php
    $id =$_POST['id'];

    require_once "tools/doSql.php";
    $sql = "update posts set status = 'trashed' where id in ($id)";
    $result = my_ZSG($sql);

    if($result){
        echo 'ok';
    }else{
        echo 'fail';
    }