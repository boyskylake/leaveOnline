<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>change-password</title>
</head>
<?php
  include 'include/header.php';
  include '../include/bootstrap.php';
?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <br><br><br><br><br><br>
        <div class="col-md-8">
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h2 class="panel-title">เปลี่ยนรหัสผ่าน</h2>
              </div>
              <form name="frm" method="post" action="include/process_change.php">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">รหัสผ่านเดิม</label>
                    <input type="password" class="form-control" id="id" name="pass" required> </div>
                </div>
              </div>
            
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" id="name" name="passnew" required> </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control" id="name" name="conpassnew" required> </div>
                </div>
              </div>
            
            <button type="submit" class="btn btn-warning">บันทึก</button>
        </form>
                  
          
      </div>
    </div>
  </div>
  
</body>
</html>