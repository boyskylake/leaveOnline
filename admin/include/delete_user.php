<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>delete</title>
</head>
<?php
	session_start();
	include 'check_login.php';
	include 'conDB.php';

	$strSQL = "DELETE FROM `leave_personnel` WHERE `personnel_id` = '".$_GET['delete']."' ";

	$objQuery = mysqli_query($conn, $strSQL);
	if ($objQuery) {
	?>
	<script type='text/javascript'>alert('ลบเรียบร้อย!!!');
	location = "../index_admin.php";
	</script>


	<?php
		mysqli_close($conn);
		//header("location:../index.php");
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
?>
<body>
	
</body>
</html>