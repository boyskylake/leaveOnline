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
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index_admin.php">
        <h3>หน้าแรก</h3>
      </a>
      <a class="navbar-brand" href="add_admin.php">
        <h5>เพิ่มสมาชิก</h5>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Contacts</a>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign Out</a>
      </div>
    </div>
  </nav>
  <div class="py-5 text-white bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 >แก้ไขข้อมูลสมาชิก</h1>
          <p >&nbsp;</p>
          <form name="form1" method="post" action="">
          <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" class="form-control" id="InputID" placeholder="กรุณากรอก รหัสพนักงาน" value="<?php echo $row_Recordset1['personnel_id']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" value="<?php echo $row_Recordset1['personnel_name']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="InputPosition" value="<?php echo $row_Recordset1['personnel_position']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="InputDegree" value="<?php echo $row_Recordset1['personnel_degree']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="InputAffiliation" value="<?php echo $row_Recordset1['personnel_Affiliation']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveCollect" value="<?php echo $row_Recordset1['personnel_leavecollect']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveleft" value="<?php echo $row_Recordset1['personnel_leaveleft']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveall" value="<?php echo $row_Recordset1['personnel_leaveall']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="text" class="form-control" id="InputPassword" placeholder="กรุณากรอก รหัสผ่าน" value="<?php echo $row_Recordset1['personnel_password']; ?>"> </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning">บันทึก</button>
            <p>
              <input name="personnel_id" type="hidden" id="personnel_id" value="<?php echo $row_Recordset1['personnel_id']; ?>">
            </p>
            <p>&nbsp;</p>
          </form>
          <p >&nbsp;</p>
          <form>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสพนักงาน</label>
                  <input type="text" class="form-control" id="InputID" placeholder="กรุณากรอก รหัสพนักงาน" value="<?php echo $row_Recordset1['personnel_id']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" value="<?php echo $row_Recordset1['personnel_name']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">ตำแหน่ง</label>
                  <input type="text" class="form-control" id="InputPosition" value="<?php echo $row_Recordset1['personnel_position']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">ระดับ</label>
                  <input type="text" class="form-control" id="InputDegree" value="<?php echo $row_Recordset1['personnel_degree']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">สังกัด</label>
                  <input type="text" class="form-control" id="InputAffiliation" value="<?php echo $row_Recordset1['personnel_Affiliation']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="InputName">มีเวลาพักผ่อนสะสม(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveCollect" value="<?php echo $row_Recordset1['personnel_leavecollect']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">มีสิทธิลาพักผ่อนประจำปีนี้อีก(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveleft" value="<?php echo $row_Recordset1['personnel_leaveleft']; ?>"> </div>
                <div class="col-md-3">
                  <label for="InputName">รวมเป็น(วัน)</label>
                  <input type="text" class="form-control" id="InputLeaveall" value="<?php echo $row_Recordset1['personnel_leaveall']; ?>"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="InputName">รหัสผ่าน</label>
                  <input type="text" class="form-control" id="InputPassword" placeholder="กรุณากรอก รหัสผ่าน" value="<?php echo $row_Recordset1['personnel_password']; ?>"> </div>
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
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Sign up to our newsletter for the latest news</p>
          <form class="form-inline">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your e-mail here"> </div>
            <button type="submit" class="btn btn-primary ml-3">Subscribe</button>
          </form>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="_blank">
            <i class="fa fa-fw fa-facebook fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="_blank">
            <i class="fa fa-fw fa-twitter fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="_blank">
            <i class="fa fa-fw fa-instagram text-white fa-3x"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2017 Pingendo - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"> </pingendo>
</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
