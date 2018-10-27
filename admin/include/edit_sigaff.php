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
	
	
	
	$num = $_POST["num"]; 
	$image = (isset($_POST['image']) ? $_POST['image'] : '');

	$upload=$_FILES['image'];
	if($upload <> '')  {

	$path="../../printer/image/sig/";
	$type = strrchr($_FILES['image']['name'],".");
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;

	//คัดลอกไฟล์ไปยังโฟลเดอร์
	@move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);
	}
	$password = $_POST["password"];
	$conpassword = $_POST["conpassword"];

	if (empty($newname)) {
	?>

		<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบ!!!!!!!!!!');
		location = "../affiliation.php";
		</script>

	<?php 
	}
	else
	{
		
	?>
			
	<?php
			
		
		$strSQL = "UPDATE `personnel_affiliation` SET `affiliation_sig`= '".$newname."' WHERE `num`= '".$num."' " ;
		
		$objQuery = mysqli_query($conn, $strSQL);
		if ($objQuery) {
?>

		<script type='text/javascript'>alert('เพิ่มข้อมูลแล้ว');
		location = "../affiliation.php";
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