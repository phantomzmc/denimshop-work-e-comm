<?php session_start();

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
                if(count($sess_id)==0) {
                echo "ไม่พบรายการสินค้าในตะกร้า <br>";
              } else {
                ?>
                <h2 align="center">ใบสั่งซื้อสินค้า</h2>
                <div class="container">
                  <div class="row">
                  <div class="col-sm-6 col-xs-12">
                        <form method="post" action="pro_order2.php" class="form-horizontal">
                        <div class="form-group">
                          <label for="name" class="control-label col-sm-2">ชื่อ-สกุล :</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="email" class="control-label col-sm-2">อีเมล์  :</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="tel" class="control-label col-sm-2">เบอร์ติดต่อ  :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="tel" placeholder="เบอร์ติดด่อ">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="address" class="control-label col-sm-2">ที่อยู่  :</label>
                      <div class="col-sm-8">
                        <textarea class="from-control" name="address" cols="40" rows="4"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                  <table width="600" class="table table-hover">
                  <tr bgcolor="#E8E8E8">
                    <td width="6%"><center><b>รหัส<br>สินค้า</b></center></td>
                    <td width="60%"><center><b>ชื่อสินค้า</b></center></td>
                    <td width="12%"><center><b>จำนวน</b></center></td>
                    <td width="10%"><center><b>ราคา</b></center></td>
                    <td width="12%"><center><b>รวม</b></center></td>
                  </tr>
                  <?php
                    for($i=0;$i<count($sess_id);$i++) {
                      $total_unit=$sess_num[$i] * $sess_price[$i];
                      $total=$total+$total_unit;
                      $code=sprintf("%05d",$sess_id[$i]);
                      echo "
                        <tr>
                          <td>$code</td>
                          <td>$sess_name[$i]</td>
                          <td><center>$sess_num[$i]</center></td>
                          <td><center>$sess_price[$i]</center></td>
                          <td><center>$total_unit</center></td>
                          </tr>";
                        }
                        ?>
                      </table><br>
                  </div>
                  </div>
                </div>


                    <div class="col-sm-6">
                    </div>
                        <div class="col-sm-6" align="right">
                          <?php echo "<h4 align='right'>จำนวนเงินทั้งหมด  $total   บาท</h4> "; ?><br>
                        </div>

                              <center>
                                  <button class="btn btn-success">ยืนยัน</button>
                                  <button class="btn btn-danger">ยกเลิก</button>
                              </center>


                                <input type="hidden"  name="total_order" value="<?=$total?>">
                              </form>
                              <?php
                                }
                                ?>
                              </body>
</html>
