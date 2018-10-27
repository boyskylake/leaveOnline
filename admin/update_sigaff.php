<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>update_sig-aff</title>
  <meta charset="UTF-8">
</head>
<?php
	include 'include/nav.css';
	include 'include/header.php';
  include 'include/check_login.php'; 
  include 'include/conDB.php';

  $num = $_GET["edit_sig"];
  $sql = "SELECT * FROM personnel_affiliation WHERE num ='".$num."' ";
  $result = $conn->query($sql);
  $objResult = mysqli_fetch_assoc($result);
  if(!$objResult)
  {
    echo "Not found num=".$num;
  }
  else
  {
?>

<body>

	<div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
      	
        <div class="col-md-9">
		<br><br><br><br><br>
			<div class="panel panel-danger">
            	<div class="panel-heading"><h4>เพิ่มสังกัด</h4></div>
          			<form name="frm" method="post" action="include/edit_sigaff.php" enctype="multipart/form-data">
               <br><div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="InputName"></label>
                      <input type="text" name="num" class="form-control" id="InputID" value="<?php echo $num ?>" placeholder="กรุณากรอก รหัสพนักงาน" required> </div>
                  </div>
                </div>
              <div class="form-group">
                          <div class="row">
                          <div class="col-md-5">
                              <label for="InputName">ลายเซ็น</label>
                              <input type="file" required class="form-control" name="image" accept="image/png, image/jpeg, image/gif " >
                          </div>
                      </div>       
            	
            
            <button type="submit" class="btn btn-warning">บันทึก</button><br><br>
          </form>
          
         </div>
       </div> 
	<br><br><br><br>
</body>
<?php
  }
   mysqli_close($conn);
?>
</html>