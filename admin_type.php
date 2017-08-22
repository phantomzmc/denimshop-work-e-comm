<?php  //session _start();
if($session_adminid <> session_id()) {
	header("Location : login.php"); exit();
}
include "connect.php";
$sql="select * from pro_type";
$result=mysql_db_query("$dbname","$sql");
$number=mysql_num_rows($result);
$no=1;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include "admin_menu.php"; ?>
    <form method="post" action="add_pro_type.php">
    เพิ่มประเภทสินค้าใหม่
    <input type="text" name="typename">
    <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if($number<>0) {  	echo "<p><b>แสดงประเภทสินค้า</b></p>
    	<table border='1'>
    	<tr  bgcolor ='#E8E8E8'>
    		<td><center><b>ลำดับ</b></center></td>
    		<td><center><b>ประเภทสินค้า</b></center></td>
    		<td><center><b>[แก้ไข]</b></center></td>
    		<td><center><b>[ลบ]</b></center></td>
    	</tr> ";
    	while ($rs=mysql_fetch_array($result)) {
    		$id_type=$rs[type_id];
    		$name_type=$rs[type_name];
    		echo "
    		 <tr >	<td><center>$no</center></td>
    			<td>$name_type</td>
    			 <td><a href= 'admin_type_edit.php?id_edit=$id_type'>[แก้ไข]</a></td>
    			<td><a href= 'admin_type_delete.php?id_del=$id_type'>[ลบ]</a></td>
    		</tr> ";
    			$no++;
    	}
    	echo "</table>";
    	mysql_close();
    }
    ?>
  </body>
</html>
