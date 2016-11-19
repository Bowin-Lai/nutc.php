<?php
	error_reporting(0);
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_HOST','localhost');
	define('DB_NAME','stand');
	$link_ID = @mysqli_connect (DB_HOST,DB_USER,DB_PASSWORD);
	$charset = mysqli_query($link_ID,"SET NAMES 'utf8'");
	mysqli_select_db($link_ID,DB_NAME);
	$myid = $_POST["front_id"];
	$myname = $_POST["front_name"];
	$out = $_POST["out"];
	if (isset($out))
	{
		switch($out)
		{
			case "新增":
				$sql = "INSERT INTO `stud_table` VALUES ('', '$myid', '1028', '$myname', null, null, null, null, null, '學生', null, null, null)";
				break;
			case "刪除":
				$sql = "delete from stud_table where f_st_id = '$myid'";
				break;	
			case "修改":
				$sql = "update stud_table set f_st_name = '$myname' where f_st_id = '$myid'";
				break;	
			case "查詢":
				$sql = "select * from stud_table where f_st_id like '$myid%' order by f_st_id" ;
				break;		
		}
	    $result = mysqli_query($link_ID,$sql);
		$sn_index = mysqli_num_rows($result);
		$buf = "";
		$buf.= "<table border=1>";
		for ($i=1;$i<=$sn_index;$i++)
		{
			$row = mysqli_fetch_array($result);
			$id_buf = $row["f_st_id"];
			$name_buf = $row["f_st_name"];
			$buf.= "<tr><td>$id_buf</td><td>$name_buf</td><td>$out</td>";			
		}
		$buf.=  "</table>";
	}
	else
	{
		$id_buf = "";
		$name_buf = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf8">
</head>
<body>
<form method = post>
學號 <input type="text" name="front_id" size=10 value=<?php echo $id_buf; ?>>
姓名 <input type="text" name="front_name" size=10 value=<?php echo $name_buf; ?>>

<input type="submit" name=out value ="新增">
<input type="submit" name=out value ="修改">
<input type="submit" name=out value ="刪除">
<input type="submit" name=out value ="查詢">

<div id=disp> <?php echo $buf?></div>
</body>
</html>
