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
	
	$name = $_POST["name"];
	$affiliation = $_POST["affiliation"];
	$idline = $_POST["idline"];
	

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

	if (empty($name) or empty($affiliation) or empty($idline)) {
	?>

		<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบ!!!!!!!!!!');
		location = "../add_affiliation.php";
		</script>

	<?php 
	}
	else
	{
		
	?>
			
	<?php
			
		
		$strSQL = "INSERT INTO `personnel_affiliation`(`name_affiliation`, `affiliation`, `affiliation_sig`, `idline`) VALUES ('".$name."', '".$affiliation."', '".$newname."', '".$idline."')";
		
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