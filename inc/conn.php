<?php
$conn = @mysqli_connect(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_passwd'],
    $config['mysql_db']
);
if (mysqli_connect_errno($conn)){
    die("连接数据库失败：" . mysqli_connect_error());
}



