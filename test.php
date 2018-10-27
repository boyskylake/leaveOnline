<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<?php
	include 'include/bootstrap.php';
?>
<body>
	<div class="py-5 bg-defult text-dark" >
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
 						<div class="panel-heading">
    						<h2 class="panel-title">ผู้ใช้</h2>
  						</div>
  						<input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="รหัสพนักงาน  : <?php echo $num ?>">
  						<input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="ชื่อ-สกุล  : <?php echo $objResult['personnel_name']; ?>">
  						
					</div>
				</div>	
				<div class="col-md-8">
					<div class="panel panel-danger">
 						<div class="panel-heading">
    						<h1 class="panel-title">ข้อมูลส่วนตัว</h1>
  						</div>
  						<form name="frm" method="post" action="include/save_user.php">
          	<div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" name="id" class="form-control" id="InputID" placeholder="กรุณากรอก รหัสพนักงาน" > </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" name="name" class="form-control" id="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" > </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" name="position" class="form-control" id="InputPosition"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" name="degree" class="form-control" id="InputDegree"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" name="affiliation" class="form-control" id="InputAffiliation"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" name="leavecollect" class="form-control" id="InputLeaveCollect"> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" name="leaveleft" class="form-control" id="InputLeaveleft"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" name="leaveall" class="form-control" id="InputLeaveall"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" id="status" name="status">
                <option>ADMIN</option>
                <option>USER</option>
                <<option>PRINTER</option>}
                option
                </select>
              </div>
            </div>
            <div class="form-group">
                          <div class="row">
                          <div class="col-md-5">
                              <label for="InputName">ลายเซ็น</label>
                              <input type="file" required class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/gif " >
                          </div>
                      </div>
                  </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="text" name="password" class="form-control" id="InputPassword" placeholder="กรุณากรอก รหัสผ่าน"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ยืนยันรหัสผ่าน</label>
                  <input type="text" name="conpassword" class="form-control" id="InputConPassword" placeholder="กรุณากรอก รหัสผ่าน"> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button>
          </form>
  						 
    							
					</div>
					<a href="changepassword.php">เปลี่ยนรหัสผ่าน</a></li>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>