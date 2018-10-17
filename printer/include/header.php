<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md navbar-dark bg-primary" >
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h5>หน้าแรก</h5>
      </a>
      <a class="navbar-brand" href="history_leave.php">
      <h6>ใบลาเก่า</h6>
      </a>
      
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Contacts</a>
          </li>
        </ul>
        <?php
       session_start();
           if(isset($_SESSION['personnel_status'])): ?>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" onClick="return confirm('ต้องการออกจากระบบหรือไม่')" href="logout.php">
          <i class="fa d-inline fa-lg fa-user-circle-o" ></i> ออกจากระบบ</a>
          <?php else: ?>
        <a class="btn navbar-btn ml-2 text-white btn-primary" href=".../form_login.php">
            <i class="fa d-inline fa-lg fa-user-circle-o"></i> เข้าสู่ระบบ</a>
            <?php endif; ?>
      </div>
    </div>
  </nav>