<?php   //session_start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>ร้านค้าออนไลน์ส่วนผู้ดูแลระบบ</title>
</head>
<body>
<? include "admin_menu.php";  ?>
<p><b>เพิ่มรายการสินค้า</b></p>
<form action="admin_product_add2.php" method="post" enctype="multipart/form-data" >
  <table width="400" border="0" cellspacing="1" cellpadding="0">
    <tr>
      <td>ชื่อสินค้า</td>
      <td>
        <input name="name" type="text"  size="40" />*</td>
    </tr>

    <tr>
      <td>ประเภทสินค้า</td>
      <td>
        <select name="ref_id_type" >
	<option value="0" เลือกประเภทสินค้า</option>
	<?	include "connect.php";
		$sql="select *  from pro_type";
		$result=mysql_db_query($dbname,$sql);
		while($rs=mysql_fetch_array($result)) {
			$id_type=$rs[type_id];
			$name_type=$rs[type_name];
			echo "<option value='$id_type'> $name_type</option>";
		}
	?>
        </select> * </td>
    </tr>
    <tr>
         <td>รายละเอียด</td>
         <td>
           <textarea name="detail" col="60" rows="4"></textarea>
         *</td>
       </tr>
       <tr>
         <td>ราคา</td>
         <td>
           <input name="price" type="text"  />
               บาท *</td>
       </tr>
       <tr>
         <td>รูปภาพ</td>
         <td>	<input name="file_pic" type="file"/>
   	<input name="MAX_FILE_SIZE" type="hidden" value="100000" /></td>
       </tr>
       <tr>
         <td ></td>
   	  <td>
           <input type="submit" name="Submit" value="Submit" />
           <input type="reset" name="Submit2" value="Reset" />
         </td>
       </tr>
     </table>
   </form>
   </body>
   </html>
