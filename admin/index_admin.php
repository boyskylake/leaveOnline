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
  $sql = "SELECT * FROM leave_personnel";
  $result = $conn->query($sql);
?>
<body>
  <div class="py-5 bg-white text-dark" >
    <div class="container">
      <div class="row">
        <!-- <div class="col_md-4">
            <div class="panel panel-primary">
              <div class="panel-heading"><h4>ผู้ใช้</h4></div>
              <div class="panel-body">บุคลากร</div>
              <div class="panel-body">แอดมิน</div>
              <div class="panel-body">พนักงานปริ้น</div>
            </div>  
          
        </div> -->
        <div class="col-md-12">
          <table class="table table-condensed">
            <thead>
              <tr>
                <td ><h5><span class="label label-default">รหัสพนักงาน</span></h5></td>
                <td ><h5><span class="label label-default">ชื่อ-สกุล</span></h5></td>
                <td ><h5><span class="label label-default">สังกัด</span></h5></td>
                <td ><h5><span class="label label-default">สถานะ</span></h5></td>
                <td class="text-center label-default" colspan="2">จัดการ</td>
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
  <?php
      include 'include/footer.php';
   ?>
</body>
</html>