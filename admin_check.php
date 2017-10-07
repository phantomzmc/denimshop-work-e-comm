<<<<<<< HEAD
<?php session_start();
<<<<<<< HEAD
=======
<?php ob_start();


>>>>>>> admin
  include 'connect.php';
=======
  include '../connect.php';
>>>>>>> parent of 7370bbc... final
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $strSQL = "SELECT * FROM user_1 WHERE username ='$username' and password ='$password'";
	$obj = mysql_query($strSQL);
	$cc=mysql_fetch_array($obj);
if($cc)
{
	// session_register("sess_adminid");// session_register() is used to register a session variable and it works only when register_globals is turned on.
<<<<<<< HEAD
	$sess_adminid=session_id();
<<<<<<< HEAD
  include 'index.php';
=======
  include '../admin_menu.php';
>>>>>>> parent of 7370bbc... final
	echo "<a href='logout.php'>Log Out</a>";
=======

  include 'admin_product.php';
	// echo "<a href='logout.php'>Log Out</a>";
>>>>>>> admin
}else {
		echo "<h3>Error :  username or password </h3>";
	}
mysql_close();


 ?>
