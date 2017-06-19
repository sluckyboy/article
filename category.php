<?php 
    //初始化数据库操作类
    require('./init.php');
    //获取操作标识
    $a = isset($_GET['a']) ? $_GET['a'] : '';
    if($a == 'category_add'){
        $data['name'] = trim(htmlspecialchars($_POST['name']));
        //判断分类名称是否为控
        if($data['name'] === ''){
            $error[] = "文章分类名称不能为空";
        }else{
            //判断数据库中是否有同名的分类名称
            $sql = "select `id` from `cms_category` where `name`=:name";
            if($db->data($data)->fetchRow($sql)){
                $error[] = "该文章分类名已经存在!";
            }else{
                //插入到数据库
                $sql = "insert into `cms_category` (`name`) values (:name)";
                $db->data($data)->query($sql);
            }
            
        }
    }
    //实现分类排序功能
    
    elseif($a == 'category_order'){
        //获取所有的文章分类
        $sql = "select `id` from `cms_category`";
        $result = $db->fetchAll($sql);
        //判断排序值
        $data = array();
        foreach($result as $v){
            $data[] = array(
                'id' => $v['id'],
                'sort' => isset($_POST[$v['id']]) ? intval($_POST[$v['id']]) : 0 
            );
        }
            $sql = "update `cms_category` set `sort`=:sort where `id`=:id";
            $db->data($data)->query($sql,true);
    }
    
    //删除文章分类
    elseif($a == 'category_del'){
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $sql = "select `id` from `cms_article` where `cid` = $id limit 1";
        if($db->fetchRow($sql)){
            $error[] = '该文章分类下有文章，不能删除';
        }else{
            $sql = "delete from `cms_category` where `id`=$id";
            $db->query($sql);
        }
    }
    
    //获取文章分类信息
    $sql = "select `id`, `name`, `sort` from `cms_category` order by `sort`";
    $category = $db->fetchAll($sql);
    define('APP','sjj');
    require('./view/category_list.php');
       
?>