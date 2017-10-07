<? $id_pro=$_GET['id_pro'];
?>
<html>
<head>
	<meta charset="utf-8">
	<title>ร้านค้าออนไลน์</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include 'nav_user.php';
	 ?>
	<!-- <p>
	[<a href='index.php'>หน้าแรก </a>]
	[<a href='basket.php'>ดูตะกร้าสินค้า </a>]
	</p> -->
	<table class="table table-striped">
	<tr>
		<td width="174" height="220" valign="top" bgcolor="#EAEAEA">
			<center><b>ประเภทสินค้า</b></center>
			<?
				include "connect.php";
				include "type_list.php";
			?>
		</td>
		<td width="580" valign="top">
		<table width="100%" border="0" cellspacing="4" class="table">
			<?
				$sql="select * from product where pro_id='$id_pro' ";
				$result=mysql_db_query($dbname,$sql);
        $rs=mysql_fetch_array($result);
        				    $id_pro=$rs['pro_id'];
        						$code=sprintf("%05d",$id_pro);
        						$name_pro=$rs['pro_name'];
        						$detail_pro=$rs['pro_detail'];
        						$ref_id_type=$rs['type_id'];
        						$price_pro=$rs['pro_price'];
        						$photo_pro=$rs['pro_photo'];
        						if($photo_pro=="") {   	$photo_pro="temp.jpg";  	}

        echo " <tr>
                          <td width='20%' valign='top'> <img src='imgProduct/$photo_pro'width='300' height='300'>
        		</td>
        		<td width='80%' valign='top'><b>รหัสสินค้า  :</b>$code<br>
        						   <b>ชื่อสินค้า  :</b>$name_pro<br>
        						    <b>ราคา  :</b>$price_pro   บาท<br><br>
        						    <b>รายละเอียด :</b><br>
        						     $detail_pro<br><br>

				 	<a href='basket_add.php?id_pro=$id_pro' class='btn btn-info'>หยิบใส่ตะกร้า </a>


        	   	</td>
        	    </tr>";
        ?>
        </table>
        </td>
        </tr>
        </table>
        </html>
