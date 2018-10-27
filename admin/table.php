<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>
<?php 
  include '../include/conDB.php';
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
  include 'include/nav.css';
  $status = $_GET["status"];
  $sql = "SELECT `personnel_id`, `personnel_name`, `personnel_position`, `personnel_degree`, `personnel_Affiliation`, `personnel_leavecollect`, `personnel_leaveleft`, `personnel_leaveall`, `personnel_password`, `personnel_status`, `personnel_signature` FROM `leave_personnel` WHERE `personnel_status`= $status";
  $result = $conn->query($sql);
?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
              <div class="row">
                <?php include 'include/nav.php' ?> 
              <div class="col-md-9">
                <br><br><br><br><br><br>
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4>จัดการข้อมูล</h4></div>
                <table class="table table-bordered">
                  <thead>
                    <tr>                     
                      <td ><h5><span class="label label-default">รหัสพนักงาน</span></h5></td>
                      <td ><h5><span class="label label-default">ชื่อ-สกุล</span></h5></td>
                      <td ><h5><span class="label label-default">สังกัด</span></h5></td>
                      <td ><h5><span class="label label-default">สถานะ</span></h5></td>
                      <!-- <td class="text-center label-default" colspan="2">จัดการ</td> -->
                      <td ><h5><span class="text-center label label-default">จัดการ</span></h5></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php  
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {

                          echo "<td>".$row["personnel_id"]."</td>";
                          echo "<td>".$row["personnel_name"]."</td>";
                          echo "<td>".$row["personnel_Affiliation"]."</td>";
                          echo "<td>".$row["personnel_status"]."</td>";
                          echo "<td><a href='form_updateAdmin.php?edit=".$row["personnel_id"]."'><input class='btn btn-warning' type='submit' value='แก้ไข'></a></td>";
                          echo "<td><a href='update_sig.php?edit_sig=".$row["personnel_id"]."'><input class='btn btn-warning' type='submit' value='ลายเซ็น'></a></td>";
                          echo "<td><a href='include/delete_user.php?delete=".$row["personnel_id"]."'><input class='btn btn-danger' type='submit' value='ลบ' ></a></td>";
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
    </div>
  </div>
  </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br>
  <?php
      include 'include/footer.php';
   ?>
</body>
</html>