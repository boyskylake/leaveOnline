
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>insert-leave</title>
</head>
<?php 
  // session_start();
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
  include 'include/conDB.php';

  // $sql = "SELECT * FROM personnel_affiliation";
  // $result = $conn->query($sql);
  // $num = $_SESSION["personnel_Affiliation"];
  // if($num == "IT")
  // {
  //   $num2 = "1";
  // }
  // else{
  //   $num2 = "2";
  // }
  // $sql = "SELECT * FROM personnel_affiliation WHERE num ='".$num2."' ";
  // $result = $conn->query($sql);
  // $objResult = mysqli_fetch_assoc($result);
  // if(!$objResult)
  // {
  //   echo "Not found PersonnelID=".$num;
  // }
  // else
  // {

  $num = $_SESSION["personnel_id"];
  $sql = "SELECT * FROM leave_personnel WHERE personnel_id ='".$num."' ";
  $result = $conn->query($sql);
  $objResult = mysqli_fetch_assoc($result);


 ?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>กรอกรายละเอียดการลา</h2>
          <form name="formm" method="post" action="include/process_addleave.php">
            <!-- <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">IDLine</label>
                  <input type="text" class="form-control" id="id" value="<?php echo $objResult['personnel_name']; ?>"> </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" class="form-control" id="id" name="id" value="<?php echo $num ?>" required> </div>
              </div>
            </div>
            <div class="form-group">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $objResult['personnel_name']; ?>" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="position" name="position" value="<?php echo $objResult['personnel_position']; ?>" required> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="degree" name="degree" value="<?php echo $objResult['personnel_degree']; ?>" required> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="Affiliation"name="Affiliation" value="<?php echo $objResult['personnel_Affiliation']; ?>" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="leavecollect" name="leavecollect" value="<?php echo $objResult['personnel_leavecollect']; ?>" required> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="leaveleft" name="leaveleft" value="<?php echo $objResult['personnel_leaveleft']; ?>" required> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="leaveall" name="leaveall" value="<?php echo $objResult['personnel_leaveall']; ?>" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="InputName">ขอลาพักผ่อนตั้งแต่วันที่</label>
                  <input type="date" class="form-control" id="leavesince" name="leavesince" required> </div>
                <div class="col-md-4">
                  <label for="InputName">ถึงวันที่</label>
                  <input type="date" class="form-control" id="leaveat" name="leaveat" required> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-9">
                  <label for="Textarea">ในระหว่างการลาจะติดต่อข้าพเจ้าได้ที่</label>
                  <textarea class="form-control" id="commune" name="commune" rows="3" placeholder="กรุณากรอกข้อมูลที่สามรถติดต่อได้" required></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">หมายเลขโทรศัพท์</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="กรุณากรอก หมายเลขโทรศัพท์" required> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
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
  if(document.forms['formm'].commune.value === "")
  {
    alert("กรุณากรอก รหัสผ่าน");
    return false;
  }
  if(document.forms['formm'].phone.value === "")
  {
    alert("กรุณากรอก รหัสผ่านอีกครั้ง");
    return false;
  }
    return true;
  }
  </script>
  <?php
    // include 'include/footer.php';
    // }
    //    mysqli_close($conn);
  ?>
  
</body>
</html>
