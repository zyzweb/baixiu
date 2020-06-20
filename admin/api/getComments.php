<?php
 //获得页码
 $pageIndex=$_GET['pageIndex'];
 //获得页容量
 $pageSize=$_GET['pageSize'];

 $start=($pageIndex-1)*$pageSize;

 //准备sql语句
 $sql="select c.id,c.author,c.content,p.title,c.created,c.status from comments c 
 inner join posts p 
 on
 c.post_id=p.id
 where c.status!='trashed'
 order by c.id asc
 limit $start,$pageSize";

 //封装好的sql操作函数
 include "tools/doSql.php";
 $data=my_Select($sql);

//接下来的是查询总页数
$totalCount=count(my_Select("select *from comments where status !='trashed'"));
 
$totalPage=ceil($totalCount/$pageSize);

$arr=[
    "data"=>$data,
    
    "totalPage"=>$totalPage
];

echo json_encode($arr);
