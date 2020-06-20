# Host: localhost  (Version: 5.5.53)
# Date: 2018-05-17 11:16:56
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "categories"
#

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `slug` varchar(200) NOT NULL COMMENT '别名',
  `name` varchar(200) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
)  AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "categories"
#

INSERT INTO `categories` VALUES (1,'uncategorized','未分类'),(2,'funny','奇趣事'),(3,'living','会生活'),(4,'travel','爱旅行');

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `author` varchar(100) NOT NULL COMMENT '作者',
  `email` varchar(200) NOT NULL COMMENT '邮箱',
  `created` datetime NOT NULL COMMENT '创建时间',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `status` varchar(20) NOT NULL COMMENT '状态（held/approved/rejected/trashed）',
  `post_id` int(11) NOT NULL COMMENT '文章 ID',
  `parent_id` int(11) DEFAULT NULL COMMENT '父级 ID',
  PRIMARY KEY (`id`)
)  AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "comments"
#

INSERT INTO `comments` VALUES (1,'小周','w@zce.me','2017-07-04 12:00:00','这是一条测试评论，欢迎光临','approved',1,NULL),(2,'嘿嘿','ee@gmail.com','2017-07-05 09:10:00','想知道香港回归的惊人内幕吗？快快与我取得联系','rejected',1,NULL),(3,'小右','www@gmail.com','2017-07-06 14:10:00','你好啊，交个朋友好吗？','held',1,NULL),(4,'老周','www@gmail.com','2017-07-09 22:22:00','不好','held',1,3),(5,'中周','w@zce.me','2017-07-09 18:22:00','How are you?','held',1,3),(6,'小右','www@gmail.com','2017-07-11 22:22:00','I am fine thank you and you?','held',1,5),(7,'哈哈','hh@gmail.com','2017-07-22 09:10:00','一针见血','approved',1,NULL);

#
# Structure for table "options"
#

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `key` varchar(200) NOT NULL COMMENT '属性键',
  `value` text NOT NULL COMMENT '属性值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`key`)
)  AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "options"
#

INSERT INTO `options` VALUES (1,'site_url','http://localhost'),(2,'site_logo','/static/assets/img/logo.png'),(3,'site_name','阿里百秀 - 发现生活，发现美！'),(4,'site_description','阿里百秀同阿里巴巴有咩关系，答案当然系一啲都冇'),(5,'site_keywords','生活, 旅行, 自由, 诗歌, 科技'),(6,'site_footer','<p>© 2016 XIU主题演示 本站主题由 hmzll 提供</p>'),(7,'comment_status','1'),(8,'comment_reviewed','1'),(9,'nav_menus','[{\"icon\":\"fa fa-glass\",\"text\":\"奇趣事\",\"title\":\"奇趣事\",\"link\":\"/category/funny\"},{\"icon\":\"fa fa-phone\",\"text\":\"潮科技\",\"title\":\"潮科技\",\"link\":\"/category/tech\"},{\"icon\":\"fa fa-fire\",\"text\":\"会生活\",\"title\":\"会生活\",\"link\":\"/category/living\"},{\"icon\":\"fa fa-gift\",\"text\":\"美奇迹\",\"title\":\"美奇迹\",\"link\":\"/category/travel\"}]'),(10,'home_slides','[{\"image\":\"/uploads/slide_1.jpg\",\"text\":\"轮播项一\",\"link\":\"https://zce.me\"},{\"image\":\"/uploads/slide_2.jpg\",\"text\":\"轮播项二\",\"link\":\"https://zce.me\"}]');

#
# Structure for table "posts"
#

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `slug` varchar(200) NOT NULL COMMENT '别名',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `feature` varchar(200) DEFAULT NULL COMMENT '特色图像',
  `created` datetime NOT NULL COMMENT '创建时间',
  `content` text COMMENT '内容',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '浏览数',
  `likes` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `status` varchar(20) NOT NULL COMMENT '状态（drafted(草稿)/published(已发布)/trashed(废弃)）',
  `user_id` int(11) NOT NULL COMMENT '用户 ID',
  `category_id` int(11) NOT NULL COMMENT '分类 ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
)  AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "posts"
#

INSERT INTO `posts` VALUES (1,'hello-world','世界，你好','/uploads/widget_4.jpg','2017-07-01 08:08:00','欢迎使用阿里百秀。这是您的第一篇文章。编辑或删除它，然后开始写作吧！',222,111,'published',1,1),(2,'simple-post-2','第一篇示例文章','/uploads/widget_5.jpg','2017-07-01 09:00:00','欢迎使用阿里百秀。这是一篇示例文章',123,10,'published',1,1),(3,'simple-post-3','第二篇示例文章','/uploads/widget_3.jpg','2017-07-01 12:00:00','欢迎使用阿里百秀。这是一篇示例文章',20,120,'published',1,2),(4,'simple-post-4','第三篇示例文章','/uploads/ye05.png','2017-07-01 14:00:00','欢迎使用阿里百秀。这是一篇示例文章',40,100,'published',1,3),(5,'simple-post-5','第四篇示例文章','/uploads/ye05.png','2017-07-01 14:00:00','欢迎使用阿里百秀。这是一篇示例文章',40,100,'drafted',1,3),(6,'hello-world6','世界，你好','/uploads/2017/hello-world.jpg','2017-07-01 08:08:00','欢迎使用阿里百秀。这是您的第一篇文章。编辑或删除它，然后开始写作吧！',222,111,'published',1,1);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `slug` varchar(200) NOT NULL COMMENT '别名',
  `email` varchar(200) NOT NULL COMMENT '邮箱',
  `password` varchar(200) NOT NULL COMMENT '密码',
  `nickname` varchar(100) DEFAULT NULL COMMENT '昵称',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `bio` varchar(500) DEFAULT NULL COMMENT '简介',
  `status` varchar(20) NOT NULL COMMENT '状态（unactivated(未激活)/activated(激活)/forbidden(禁用)/trashed(废弃)）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `email` (`email`)
)  AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','admin@heima.me','123456','管理员','/uploads/avatar.jpg',NULL,'activated'),(2,'jack','jack@heima.com','123456','杰克','/uploads/avatar_1.jpg',NULL,'activated'),(3,'rose','rose@heima.com','123456','肉丝','/uploads/avatar_2.jpg',NULL,'activated');
