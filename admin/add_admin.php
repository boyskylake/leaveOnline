<?php 
  include 'include/header.php';
  include 'include/check_login.php';
  
 ?>
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>เพิ่มสมาชิก</h1>
          <form name="frm" method="post" action="include/save_user.php" enctype="multipart/form-data">
          	<div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" name="id" class="form-control" id="InputID" placeholder="กรุณากรอก รหัสพนักงาน" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" name="name" class="form-control" id="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" name="position" class="form-control" id="InputPosition" required> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" name="degree" class="form-control" id="InputDegree" required> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" name="affiliation" class="form-control" id="InputAffiliation" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" name="leavecollect" class="form-control" id="InputLeaveCollect" required> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" name="leaveleft" class="form-control" id="InputLeaveleft" required> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" name="leaveall" class="form-control" id="InputLeaveall"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" id="status" name="status" required>
                <option>ADMIN</option>
                <option>USER</option>
                <<option>PRINTER</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
                          
                          <div class="col-md-5">
                              <label for="InputName">ลายเซ็น</label>
                              <input type="file" required class="form-control" name="image" accept="image/png, image/jpeg, image/gif " >
                          </div>
                      </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="text" name="password" class="form-control" placeholder="กรุณากรอก รหัสผ่าน" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ยืนยันรหัสผ่าน</label>
                  <input type="text" name="conpassword" class="form-control" placeholder="กรุณากรอก รหัสผ่าน" required> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <?php
  include 'include/footer.php';
  ?>
  
   
</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
