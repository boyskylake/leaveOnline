<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<?php
// Line api sitting
    $accessToken ="mnGg9gl94iZOJgnQhlxbje2QgNiqQWmQ8wQnknE+D5RGgkz+0mGZ6OQxJbwLKOgV8NtacYLOWaDmp4YXUZDhh/z4f1q1dJfBHwJt0XCTrUFBQEbPM/AFJki0BtS0slQCYD9NjpLdJmRxn47QKEPvVAdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    // End Line api sitting
	
	  function pushMsg($arrayHeader,$arrayPostData){ 
		      $strUrl = "https://api.line.me/v2/bot/message/push";
		      $ch = curl_init();
		      curl_setopt($ch, CURLOPT_URL,$strUrl);
		      curl_setopt($ch, CURLOPT_HEADER, false);
		      curl_setopt($ch, CURLOPT_POST, true);
		      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
		      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
		      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		      $result = curl_exec($ch);
		      curl_close($ch);
		   }

	include 'conDB.php';

	$id = $_POST["id"];
	$name = $_POST["name"];
	$position = $_POST["position"];
	$degree = $_POST["degree"];
	$affiliation = $_POST["Affiliation"];
	$leavecollect = $_POST["leavecollect"];
	$leaveleft = $_POST["leaveleft"];
	$leaveall = $_POST["leaveall"];
	$leavedate = date("Y-m-d");  
	$leavesince = $_POST["leavesince"];
	$leaveat = $_POST["leaveat"];
	$commune = $_POST["commune"];
	$phone = $_POST["phone"];
	$status1 = 'รออนุญาติ';
	$status2 = 'รออนุญาติ';
	$new_old = 'new';

	$datetime1 = new DateTime($leavesince);
	$datetime2 = new DateTime($leaveat);
	$interval = $datetime1->diff($datetime2);
	$leave = $interval->format('%a');
	$leave1 = $leave + 1;

	if($leaveleft < $leave1){
		?>
		<script type='text/javascript'>alert('จำนวนวันลาของคุณไม่พอ!!!!!');
			location = "../form_insert.php";
			</script>
		<?php
	exit();
	}
	
	$strSQL = "INSERT INTO `leave_leavepreview`(`personnel_id`, `personnel_name`, `personnel_position`, `personnel_degree`, `personnel_Affiliation`, `personnel_leavecollect`, `personnel_leaveleft`, `personnel_leaveall`, `leave_date`, `personnel_leavesince`, `personnel_leaveat`, `personnel_commune`, `personnel_phone`, `leave_status1`, `leave_status2`, `leave_newOld`) VALUES ('".$id."', '".$name."', '".$position."', '".$degree."', '".$affiliation."', '".$leavecollect."', '".$leaveleft."', '".$leaveall."', '".$leavedate."', '".$leavesince."', '".$leaveat."', '".$commune."', '".$phone."', '".$status1."', '".$status2."', '".$new_old."')";
	$objQuery = mysqli_query($conn, $strSQL);
	$numleave = mysqli_insert_id($conn);
	
		if ($objQuery) {
			
			
			$sqlpf = "SELECT * FROM `personnel_affiliation` WHERE `affiliation` = '$affiliation'";
			$Querypf = mysqli_query($conn,$sqlpf);
			$facpf = mysqli_fetch_array($Querypf);;
	           
                $arrayPost['to'] = $facpf['idline'];
                $arrayPost['messages'][0]['type'] = "text";
                $arrayPost['messages'][0]['text'] = "คุณ ".$name."  ต้องการลาวันที่ ".$leavesince." ถึงวันที่ ".$leaveat." ".$leaveleft;
				pushMsg($arrayHeader,$arrayPost);
				
				
              $arrayPostData['to'] = $facpf['idline'];
		      $arrayPostData['messages'][0]['type'] = "template";
		      $arrayPostData['messages'][0]['altText'] = "this is a confirm template";
		      $arrayPostData['messages'][0]['template']['type'] = "confirm";
		      $arrayPostData['messages'][0]['template']['text'] = " คุณต้องการอนุญาติหรือไม่".$numleave;
		      $arrayPostData['messages'][0]['template']['actions'][0]['type'] = "message";
		      $arrayPostData['messages'][0]['template']['actions'][0]['label'] = "ใช่";
		      $arrayPostData['messages'][0]['template']['actions'][0]['text'] = "yes=".$numleave;
		      $arrayPostData['messages'][0]['template']['actions'][1]['type'] = "message";
		      $arrayPostData['messages'][0]['template']['actions'][1]['label'] = "ไม่";
		      $arrayPostData['messages'][0]['template']['actions'][1]['text'] = "no=".$numleave;
		      pushMsg($arrayHeader,$arrayPostData);
        
?>

		<script type='text/javascript'>alert('เพิ่มข้อมูลแล้ว');
		location = "../form_insert.php";
		</script>


	<?php
		mysqli_close($conn);
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
?>

<body>
	
</body>
</html>