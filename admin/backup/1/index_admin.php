<?php require_once('Connections/MyConnectleave.php');
 ?>
 
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

if ((isset($_POST['personnel_id'])) && ($_POST['personnel_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM leave_personnel WHERE personnel_id=%s",
                       GetSQLValueString($_POST['personnel_id'], "int"));

  mysql_select_db($database_MyConnectleave, $MyConnectleave);
  $Result1 = mysql_query($deleteSQL, $MyConnectleave) or die(mysql_error());

  $deleteGoTo = "index_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_MyConnectleave, $MyConnectleave);
$query_Recordset1 = "SELECT * FROM leave_personnel";
$Recordset1 = mysql_query($query_Recordset1, $MyConnectleave) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
	
  <?php 
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
 ?>
 <form>
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <div class="row">
        <div class="col_md-4">

            <!-- <div class="panel panel-primary">
              <div class="panel-heading"><h4>ผู้ใช้</h4></div>
              <div class="panel-body">บุคลากร</div>
              <div class="panel-body">แอดมิน</div>
              <div class="panel-body">พนักงานปริ้น</div>
            </div>  -->
          
        </div>
        <div class="col-md-8">
          

         
<table class="table table-condensed">
  <tr>
    <td ><h5><span class="label label-default">รหัสพนักงาน</span></h5></td>
    <td ><h5><span class="label label-default">ชื่อ-สกุล</span></h5></td>
    <td ><h5><span class="label label-default">สถานะ</span></h5></td>
    <td class="text-center label-default" colspan="2">จัดการ</td>
  </tr>
  <?php do { ?>
    <br>
    <tr>
      
      <td><?php echo $row_Recordset1['personnel_id']; ?></td>
      <td><?php echo $row_Recordset1['personnel_name']; ?></td>
      <td><?php echo $row_Recordset1['personnel_status']; ?></td>
      <?php echo "<td><a href='form_updateAdmin.php?edit=".$row["personnel_id"]."'><input class='btn btn-secondary' type='submit' value='แก้ไข'></a></td>"; ?>
      <td><form name="form2" method="post" action="">
        <input  type="submit" name="btn_del" id="btn_del" class="btn btn-danger" value="ลบ" onclick="return confirm('ต้องการลบหรือไม่')">
        <input name="personnel_id" type="hidden" id="personnel_id" value="<?php echo $row_Recordset1['personnel_id']; ?>">

      </form></td>

    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            </table>
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
      
    </div>
  </div>
</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
