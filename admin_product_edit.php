<?php  //session_start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$id_edit=$_GET[id_edit];
include "connect.php";
$sql="select  *  from   product where pro_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$id_pro=$rs[pro_id];
$code_pro=sprintf("%05d",$id_pro);
$name_pro=$rs[pro_name];
$detail_pro=$rs[pro_detail];
$ref_id_type=$rs[type_id];
$price_pro=$rs[pro_price];
$photo_pro=$rs[pro_photo];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>ร้านค้าออนไลน์ส่วนผู้ดูแลระบบ</title>
</head>
<body>
<?php include "admin_menu.php";  ?>
<form action="admin_product_edit2.php" method="post"  enctype="multipart/form-data">
<p><b>แก้ไขรายการสินค้า</b></p>
<input name="id_edit" type="hidden" value=<?=$id_edit?>">
<table width=600 border=0 cellspacing=1 cellpadding=0>
<tr>	<td width=150>รหัสสินค้า</td>
	<td><?=$code_pro?></td>
</tr>
<tr>	<td width=150>ชื่อสินค้า</td>
	<td><input type="text" name="name" value="<?=$name_pro?>">*</td>
</tr>

<tr>	<td width=150>ประเภทสินค้า</td>
	<td>
		<select name="ref_id_type">
		<?	$sql2="select * from pro_type";
		$result2=mysql_db_query($dbname,$sql2);
		while($rs=mysql_fetch_array($result2)) {
		$id_type=$rs[type_id];
		$name_type=$rs[type_name];
		if($ref_id_type==$id_type) {
      echo "<option value='$id_type' selected>$name_type</option>";
      		}    else {
      			echo "<option value='$id_type' >$name_type</option>";
      				}
      			}
      		?>
      		</select>
      </td>
      </tr>
      <tr>	<td width=150>รายละเอียด</td>
      	<td><textarea name="detail" cols="60" rows="4"><?=$detail_pro?></textarea>*</td>
      </tr>
      <tr>	<td width=150>ราคา</td>
      	<td><input type="text" name="price" value="<?=$price_pro?>">บาท *</td>
      </tr>
      <tr>	<td width=150>รูปภาพ </td>
      	<td><img src="imgProduct/<?=$photo_pro?>"></td>
      </tr>
      <tr>	<td><input type="submit" name="Submit" value="Submit" ></td>
        	<td> <input type="reset" name="Submit2" value="Reset" >  </td>
       </tr>
      </table>
      </form>
      	</body>
      	</html>
