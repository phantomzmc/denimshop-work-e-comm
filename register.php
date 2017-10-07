<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style media="screen">
      h1{
        padding-top: 20px;
        padding-bottom: 15px;
      }
    </style>
  </head>
  <body>
    <?php
      include 'nav_user.php';
     ?>
     <h1 align=center>สมัครสมาชิก</h1>

    <div class="container">
      <div class="row">
        <form class="form-horizontal" action="register_action.php" method="post" align="center">
          <div class="form-group">
      				<label class="control-label col-sm-2" for="name">ชื่อ : </label>
      			<div class="col-sm-3">
        			<input type="text" class="form-control" name="firstname" placeholder="กรุณากรอกชื่อ">
      			</div>
      				<label class="control-label col-sm-2" for="name">นามสกุล : </label>
      			<div class="col-sm-3">
        			<input type="text" class="form-control" name="lastname" placeholder="กรุณากรอกชื่อ">
      			</div>
    			</div>
          <div class="form-group">
      				<label class="control-label col-sm-2" for="uu">Username : </label>
      			<div class="col-sm-8">
        			<input type="text" class="form-control" name="uu" placeholder="กรุณากรอก Username">
      			</div>
    			</div>
          <div class="form-group">
      				<label class="control-label col-sm-2" for="pp">Password : </label>
      			<div class="col-sm-8">
        			<input type="password" class="form-control" name="pp" placeholder="กรุณากรอก Password">
      			</div>
    			</div>
          <div class="form-group">
      				<label class="control-label col-sm-2" for="email">Email : </label>
      			<div class="col-sm-8">
        			<input type="email" class="form-control" name="email" placeholder="กรุณากรอก Email">
      			</div>
    			</div>
          <button class="btn btn-success" type="sumbit" name="button">สมัครสมาชิก</button>
          <button class="btn btn-danger" type="reset" name="button">ยกเลิก</button>


        </form>

      </div>

    </div>

  </body>
</html>
