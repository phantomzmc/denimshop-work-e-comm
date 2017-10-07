<? session_start();
 // $sess_id = $_POST['sess_id'];
 // isset($_REQUEST['sess_id']) ? $sess_id = $_REQUEST['sess_id'] : $sess_id = '';
 // isset($_REQUEST['sess_name']) ? $sess_name = $_REQUEST['sess_name'] : $sess_name = '';
 // isset($_REQUEST['sess_num']) ? $sess_num = $_REQUEST['sess_num'] : $sess_num = '';
 // isset($_REQUEST['sess_price']) ? $sess_price = $_REQUEST['sess_price'] : $sess_price = '';
 // isset($_REQUEST['total']) ? $total = $_REQUEST['total'] : $total = '';

// $sess_name = isset($_POST['sess_name']);
// $sess_num = isset($_POST['sess_num']);
// $sess_price = isset($_POST['sess_price']);
// $total = isset($_POST['total']);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ร้านค้าออนไลน์</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include 'nav_user.php';
	 ?>
	<table width="770" border="0" class="table table-hover">
	<tr>
		<td width="174" height="220" valign="top" bgcolor="#EAEAEA">
			<center><b>ประเภทสินค้า</b></center>
			<?php
				include "connect.php";
				include "type_list.php";
			?>
		</td>
		<td width="580" valign="top">
		<?php
			if(count($sess_id)==0) {
				echo "ยังไม่พบรายการสินค้าในตะกร้า <br>";
			}else {
			  # code...

		?>
		<form method="post" action="basket_cal.php">
		<table width="100%" class="table table-hover">
			<tr bgcolor="#E8E8E8">
				<td width="6%"><center><b>ลบ</b></center></td>
        <td width="60%"><center><b>ชื่อสินค้า</b></center></td>
        				<td width="12%"><center><b>จำนวน</b></center></td>
        				<td width="10%"><center><b>ราคา</b></center></td>
        				<td width="12%"><center><b>รวม</b></center></td>
        			</tr>
        			<?php

        				for($i=0;$i<count($sess_id);$i++) {
        				$total_unit=$sess_num[$i] * $sess_price[$i];
        				$total=$total+$total_unit;
        				echo "
        				<tr>
        				<td><center>
        				  <input type='checkbox' name='pro_del[]' value='$sess_id[$i]'>
        				</center>
        				</td>
        				<td>$sess_name[$i]</td>
        				<td><center>
        				<input type='text' name='pro_num[]' value='$sess_num[$i]' size='4'>
        				</center>
        				</td>
        				<td><center>$sess_price[$i]</center></td>
        				<td><center>$total_unit</center></td>
        				</tr>";
        				}
        			?>
        			</table>
              <p align="right">
              				<?php echo "จำนวนเงินทั้งหมด $total   บาท "; ?><br><br>
							  <button class="btn btn-warning" name="calculate">คำนวณใหม่</button>
							  <button class="btn btn-success" name="complete">สั่งซื้อ</button>
              			</p>
              		</form>
              		<?php
              			 }
              		?>
            </td>
          </tr>
      </table>
  </body>
</html>
