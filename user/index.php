<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<?php 
  include 'include/header.php';
  include '../include/bootstrap.php';
  include '../include/conDB.php';
  include 'include/check_login.php';

  $sql = "SELECT * FROM leave_personnel";
    $result = $conn->query($sql);

    $num = $_SESSION["personnel_id"];
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
  <form>
  <div class="py-5 bg-defult text-dark" >
    <br><br><br><br>
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
              <input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="จำนวนวันที่เหลือในการลา  : <?php echo $objResult['personnel_leaveleft']; ?>">
              <input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="จำนวนวันที่ลาแล้ว  : <?php echo $objResult['personnel_leavecollect']; ?>">
              <input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="ตำแหน่ง  : <?php echo $objResult['personnel_position']; ?>">
              <input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="ระดับ  : <?php echo $objResult['personnel_degree']; ?>">
              <input type="text" class="form-control" id="InputID" name="InputID" disabled="true"  value="สังกัด  : <?php echo $objResult['personnel_Affiliation']; ?>">
               
                  
          </div>
          <a href="changepassword.php">เปลี่ยนรหัสผ่าน</a></li>
        </div>  
      </div>
    </div>
  </div>
</form>
<br><br><br><br><br><br><br><br><br>

<?php
   
   // include 'include/footer.php';
  }
       mysqli_close($conn);
?>
  
</body>
</html>