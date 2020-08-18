<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UKK 2018 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  	
  </style>
</head>
<body class="hold-transition login-page" style=" background:url(application/img/eifel.jpg) no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<div class="login-box">
  <div class="login-logo">
   <b>LOGIN</b>
  </div>
  <!-- /.login-logo -->
  <?php session_start();
  include 'koneksi.php';
  if (isset($_POST['username']))
  {
	  $sql = "SELECT * FROM user WHERE USERNAME='".$_POST['username']."' AND PASSWORD='".$_POST['password']."'";
	  $query = mysqli_query($conn,$sql);
	  $data = mysqli_fetch_array($query);
	  $jum = mysqli_num_rows($query);
	  
	  if ($jum > 0)
	  {
		  if ($data['LEVEL'] == 'Admin')
		  {
			  $_SESSION['USERNAME'] = $data['USERNAME'];
		  	  $_SESSION['PASSWORD'] = $data['PASSWORD'];
			  $_SESSION['ID_USER'] = $data['ID_USER'];
			  $_SESSION['LEVEL'] = $data['LEVEL'];
			  $_SESSION['FULLNAME'] = $data['FULLNAME'];
			  header('Location:index.php');
		  }
		  
		  else
		  {
			  $_SESSION['USERNAME'] = $data['USERNAME'];
		  	  $_SESSION['PASSWORD'] = $data['PASSWORD'];
			  $_SESSION['ID_USER'] = $data['ID_USER'];
			  $_SESSION['LEVEL'] = $data['LEVEL'];
			  $_SESSION['FULLNAME'] = $data['FULLNAME'];
			  header('Location:index.php');
			  
		  }
	  }
	  elseif ($_POST['username'] == "" || $_POST['password'] == "")
	  {
		  echo '<div style="width:359px;" class="alert alert-danger container">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Username/Password Tidak Boleh kosong!
  </div>';
	  }
	  else
	  {
		   echo '<div style="width:359px;" class="alert alert-danger container">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Username Dan Password Salah!
  </div>';
	  }
  }
  
  ?>
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan login dulu </p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      
    </div>
    <!-- /.social-auth-links -->

    
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
