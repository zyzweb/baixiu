<?php
  //导入我们封装的工具文件
  include "tools/doSql.php";

    //直接写sql语句
    $data=my_Select("select *from posts where status !='trashed'");
    $postsCount=count($data);

    //查草稿文章
    $data=my_Select("select *from posts where status = 'drafted'");
    $draftedCount=count($data);

    //查分类数量
    $data= my_Select("select *from categories");
    $categoryCount=count($data);

    //查所有评论
    $data=my_Select("select *from comments where status !='trashed'");
    $commentsCount=count($data);

    //查待审核数量
    $data=my_Select("select *from comments where status ='held'");
    $heldCount=count($data);

    //先变关联型数组
    $arr=[
        "postsCount"=>$postsCount,
        "draftedCount"=>$draftedCount,
        "categoryCount"=>$categoryCount,
        "commentsCount"=>$commentsCount,
        "heldCount"=>$heldCount
    ];

    //转成json返回
    echo json_encode($arr);