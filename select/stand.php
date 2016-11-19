<? php
//xml 文件
header('Content-Type: text/xml; charset=utf-8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOTS', 'localhost');
define('DB_NAME', 'stand');

$link_ID = mysqli_connect(DB,HOST, DB_USER, DB_PASSWORD);
$charset = mysqli_query($link_ID, "Set NAME utf-8-8");
mysqli_select_db($link_ID, DB_NAME);

$f_proc_id = $_POST['f_proc_id'];

$sql = "select * from users where f_user_id = '$f_proc_id'";

$result = mysqli_query($link_ID, $sql);
$row = mysqli_fetch_array($result);
$f_user_name = $row['f_user_name'];

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<root>';
echo "<res_echo>$f_usr_name</res_echo>";
echo '</root>';