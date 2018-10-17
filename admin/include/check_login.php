<?php 
  include '../include/conDB.php';
  if($_SESSION['personnel_id'] == "")
  {
    echo "<br><br><h2 align='center'>กรุณาล็อกอิน!</h2>";
    exit();
  }
  if($_SESSION['personnel_status'] != "ADMIN")
  {
    echo "This page for Admin only!";
    exit();
  } 
  
  $strSQL = "SELECT * FROM leave_personnel WHERE personnel_id = '".$_SESSION['personnel_id']."' ";
  $objQuery = mysqli_query($conn, $strSQL);
  $objResult = mysqli_fetch_array($objQuery); ?>
  