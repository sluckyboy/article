<?php 
    header('Content-type:text/html;charset=utf-8');
    echo 'hello init01 <br />';
    require('./lib/MySQLPDO.class.php');
    $dbConfig = array('user'=>'root','pass'=>'123456','dbname'=>'sjj');
    echo 'hello init02 <br />';
    $db = MySQLPDO::getInstance($dbConfig);
    //保存错误信息
    $error = array();
?>