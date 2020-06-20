<?php 

    function my_Select($sql){ //查询数据库 比增删改多了一个数据转化过程

        //1. 连接数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');

        //2. 操作数据库
        $result = mysqli_query($link,$sql);
        //转成数组
        $data = mysqli_fetch_all($result,1);

        //3. 关闭数据库
        mysqli_close($link);

        //把查到的数组结果返回
        return $data;
    }
function my_ZSG($sql){ //增删改
    //执行sql语句
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');
    $result = mysqli_query($link,$sql);
    mysqli_close($link);
    
    return $result;
}