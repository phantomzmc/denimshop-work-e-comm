
<?php session_start();
	$name=$_POST[name];
	$email=$_POST[email];
	$tel=$_POST[tel];
	$address=$_POST[address];
	$total_order=$_POST[total_order];



	if($name=="") {
		echo "<h3> error : กรุณาป้อนชื่อ-สกุล</h3>";
		exit();
  } else if($address="") {
  		echo "<h3> error : กรุณาป้อนที่อยู่</h3>";
  		exit();
  	}
  	$date_now=date("d-m-y");
  	include "connect.php";
  	$sql="insert into pro_order values(null,'$name','$email','$tel','$address','$total_order','$date_now')";
  mysql_db_query($dbname,$sql);
  $sql2="select max(order_id) from pro_order";
  		$result2= mysql_db_query($dbname,$sql2);
  		$row=mysql_fetch_row($result2);
  	for($i=0;$i<count($sess_id);$i++) {
  		$sql3="insert into order_detail values('$row[0]','$sess_id[$i]','$sess_num[$i]','$sess_price[$i]')";
  mysql_db_query($dbname,$sql3);
  }
  session_unregister("sess_id");
  session_unregister("sess_name");
  session_unregister("sess_price");
  session_unregister("sess_num");
  echo "<h3> บันทึกรายการสั่งซื้อเรียบร้อยแล้ว </h3>";
  mysql_close();
  ?>
