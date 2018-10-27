<?php
	session_start();
	$id = $_SESSION["personnel_id"];

	include 'conDB.php';

	$sql = "SELECT * FROM leave_personnel WHERE personnel_id ='".$id."' ";
	$result = $conn->query($sql);
	$objResult = mysqli_fetch_assoc($result);

	$passDB = $objResult['personnel_password'];
	$pass = $_POST["pass"];
	$passnew = $_POST["passnew"];
	$conpassnew = $_POST["conpassnew"];
	if (empty($pass) or empty($passnew) or empty($conpassnew)) {
?>

	<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบด้วย!!!!!!!!!!');
	location = "../index_admin.php";
	</script>

	<?php 
		}
		else
		{
			if($passnew != $conpassnew)
			{
	?>
			<script type='text/javascript'>alert('กรุณา ใส่รหัสผ่านให้ตรงกันด้วย!!!!!');
			location = "../changepassword.php";
			</script>
		<?php
					exit();
			}
			if($passDB != $pass){
				?>
			<script type='text/javascript'>alert('กรุณา ใส่รหัสผ่านให้ถูกต้อง!!!!!');
			location = "../changepassword.php";
			</script>
		<?php
					exit();
			}


						$strSQL = "UPDATE `leave_personnel` SET `personnel_password`= '".$passnew."' WHERE `personnel_id`= '".$id."' " ;

						$objQuery = mysqli_query($conn, $strSQL);

					if ($objQuery) {
		?>
			<script type='text/javascript'>alert('แก้ไขสำเร็จ');
			location = "../changepassword.php";
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

?>


