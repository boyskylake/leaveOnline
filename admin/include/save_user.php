<meta charset="UTF-8" />
<?php
	session_start();
	include 'check_login.php';
	include 'conDB.php';



	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	$id = $_POST["id"];
	$name = $_POST["name"];
	$position = $_POST["position"];
	$degree = $_POST["degree"];
	$affiliation = $_POST["affiliation"];
	$leavecollect = $_POST["leavecollect"];
	$leaveleft = $_POST["leaveleft"];
	$leaveall = $_POST["leaveall"];
	$status = $_POST["status"];

	$image = (isset($_POST['image']) ? $_POST['image'] : '');

	$upload=$_FILES['image'];
	if($upload <> '')  {

	$path="../image/";
	$type = strrchr($_FILES['image']['name'],".");
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;

	//คัดลอกไฟล์ไปยังโฟลเดอร์
	@move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);
}
	$password = $_POST["password"];
	$conpassword = $_POST["conpassword"];

	if (empty($id) or empty($name) or empty($position) or empty($degree) or empty($affiliation) or empty($leavecollect) or empty($leaveleft) or empty($leaveall) or empty($status) or empty($upload) or empty($password) or empty($conpassword)) {
	?>

		<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบ!!!!!!!!!!');
		location = "../add_admin.php";
		</script>

	<?php 
	}
	else
	{
		if($password != $conpassword)
		{
	?>
			<script type='text/javascript'>alert('กรุณา ใส่รหัสผ่านให้ตรงกัน!!!!!!!!!!');
			location = "../add_admin.php";
			</script>
	<?php
			exit();
		}
		$strSQL = "INSERT INTO `leave_personnel`(`personnel_id`, `personnel_name`, `personnel_position`, `personnel_degree`, `personnel_Affiliation`, `personnel_leavecollect`, `personnel_leaveleft`, `personnel_leaveall`, `personnel_password`, `personnel_status`, `personnel_signature`) VALUES ('".$id."', '".$name."', '".$position."', '".$degree."', '".$affiliation."', '".$leavecollect."', '".$leaveleft."', '".$leaveall."', '".$password."', '".$status."', '".$newname."')";
		
		$objQuery = mysqli_query($conn, $strSQL);
		if ($objQuery) {
?>

		<script type='text/javascript'>alert('เพิ่มข้อมูลแล้ว');
		location = "../index_admin.php";
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