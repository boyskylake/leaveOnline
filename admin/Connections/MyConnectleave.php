<?php
date_default_timezone_set("Asia/Bangkok");

$hostname_MyConnectleave = "localhost";
$database_MyConnectleave = "dbleaveonline";
$username_MyConnectleave = "root";
$password_MyConnectleave = "";
$MyConnectleave = mysql_pconnect($hostname_MyConnectleave, $username_MyConnectleave, $password_MyConnectleave) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");

?>