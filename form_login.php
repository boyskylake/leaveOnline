<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary" >
    <div class="container">
      <a class="navbar-brand" href="http://www.sskhospital.net/" >
        <b> โรงพยาบาลศรีสงคราม</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card p-5 text-white bg-secondary">
            <div class="card-body">
              <h1 class="mb-4">ล็อกอิน</h1>
              <form action="process_login.php" method="POST">
                <div class="form-group">
                  <label>หมายเลขประจำตัว</label>
                  <input type="text" class="form-control" placeholder="กรุณากรอกหมายเลขประจำตัว" name="txtNumber" id="personnel_id"> </div>
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  <input type="password" class="form-control" placeholder="กรุณากรอกรหัสผ่าน" name="txtPassword" id="personnel_password"> </div>
                <button type="submit" class="btn btn-light">ล็อกอิน</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>