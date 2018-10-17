<?php 
  include 'include/header.php';
  include 'include/check_login.php';
  include '../include/bootstrap.php';
 ?>
  <div class="py-5 bg-info text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>ประวัติการลา</h1>
          
          <div class="row"> </div>
          <table class="table table-condensed">
            <thead>
              <tr>
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ลาวันที่</th>
                <th class="text-center">ถึงวันที่</th>
                <th class="text-center">สถานะ</th>
              </tr>
            </thead>
            
            
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
    include 'include/footer.php';
  ?>
</body>

</html>