<?php
if($session_adminid<>session_id()) {
	header("Location : admin_check.php"); exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>ร้านค้าออนไลน์ส่วนผู้ดูแลระบบ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<? include "admin_menu.php";  ?>
	<div class="container">
			<h2>เพิ่มรายการสินค้า</h2>
				<form class="form-horizontal" action="admin_product_add2.php" method="post" enctype="multipart/form-data" >
					<div class="form-group">
      				<label class="control-label col-sm-2" for="name">ชื่อสินค้า</label>
      			<div class="col-sm-10">
        			<input type="name" class="form-control" name="name" placeholder="กรุณากรอกชื่อสินค้า">
      			</div>
    			</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="typeProduct">ประเภทสินค้า</label>
						<div class="col-sm-10">
						<select name="ref_id_type" class="form-control">
							<option value="0" เลือกประเภทสินค้า</option>
								<?	include "connect.php";
									$sql="select *  from pro_type";
									$result=mysql_db_query($dbname,$sql);
									while($rs=mysql_fetch_array($result)) {$id_type=$rs['type_id'];$name_type=$rs['type_name'];
										echo "<option value='$id_type'> $name_type</option>";
									}
									?>
		        </select>
						</div>
					</div>
    	<div class="form-group">
    		<label class="control-label col-sm-2">รายละเอียด</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="5" name="detail"></textarea>
				</div>
    	</div>
			<div class="form-group">
					<label class="control-label col-sm-2" for="price">ราคา</label>
				<div class="col-sm-8">
					<input type="price" class="form-control" name="price" placeholder="กรุณากรอกชื่อราคาสินค้า">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">รูปภาพ</label>
				<div class="col-sm-10">
					<input name="file_pic" type="file"/>
   				<input name="MAX_FILE_SIZE" type="hidden" value="100000" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="center">
							 <button type="submit" class="btn btn-success" name="Submit">Submit</button>
							 <button type="reset" class="btn btn-danger" name="Submit2">Reset</button>
				</div>
			</div>
   </form>

	 	</div>
  </body>
</html>
