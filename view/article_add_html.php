<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章管理系统</title>
</head>
<body>
    <form method="post">
                    文章分类：<select name="category">
                <?php foreach($category as $v): ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php endforeach;?>
              </select>
           <a href="./category.php">分类管理</a><br />
                    标题：<input type="text" name="title" />
                    作者：<input type="text" name="author" />
        
        <div>
            <link href="./lib/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
            <script src="./lib/umeditor/third-party/jquery.min.js"></script>
            <script src="./lib/umeditor/umeditor.config.js"></script>
            <script src="./lib/umeditor/umeditor.min.js"></script>
            <script src="./lib/umeditor/lang/zh-cn/zh-cn.js"></script>
            <script>
        		$(function(){
        			UM.getEditor('myEditor');
        		});
            </script>
            <!-- style给定宽度可以影响编辑器的最终宽度 -->
            <script stype="text/plain" id="myEditor" style="width:1025px; height:250px;" name="content">
        		<p>请在这里写文章······</p>
            </script>
        </div>
        
        <input type="submit" value="提交" />
        <input type="button" value="取消" onclick="{if(confirm("确定要取消添加文章吗？")) 
        {window.location.href='index.php';} return false;}" />
    </form>
</body>

</html>