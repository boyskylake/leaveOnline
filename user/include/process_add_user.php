<?php
	session_start();
	include 'check_login.php';
	include '../conDB.php';
	//$name = $_POST["Name"];
	//$user = $_POST["txtName"];
	//$txtPassword = $_POST["txtPassword"];
	//$txtConPassword = $_POST["txtConPassword"];
	//$status = $_POST["status"];
	if (empty($name) or empty($name) or empty($txtPassword) or empty($txtConPassword)) {
	?>
		<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบ!!!!!!!!!!');
	location = "../add_user.php";
	</script>

	<?php 
	}
	else
	{
		if($txtPassword != $txtConPassword)
		{
	?>
			<script type='text/javascript'>alert('กรุณา ใส่รหัสผ่านให้ตรงกัน!!!!!!!!!!');
			location = "../add_user.php";
			</script>
	<?php
			exit();
		}
		$strSQL = "INSERT INTO `member`(`Username`, `Password`, `Name`, `Status`) VALUES ('".$user."', '".$txtPassword."', '".$name."', '".$status."')";
		$objQuery = mysqli_query($conn, $strSQL);
		if ($objQuery) {
?>

	<script type='text/javascript'>alert('Add successfully');
	location = "../add_user.php";
	</script>


	<?php
		mysqli_close($conn);
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
?>