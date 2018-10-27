<?php
	include '../include/conDB.php';

	
	$num = $_POST["num"]; 
	$name = $_POST["name"];
	$affiliation = $_POST["affiliation"];
	$idline = $_POST["idline"];
	
	
	

 if (empty($name) or empty($affiliation) or empty($idline)) {
 ?>

	<script type='text/javascript'>alert('กรุณา ใส่ข้อมูลให้ครบด้วย!!!!!!!!!!');
	location = "../affiliation.php";
 	</script>

	<?php 
		}
		else
		{
			
	?>
			
		<?php
					
				
						$strSQL = "UPDATE `personnel_affiliation` SET `name_affiliation`= '".$name."', `affiliation`= '".$affiliation."', `idline`= '".$idline."' WHERE `num`= '".$num."' " ;
					
						$objQuery = mysqli_query($conn, $strSQL);

					if ($objQuery) {
		?>
			<script type='text/javascript'>alert('แก้ไขสำเร็จ');
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