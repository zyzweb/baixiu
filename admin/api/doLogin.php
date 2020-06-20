<?php
$email=$_POST['email'];
$password=$_POST['password'];


//去数据库查询
$link=mysqli_connect('127.0.0.1','root','root','baixiu');
$sql="select *from users where email='$email' and password='$password'";
$result=mysqli_query($link,$sql);
//转换成数组
$data=mysqli_fetch_all($result,1);
//关闭数据库
mysqli_close($link);

if(count($data)>0){
    //大于0代表查到数据，就代表成功
        //登录成功后，就应该把数据写入session
        //开启session.
    session_start();
    $_SESSION['userInfo']=$data[0];
    echo "ok";
    
}else{
    echo "fail";
}
