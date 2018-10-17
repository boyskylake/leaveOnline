<?php require_once('Connections/MyConnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['personnel_id'])) {
  $colname_Recordset1 = $_GET['personnel_id'];
}
mysql_select_db($database_MyConnect, $MyConnect);
$query_Recordset1 = sprintf("SELECT * FROM leave_personnel WHERE personnel_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php 
  include 'include/header.php';
  include 'include/check_login.php';
 ?>
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 >แก้ไขข้อมูลสมาชิก</h1>
          <form >
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" class="form-control" id="InputID" name="InputID" placeholder="กรุณากรอก รหัสพนักงาน" value="<?php echo $row_Recordset1['personnel_id']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="InputName" name="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" value="<?php echo $row_Recordset1['personnel_name']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="InputPosition" name="InputPosition" value="<?php echo $row_Recordset1['personnel_position']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="InputDegree" name="InputDegree" value="<?php echo $row_Recordset1['personnel_degree']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="InputAffiliation" name="InputAffiliation" value="<?php echo $row_Recordset1['personnel_Affiliation']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveCollect" name="InputLeaveCollect" value="<?php echo $row_Recordset1['personnel_leavecollect']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveleft" name="InputLeaveleft" value="<?php echo $row_Recordset1['personnel_leaveleft']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveall" name="InputLeaveall" value="<?php echo $row_Recordset1['personnel_leaveall']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" id="status" name="status">
                <option>ADMIN</option>
                <option>USER</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="text" class="form-control" id="InputPassword" name="InputPassword" placeholder="กรุณากรอก รหัสผ่าน" value="<?php echo $row_Recordset1['personnel_password']; ?>"> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button>
            <p>
              <input name="personnel_id" type="hidden" id="personnel_id" value="<?php echo $row_Recordset1['personnel_id']; ?>">
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <?php include 'include/footer.php' ?>


<?php
mysql_free_result($Recordset1);
?>
