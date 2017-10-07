<?php    //session _start();
if($session_adminid<>session_id()) {
  header("Location : login.php"); exit();
  }
  $id_edit=$_GET[id_edit];
  include "connect.php";
  $sql="select * from pro_type where type_id='$id_edit'";
  $result=mysql_db_query("$dbname","$sql");
  $rs=mysql_fetch_array($result);
  $id_type=$rs[type_id];
  $name_type=$rs[type_name];
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <?php include "admin_menu.php"; ?>
        <form name="form1" method="post" action="admin_type_edit2.php"> แก้ไขประเภทสินค้า
          <input type="text" name="name" value="<?=$name_type?>">
          <input type="submit" name="submit" value="submit">
          <input name="id_edit" type="hidden" value="<?=$id_edit?>">
        </form>
    </body>
  </html>
