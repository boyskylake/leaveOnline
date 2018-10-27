<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php
  include '../include/bootstrap.php';
?>

<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><i class="fa fa-fw fa-home"></i>หน้าหลัก</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="form_insert.php"><i class="fa fa-fw fa-user"></i>กรอกใบลา<span class="sr-only">(current)</span></a></li>
        <li><a href="form_history.php">ประวัติการลา</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php
       session_start();
           if(isset($_SESSION['personnel_status'])): ?>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" onClick="return confirm('ต้องการออกจากระบบหรือไม่')" href="logout.php">
          <input class='btn btn-secondary' type='submit' value='ออกจากระบบ'></a>
          <?php else: ?>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="../Login/index.php">
            <input class='btn btn-secondary' type='submit' value='เข้าสู่ระบบ'></a>
            <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>