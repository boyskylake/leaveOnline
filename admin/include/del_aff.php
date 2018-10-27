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

	$strSQL = "DELETE FROM `personnel_affiliation` WHERE `num` = '".$_GET['delete']."' ";

	$objQuery = mysqli_query($conn, $strSQL);
	if ($objQuery) {
	?>
	<script type='text/javascript'>alert('DELETE successfully');
	location = "../affiliation.php";
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