<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>update</title>
</head>
<?php
  include '../include/conDB.php';
  include 'include/header.php';
  include 'include/check_login.php';

  $num = $_GET["edit"];
  $sql = "SELECT * FROM leave_personnel WHERE personnel_id ='".$num."' ";
  $result = $conn->query($sql);
  $objResult = mysqli_fetch_assoc($result);
  if(!$objResult)
  {
    echo "Not found PersonnelID=".$num;
  }
  else
  {
?>
<body>
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <h1 >แก้ไขข้อมูลสมาชิก</h1>
      <div class="row">
        <div class="col-md-12">
          <form name="formm" method="post" action="include/edit_user.php">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input readonly type="text" class="form-control" id="InputID" name="InputID" placeholder="กรุณากรอก รหัสพนักงาน" value="<?php echo $num ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="InputName" name="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" value="<?php echo $objResult['personnel_name']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="InputPosition" name="InputPosition" value="<?php echo $objResult['personnel_position']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="InputDegree" name="InputDegree" value="<?php echo $objResult['personnel_degree']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="InputAffiliation" name="InputAffiliation" value="<?php echo $objResult['personnel_Affiliation']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveCollect" name="InputLeaveCollect" value="<?php echo $objResult['personnel_leavecollect']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveleft" name="InputLeaveleft" value="<?php echo $objResult['personnel_leaveleft']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveall" name="InputLeaveall" value="<?php echo $objResult['personnel_leaveall']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" id="status" name="status">
                    <?php if ($objResult["personnel_status"] == 'USER'): ?>
                      <option>USER</option>
                      <option>ADMIN</option>
                      <option>PRINTER</option>
                    <?php elseif ($objResult["personnel_status"] == 'ADMIN'): ?>
                      <option>ADMIN</option>
                      <option>USER</option>
                      <option>PRINTER</option>
                    <?php else: ?>
                      <option>PRINTER</option>
                      <option>ADMIN</option>
                      <option>USER</option>
                    <?php endif ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="กรุณากรอก รหัสผ่าน" value="<?php echo $objResult['personnel_password']; ?>"> </div>                
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">                 
                  <label for="InputName">ยืนยันรหัสผ่าน</label>
                  <input type="password" class="form-control" id="InputPassword" name="InputConpassword" placeholder="กรุณากรอก รหัสผ่าน" value=""> </div>
              </div>
            </div>
            <button type="submit" onclick="return IsEmpty();" class="btn btn-primary my-2">แก้ไข</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script language="JavaScript">
  function IsEmpty(){
  if(document.forms['formm'].Name.value === "")
  {
    alert("กรุณากรอก ชื่อ");
    return false;
  }
  if(document.forms['formm'].txtName.value === "")
  {
    alert("กรุณากรอก ชื่อผู้ใช้");
    return false;
  }
  if(document.forms['formm'].txtPassword.value === "")
  {
    alert("กรุณากรอก รหัสผ่าน");
    return false;
  }
  if(document.forms['formm'].txtConPassword.value === "")
  {
    alert("กรุณากรอก รหัสผ่านอีกครั้ง");
    return false;
  }
    return true;
  }
  </script>
  <?php
      include 'include/footer.php';
  }
       mysqli_close($conn);
   ?>

</body>
</html>