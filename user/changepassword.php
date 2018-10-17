<?php
	include 'include/header.php';
	include '../include/bootstrap.php';
?>
<body>
  


	<div class="py-5 bg-defult text-dark" >
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<div class="panel panel-danger">
 						<div class="panel-heading">
    						<h2 class="panel-title">เปลี่ยนรหัสผ่าน</h2>
  						</div>
  		        <form name="frm" method="post" action="include/process_change.php">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">รหัสผ่านเดิม</label>
                    <input type="text" class="form-control" id="id" name="pass"> </div>
                </div>
              </div>
            
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">รหัสผ่านใหม่</label>
                    <input type="text" class="form-control" id="name" name="passnew"> </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="InputName">ยืนยันรหัสผ่าน</label>
                    <input type="text" class="form-control" id="name" name="conpassnew"> </div>
                </div>
              </div>
            
            <button type="submit" class="btn btn-warning">บันทึก</button>
        </form>
    							
					
			</div>
		</div>
	</div>
</body>