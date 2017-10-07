<?php
  session_start();
  unset($_SESSION['session_adminid']);
  session_destroy();
  header('Location: login.php');
?>
