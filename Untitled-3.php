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
    <meta charset="utf-8"/>
    <title>Print Preview Popup</title>
    <link href="style.css" rel="stylesheet" media="screen"/>
    <link href="print.css" rel="stylesheet" media="print"/>
    <link href="print-preview.css" rel="stylesheet"/>
</head>
<body>
    
     <div class="container">
        <div class="pp-row">
            <div class="pp-col m8">
            
              <h2 align="center">ใบลาพักผ่อน</h2>
              
                <p>Lorem ipsum dolorsit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
                <h2>Labore et dolore magna</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h2>Pellentesque habitant morbi</h2>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>

            </div>
            <div class="pp-col m4 sidebar">
                <a href="#" class="print-preview">Print Preview</a>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <div id="nav">
                    <h2>Consectetur adipisicing</h2>
                    <ul>
                        <li><a href="http://designfestival.com">Lorem</a></li>
                        <li><a href="http://designfestival.com">Ipsum dollar</a></li>
                        <li><a href="http://designfestival.com">Sit amet consectetur</a></li>
                        <li><a href="http://designfestival.com">Sed do eiusmod</a></li>
                        <li><a href="http://designfestival.com">Tempor incididunt</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p id="footer">Copyright &copy; 2018 Code Tube</p>
    </div>

<script src="jquery.tools.js"></script>
<script src="jquery.print-preview.js"></script>
<script>
    $(function(){
        $('a.print-preview').printPreview();
        
        
    })
    </script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
