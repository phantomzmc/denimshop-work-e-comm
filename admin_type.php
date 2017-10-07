<?php  //session _start();
$session_adminid = isset($_POST['sess_adminid']);
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title></title>

  </head>
  <body>
    <?php include "admin_menu.php"; ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 align="center">เพิ่มประเภทสินค้าใหม่</h1>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<form class="form-horizontal" method="post" action="add_pro_type.php">
					<div class="col-sm-10">
						<input class="form-control" type="text" name="typename" placeholder="กรุณากรอกประเภทสินค้า">
					</div>
					<div class="col-sm-2">
						<button class="btn btn-success" type="submit" name="submit" value="Submit">Submit</button>
					</div>
			    </form>
			</div>
		</div>
		<br>


    <?php
    if($number<>0) {
			echo "<div class='container'>
				<div class='row'>
    	<table class='table table-hover'>
    	<tr  bgcolor ='#E8E8E8'>
    		<td><center><b>ลำดับ</b></center></td>
    		<td><center><b>ประเภทสินค้า</b></center></td>
    		<td><center><b>[แก้ไข]</b></center></td>
    		<td><center><b>[ลบ]</b></center></td>
    	</tr> ";
    	while ($rs=mysql_fetch_array($result)) {
    		$id_type=$rs['type_id'];
    		$name_type=$rs['type_name'];
    		echo "
    		 <tr >
				 	<td><center>$no</center></td>
    			<td align='center'>$name_type</td>
    			 <td align='center'><a href= 'admin_type_edit.php?id_edit=$id_type'>
					 			<button class='btn btn-warning'>เเก้ไข</button>
								</a>
					</td>
    			<td align='center'><a href= 'admin_type_delete.php?id_del=$id_type'>
							<button class='btn btn-danger'>ลบ</button>
							</a>
					</td>
    		</tr> ";
    			$no++;
    	}
    	echo "</table></div></div>";
    	mysql_close();
    }
    ?>
	</div>
  </body>
</html>
