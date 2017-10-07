class<?php  //session_start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$id_edit=$_GET['id_edit'];
include "connect.php";
$sql="select  *  from   product where pro_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$id_pro=$rs['pro_id'];
$code_pro=sprintf("%05d",$id_pro);
$name_pro=$rs['pro_name'];
$detail_pro=$rs['pro_detail'];
$ref_id_type=$rs['type_id'];
$price_pro=$rs['pro_price'];
$photo_pro=$rs['pro_photo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>ร้านค้าออนไลน์ส่วนผู้ดูแลระบบ</title>
</head>
<body>
<?php include "admin_menu.php";  ?>
<div class="container">
	<h2>แก้ไขรายการสินค้า</h2>

    <form class="form-horizontal" action="admin_product_edit2.php" method="post"  enctype="multipart/form-data">


			<div class="form-group">
        <label class="control-label col-sm-2">รหัสสินค้า</label>
        <div class="col-sm-10">
          <?=$code_pro?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">ชื่อสินค้า</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value="<?=$name_pro?>">
        </div>
      </div>
			<div class="form-group">
				<label class="control-label col-sm-2">ประเภทสินค้า</label>
				<div class="col-sm-10">
					<select name="ref_id_type" class="form-control">
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
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="typeProduct">รายละเอียด</label>
				<div class="col-sm-10">
					<textarea name="detail" class="form-control" ><?=$detail_pro?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="typeProduct">ราคา</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="price" value="<?=$price_pro?>">
				</div>
			</div>
    	<div class="form-group">
				<label class="control-label col-sm-2" for="typeProduct">รูปภาพ</label>
				<div class="col-sm-10">
					<img src="imgProduct/<?=$photo_pro?>">
				</div>
    	</div>
			<div class="form-group">
				<div class="col-sm-6" align="center">
					<button class="btn btn-success" type="submit" name="submit" value="Submit">Submit</button>
					<button class="btn btn-danger" type="submit" name="submit" value="Submit">Reset</button>
				</div>
			</div>
      </form>
    </div>
  </body>
</html>
