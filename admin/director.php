<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>director</title>
</head>
<?php 
  include '../include/conDB.php';
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
  include 'include/nav.css';
  // $director = 'ผู้อำนวยการ';
  $sql = "SELECT * FROM `personnel_affiliation` WHERE `affiliation_position` = 'ผู้อำนวยการโรงพยาบาล'";
  $result = $conn->query($sql);
?>
<body>
  <div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
              <div class="row">
              <?php include 'include/nav_aff.php' ?>  
              <div class="col-md-9">
                <br><br><br><br><br><br>
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4>จัดการข้อมูล</h4></div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td ><h5><span class="label label-default">ลำดับ</span></h5></td>                     
                      <td ><h5><span class="label label-default">ชื่อ-สกุล</span></h5></td>
                      <td ><h5><span class="label label-default">สังกัด</span></h5></td>                     
                      <!-- <td class="text-center label-default" colspan="2">จัดการ</td> -->
                      <td class="text-center " colspan="2">จัดการ</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php  
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {

                          echo "<td>".$row["num"]."</td>";
                          echo "<td>".$row["name_affiliation"]."</td>";
                          echo "<td>".$row["affiliation"]."</td>";
                          
                          echo "<td><a href='update_affiliation.php?edit=".$row["num"]."'><input class='btn btn-warning' type='submit' value='แก้ไข'></a></td>";
                          echo "<td><a href='update_sigaff.php?edit_sig=".$row["num"]."'><input class='btn btn-warning' type='submit' value='ลายเซ็น'></a></td>";
                          echo "<td><a href='include/del_aff.php?delete=".$row["num"]."'><input class='btn btn-danger' type='submit' value='ลบ' ></a></td>";
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
  <br><br><br><br><br><br>
  <?php
      include 'include/footer.php';
   ?>
</body>
</html>