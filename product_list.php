<?php
$id_type_select=$_GET[id_type];
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>ร้านค้าออนไลน์</title>
</head>
<body>
  <? include "admin_menu.php";  ?>
	<table class="table table-hover">
		<tr>
			<td width="174" height="200" valign="top" bgcolor="#eaeaea">
			<center><b>ประเภทสินค้า</b></center>
			<?php include "connect.php";
						include "type_list.php";
			?>
			<td width="580" valign="top"><div align="center">
				<table width="100%" border="0" cellspacing="4">
				<?php

					$sql="select * from product where type_id='$id_type_select'";
					$result=mysql_db_query($dbname,$sql);
					  while($rs=mysql_fetch_array($result)) {
						$id_pro=$rs[pro_id];
						$code=sprintf("%05d",$id_pro);
						$name_pro=$rs[pro_name];
						$detail_pro=$rs[pro_detail];
						$ref_id_type=$rs[type_id];
						$price_pro=$rs[pro_price];
						$photo_pro=$rs[pro_photo];
            if($photo_pro=="") {
            								$photo_pro="temp.jpg";
            						}
            						echo "<tr>
            	<td width='20%' valign='top'>
            	img src='imgProduct/$photo_pro'>
            		</td>
            <td width='80%' valign='top'>
            	<b>รหัสสินค้า  :</b>$code<br>
            	<b>ชื่อสินค้า  :</b>$name_pro<br>
            	<b>ราคา  :</b>$price_pro   บาท<br><br>
            	 [<a href='product_view.php?id_pro=$id_pro'>แสดงรายละเอียด </a>]
            	 [<a href='basket_add.php?id_pro=$id_pro'>หยิบใส่ตะกร้า </a>]<br>
            	</td>
            	</tr>";
            	}

            		?>
            				</table>
            				</td>
            			</tr>
            		</table>
            		</body>
            	</html>
