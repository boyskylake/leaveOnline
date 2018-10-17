<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MyConnectleave = "localhost";
$database_MyConnectleave = "dbleaveonline";
$username_MyConnectleave = "root";
$password_MyConnectleave = "12345678";
$MyConnectleave = mysql_pconnect($hostname_MyConnectleave, $username_MyConnectleave, $password_MyConnectleave) or trigger_error(mysql_error(),E_USER_ERROR); 
?>