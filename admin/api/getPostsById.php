<?php
//获取提交的id
$id = $_GET['id'];

//导入工具文件
include_once "tools/doSql.php";

//准备sql语句
$sql = "select *from posts where id = $id";
$data = my_Select($sql);

//哪怕只查出一条数据,它也是一个二维数组
//而我们要的,只是下标0对应的右边那个关联数组
//所有我们取下标0,得到右边的关联型数组后,再转成JSon返回
echo json_encode($data[0]);
