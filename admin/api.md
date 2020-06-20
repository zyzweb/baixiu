## 做登录判断的接口

url:  api/doLogin.php
type: post
data: 
    email:
    password:

响应体：
    ok 或者 fail


## 判断是否已经登录的接口
url：api/checkIsLogin.php
type: get
data:
    不用

success:
    ok 或者 fail


## 获取用户信息的接口
url:api/getUserInfo.php
type:get

响应体：
    json格式的字符串

    { "nickname":"jack","avatar":"/uploads/avatar_1.jpg" }


## 获取网站信息的接口
url:api/getWebInfo.php
type:get
参数：无

响应体：
    JSON格式的字符串，代表的是一个对象
    {postsCount:500 , draftedCount:4 , categoryCount:6 , commentsCount:900 , heldCount: 320}

    

## 获取分页评论数据的接口
url:api/getComments.php
type:get
参数：查询分页数据
        至少告诉我，你查的是哪一页，以及每一页显示多少条
    
        pageIndex: 你要查的页码
        pageSize:代表每页多少条

响应体：
    JSON格式的字符串，字符串的根是一个对象
    对象两个属性：data ： 分页数据
                toltalPage:总页数

   {
       "data":
            [
                {"id":"11","author":"\u5510\u519b","content":"我是评论1","title":"文章标题","created":"1970-04-24 11:22:29","status":"approved"},
                 {"id":"11","author":"\u5510\u519b","content":"我是评论1","title":"文章标题","created":"1970-04-24 11:22:29","status":"approved"},
            ],

       "totalPage":43
    }


## 修改评论状态接口
url:  api/updateComments.php
type: post
参数：
    status:要修改的状态
    id：要修改的id
            如果是单行修改，只传一个id
            如果是批量修改，就传多个id，多个id之间用逗号隔开

响应体：
    ok 或者 fail


## 获得文章接口
url:api/getPosts.php
type:get
参数:
    pageIndex:页码
    pageSize:页容量
    category:要筛选的分类名
    status:要筛选的状态
响应体
    JSON字符串
    这个字符串代表的是一个对象
    {
        data:[],
        totalPage:43
    }
##获取所有分类的接口
url:api/getCategory.php
type:get
参数:无
响应体:
    JSON字符串
    [
        {'id':1,"slug":"uncategorized","name":未分类},
        {'id':2,"slug":"funny","name":奇趣事}
    ]
## 新增文章的接口
url:api/addPosts.php
type:post
参数：
    title
    content
    slug
    feature
    created
    category
    status
响应体
    ok 或者 fail

## 根据id获取某篇文章详情的接口
url:api/getPostsById.php
type:get
参数：
    id:传入一个id，就可以根据这个Id查出对应的文章
响应体：
    JSON格式的
    {"id","title","content"...}

## 修改文章的接口
url:api/updatePosts.php
type:post
参数：
    postId:修改哪篇文章
    title
    content
    slug
    feature
    created
    category
    status

响应体
    ok 或者 fail

## 修改登录用户的接口
url:api/updateUser.php
type:post
data:
    avatar
    slug
    nickname
    bio
    email:不是为了修改，而是为了作为where条件

响应体：
    ok 或者 fail