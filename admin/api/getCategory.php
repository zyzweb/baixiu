<?php
    include "tools/doSql.php";

    //sql语句
    $sql = "select *from categories";

    $data = my_Select($sql);

    //转成JSON返回
    echo json_encode($data);