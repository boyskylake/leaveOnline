<?php
	include '../include/conDB.php';

	

	$id = $_POST["InputID"];
	$name = $_POST["InputName"];
	$position = $_POST["InputPosition"];
	$degree = $_POST["InputDegree"];
	$affiliation = $_POST["InputAffiliation"];
	$leaveCollect = $_POST["InputLeaveCollect"];
	$leaveleft = $_POST["InputLeaveleft"];
	$leaveall = $_POST["InputLeaveall"];
	$status = $_POST["status"];
	
									

		$strSQL = "UPDATE `leave_personnel` SET `personnel_name`= '".$name."', `personnel_position`= '".$position."', `personnel_degree`= '".$degree."', `personnel_Affiliation`= '".$affiliation."', `personnel_leavecollect`= '".$leaveCollect."', `personnel_leaveleft`= '".$leaveleft."', `personnel_leaveall`= '".$leaveall."', `personnel_status`= '".$status."' WHERE `personnel_id`= '".$id."' " ;
					
				$objQuery = mysqli_query($conn, $strSQL);

			if ($objQuery) {
		?>
			<script type='text/javascript'>alert('แก้ไขสำเร็จ');
			location = "../index_admin.php";
			</script>
		<?php
				mysqli_close($conn);
				} 
				else 
				{
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			
		?>