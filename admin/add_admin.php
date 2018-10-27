<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>adduser</title>
  <meta charset="UTF-8">
</head>
<?php 
  include 'include/nav.css';
  include 'include/header.php';
  include 'include/check_login.php'; 
  include 'include/conDB.php';

 ?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <?php include 'include/nav.php' ?> 
        <div class="col-md-9">
          <br><br><br><br><br>
          <div class="panel panel-danger">
            <div class="panel-heading"><h4>เพิ่มสมาชิก</h4></div>
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
                  <label for="InputName">สังกัด</label><br>
                  <!-- <input type="text" name="affiliation" class="form-control" id="InputAffiliation" required> </div> -->
                  <select name="affiliation">
                    <option value=""><-- กรุณาเลือก สังกัด --></option>
                    <?php
                      $strSQL = "SELECT * FROM personnel_affiliation ORDER BY affiliation ASC";
                      $objQuery = mysqli_query($conn, $strSQL);
                      while($objResuut = mysqli_fetch_array($objQuery))
                        {
                    ?>
                    <option value="<?php echo $objResuut["affiliation"];?>"><?php echo $objResuut["affiliation"];?></option>

                    <?php
                      }
                    ?>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <br>
                <div class="col-md-4">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" name="leavecollect" class="form-control" id="InputLeaveCollect" required> </div>
                <div class="col-md-4">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" name="leaveleft" class="form-control" id="InputLeaveleft" required> </div>
                <div class="col-md-4">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <br><input type="text" name="leaveall" class="form-control" id="InputLeaveall"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">สถานะ</label><br>
                  <select class="form-control" id="status" name="status" required>
                <option>ADMIN</option>
                <option>USER</option>
                <<option>PRINTER</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
                          <div class="row">
                          <div class="col-md-5">
                              <label for="InputName">ลายเซ็น</label>
                              <input type="file" required class="form-control" name="image" accept="image/png, image/jpeg, image/gif " >
                          </div>
                      </div>
            <br><div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="password" name="password" class="form-control" placeholder="กรุณากรอก รหัสผ่าน" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ยืนยันรหัสผ่าน</label>
                  <input type="password" name="conpassword" class="form-control" placeholder="กรุณากรอก รหัสผ่าน" required> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button><br><br>
          </form>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div><br><br><br><br>

  
  
  
  
</body>
</html>
