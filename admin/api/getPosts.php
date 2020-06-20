<?php 
$pageIndex=$_GET['pageIndex'];
$pageSize=$_GET['pageSize'];
$category = $_GET['category'];
$status = $_GET['status'];



//然后去数据库中查询 得到自己想要的值
//首先导入数据库
include "tools/doSql.php";
//导入了数据库,只用写sql语句,然后作为参数传进去',三张表联表查询
//算出起始位置 = (页码-1)*页容量
$start = ($pageIndex-1) * $pageSize;
$sql="select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p
inner join users u
on
p.user_id=u.id
inner join categories c
on p.category_id=c.id
where p.status !='trashed'";

//判断要不要加筛选条件
if($category != '所有分类'){
    //如果不等于所有分类就要加条件
    //记得前面加空格    
    $sql.=" and c.name = '$category'";
}

if($status != '所有状态'){
    $st = $status == '已发布' ? "published" : "drafted";
    $sql .=" and p.status = '$st'";
}

//把没加分页之前的sql语句保存一下
$bakSql = $sql;

$sql .=" order by p.id asc limit $start,$pageSize";

$data =my_Select($sql);
//还有查询出总页数
//先查出总数据个数 不加分页就是总数据

$totalCount=count(my_Select($bakSql));

//页数 = 向上取整（总个数 / 页容量）
$totalPage = ceil($totalCount/$pageSize);

//中括号是php5.5以后有的
$arr = array(
    "data" => $data,
    "totalPage" => $totalPage
);
//转成json返回
echo json_encode($arr);