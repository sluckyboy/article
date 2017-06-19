<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章管理系统</title>
</head>
<body>
    <div>
        <h2><?php echo $rst['title']; ?></h2>
        <span>时间：<?php echo $rst['addtime']; ?></span>
        <span>分类：<?php echo $rst['cname'];?></span>
        <span>作者：<?php echo $rst['author']; ?></span>
    </div>
    <div><?php echo $rst['content'];?></div>
</body>
</html>