<? php
//xml 文件
header('Content-Type: text/xml; charset=utf-8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOTS', 'localhost');
define('DB_NAME', 'stand');

$link_ID = mysqli_connect(DB,HOST, DB_USER, DB_PASSWORD);
?>