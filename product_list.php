<?php
$id_type_select=$_GET[id_type];
?>
<html>
<head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>ร้านค้าออนไลน์</title>
</head>
<body>
	<h2>:: ร้านค้าออนไลน์ ::</h2>
<p>
	[<a href="index.php">หน้าแรก</a>]
	[<a href="basket.php">ตระกร้าสินค้า</a>]
	</p>
	<table border="0" width="770">
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
