<?php 
	include 'Config.php';
	$result=mysqli_query($conn,"SELECT `number` FROM contact");
	$num_rows = mysqli_num_rows($result);
	// echo $num_rows;
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$idface = $_POST["idface"];
	// echo $fname;
	// echo $lname;
	// echo $idface;
	if ($num_rows<1) {
		$num = 1;
		$sql = "INSERT INTO contact (number, firstname, lastname, id_face) VALUES ('".$num."', '".$fname."', '".$lname."', '".$idface."')";
		# code...
	}
	else 
	{
		$num = $num_rows + 1;
	$sql = "INSERT INTO contact (number, firstname, lastname, id_face) VALUES ('".$num."', '".$fname."', '".$lname."', '".$idface."')";
	}
	if (mysqli_query($conn, $sql)) {
		?>

<!-- 
    $message = "New record created successfully"; -->
	<script type='text/javascript'>alert('New record created successfully');
	location = "../manage.php";
	</script>
<?php
	mysqli_close($conn);
	//header("location:../index.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
 ?>