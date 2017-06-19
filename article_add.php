<?php 
    //实现文章添加
    //初始化数据库操作类
    require('./init.php');
    //取出文章分类
    $sql = 'select `id`,`name` from `cms_category` order by `sort`';
    $category = $db->fetchAll($sql); 
    
    //处理用户提交的添加文章信息
    if(!empty($_POST)){
        $data['cid'] = isset($_POST['category']) ? abs(intval($_POST['category'])) : 0;
        $data['title'] = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : '';
        $data['author'] = isset($_POST['author']) ? trim(htmlspecialchars($_POST['author'])) : '';
        $data['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
        if(empty($data['cid']) || empty($data['title']) || empty($data['author'])){
            $error[] = "文章分类，标题，作者不能为空";
        }else{
            $sql = 'insert into `cms_article` (`title`,`content`,`author`,`addtime`,`cid`) 
                values (:title,:content,:author,now(),:cid)';
            $db->data($data)->query($sql);
            //跳转首页
            header("location:index.php");
        }
    }
    //载入HTML模板
    define('APP','sjj');
    require('./view/article_add_html.php');
?>