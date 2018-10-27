<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>add-affiliation</title>
  <meta charset="UTF-8">
</head>
<?php
	include 'include/nav.css';
	include 'include/header.php';
  	include 'include/check_login.php'; 
  	include 'include/conDB.php';
?>

<body>

	<div class="py-5 bg-defult text-dark" >
    <div class="container">
      <div class="row">
      	<?php include 'include/nav_aff.php' ?> 
        <div class="col-md-9">
		<br><br><br><br><br>
			<div class="panel panel-danger">
            	<div class="panel-heading"><h4>เพิ่มสังกัด</h4></div>
          			<form name="frm" method="post" action="include/save_aff.php" enctype="multipart/form-data">
               <br><div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="InputName">ชื่อ-สกุล หัวหน้าสังกัด</label>
                      <input type="text" name="name" class="form-control" id="InputID" placeholder="กรุณากรอก รหัสพนักงาน" required> </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="InputName">ชื่อสังกัด</label>
                      <input type="text" name="affiliation" class="form-control" id="InputName" placeholder="กรุณากรอก ชื่อ-สกุล" required> </div>
                  </div>
              </div> 
              <div class="form-group">
                          <div class="row">
                          <div class="col-md-5">
                              <label for="InputName">ลายเซ็น</label>
                              <input type="file" required class="form-control" name="image" accept="image/png, image/jpeg, image/gif " >
                          </div>
                      </div>       
            	<br><div class="form-group">
              		<div class="row">
                		<div class="col-md-6">
                  		<label for="InputName">ไอดีไลน์</label>
                  <input type="text" name="idline" class="form-control" placeholder="กรุณากรอก รหัสผ่าน" required> </div>
              </div>
            </div>
            
            <button type="submit" class="btn btn-warning">บันทึก</button><br><br>
          </form>
          
         </div>
       </div> 
	<br><br><br><br>
</body>
</html>