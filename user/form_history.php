<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>history</title>
</head>
<?php 
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
  // $sql = "SELECT * FROM leave_leavepreview";
  // $result = $conn->query($sql);

  $num = $_SESSION["personnel_id"];
  $sql = "SELECT * FROM `leave_leavepreview` WHERE `personnel_id`= $num";
  $result = $conn->query($sql);
 ?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br><br><h2>ประวัติการลา</h2>          
          <br><br><div class="panel panel-danger">
            <div class="panel-heading"><h4>การลาของฉัน <?php $num ?></h4></div>
              <div class="table-responsive">
                <table id="employee_data" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th ">เลขที่ใบลา</th>
                <th class="text-center">ลาวันที่</th>
                <th class="text-center">ถึงวันที่</th>
                <th class="text-center">หัวหน้าสังกัด</th>
                <th class="text-center">ผู้อำนายการ</th>
                <th class="text-center">จัดการ</th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                      <?php  
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {

                          echo "<td>".$row["leave_id"]."</td>";
                          echo "<td>".$row["personnel_leavesince"]."</td>";
                          echo "<td>".$row["personnel_leaveat"]."</td>";                      
                          echo "<td>".$row["leave_status1"]."</td>";
                          echo "<td>".$row["leave_status2"]."</td>";
                          echo "<td><a href='../printer/printpreview.php?print=".$row["leave_id"]."'><input class='btn btn-warning' type='submit' value='PrintPreview' ></a></td>";
                          echo "</tr>";
                          }
                        }
                         else {
                          echo "0 results";
                    }
                  $conn->close();
                ?>
            </tbody>
            
            
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
    // include 'include/footer.php';
  ?>
  
</body>

</html>