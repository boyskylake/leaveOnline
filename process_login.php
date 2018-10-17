<?php
	session_start();
	include 'include/conDB.php';
	$strSQL = "SELECT * FROM leave_personnel WHERE personnel_id = '".mysqli_real_escape_string($conn, $_POST['txtNumber'])."' 
	and personnel_password = '".mysqli_real_escape_string($conn, $_POST['txtPassword'])."'";
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["personnel_id"] = $objResult["personnel_id"];
			$_SESSION["personnel_status"] = $objResult["personnel_status"];
			session_write_close();
			
			if($objResult["personnel_status"] == "ADMIN")
			{
				header("location:admin/index_admin.php");
			}
			else if($objResult["personnel_status"] == "USER")
			{
				header("location:user/index.php");
			}
			else
			{
				header("location:PRINTER/index.php");
			}
	}
	mysqli_close($conn);
?>