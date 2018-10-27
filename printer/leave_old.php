<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>leave_old</title>
</head>
<?php 
  include '../include/conDB.php';
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
  
  $sql = "SELECT * FROM `leave_leavepreview` WHERE `leave_newOld` = 'old'";
  $result = $conn->query($sql);
?>
<body>
  <div class="py-5 bg-white text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br><br><br><br><br><br>
            <div class="panel panel-danger">
              <div class="panel-heading"><h4>ประวัติใบลา</h4></div>
                <div class="table-responsive">
                  <table id="employee_data" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                      <td ><h5><span class="label label-default">รหัสใบลา</span></h5></td>
                      <td ><h5><span class="label label-default">รหัสพนักงาน</span></h5></td>
                      <td ><h5><span class="label label-default">ชื่อ-สกุล</span></h5></td>
                      <td ><h5><span class="label label-default">สังกัด</span></h5></td>
                      <td ><h5><span class="label label-default">วันที่ลา</span></h5></td>
                      <td ><h5><span class="label label-default">หัวหน้าสังกัด</span></h5></td>
                      <td ><h5><span class="label label-default">ผู้อำนวยการ</span></h5></td>
                      <td class="text-center " colspan="2">จัดการ</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                  <?php  
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {

                echo "<td>".$row["leave_id"]."</td>";
                echo "<td>".$row["personnel_id"]."</td>";
                echo "<td>".$row["personnel_name"]."</td>";
                echo "<td>".$row["personnel_Affiliation"]."</td>";
                echo "<td>".$row["leave_date"]."</td>";
                echo "<td>".$row["leave_status1"]."</td>";
                echo "<td>".$row["leave_status2"]."</td>";
                echo "<td><a href='printpreview.php?print=".$row["leave_id"]."'><input class='btn btn-warning' type='submit' value='PrintPreview'></a></td>";   
                echo "<td><a href='include/clear_old.php?clear=".$row["leave_id"]."'><input class='btn btn-danger' type='submit' value='กู้คืนใบลา'></a></td>";               
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
  
</body>
</html>






