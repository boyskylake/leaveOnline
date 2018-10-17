<?php 
  // session_start();
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';

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
 ?>
  
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>กรอกรายละเอียดการลา</h2>
          <form name="frm" method="post" action="include/process_add_user.php">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">IDLine</label>
                  <input type="text" class="form-control" id="id" value="<?php echo $objResult['personnel_name']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" class="form-control" id="id"> </div>
              </div>
            </div>
            <div class="form-group">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="name"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="position"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="degree"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="Affiliation"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="leavecollect" > </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="leaveleft"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="leaveall"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="InputName">ขอลาพักผ่อนตั้งแต่วันที่</label>
                  <input type="date" class="form-control" id="leavesince"> </div>
                <div class="col-md-4">
                  <label for="InputName">ถึงวันที่</label>
                  <input type="date" class="form-control" id="leaveat"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-9">
                  <label for="Textarea">ในระหว่างการลาจะติดต่อข้าพเจ้าได้ที่</label>
                  <textarea class="form-control" id="commune" rows="3" placeholder="กรุณากรอกข้อมูลที่สามรถติดต่อได้"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">หมายเลขโทรศัพท์</label>
                  <input type="text" class="form-control" id="phone" placeholder="กรุณากรอก หมายเลขโทรศัพท์"> </div>
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
    // }
    //    mysqli_close($conn);
  ?>
  
</body>

</html>
