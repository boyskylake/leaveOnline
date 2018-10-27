<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>delete</title>
</head>
<?php
	include 'conDB.php';

	
	$strSQL = "UPDATE `leave_leavepreview` SET `leave_newOld`= 'new' WHERE `leave_id`= '".$_GET['clear']."' ";

	$objQuery = mysqli_query($conn, $strSQL);
	if ($objQuery) {
	?>
	<script type='text/javascript'>alert('กู้คืนใบลาแล้ว');
	location = "../leave_old.php";
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