<?php	session_start();
	session_register("sess_id");
	session_register("sess_name");
	session_register("sess_price");
	session_register("sess_num"); 
	$id_pro=$_GET[id_pro];

	if(count($sess_id)=="0") {
		$check=1; 
	
	} else if(!in_array($id_pro,$sess_id)) {
		$check=1;
	}
	if($check==1) {
		include "connect.php";
		$sql="select * from product where pro_id='$id_pro' ";
		$result=mysql_db_query($dbname,$sql);
		$rs=mysql_fetch_array($result);
		$sess_id[]=$rs['pro_id'];
		$sess_name[]=$rs['pro_name'];
		$sess_price[]=$rs['pro_price'];
		$sess_num[]=1;
	}
	header("Location:basket.php");
?>
