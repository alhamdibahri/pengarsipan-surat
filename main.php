<?php 
	include 'koneksi.php';
	$sql_masuk=mysqli_query($conn,"select * from mail where ID_MTY='MTY001'");
	$jum_masuk = mysqli_num_rows($sql_masuk);
	
	$sql_keluar=mysqli_query($conn,"select * from mail where ID_MTY='MTY002'");
	$jum_keluar = mysqli_num_rows($sql_keluar);
	
	$sql_user=mysqli_query($conn,"select * from user WHERE LEVEL='Operator'");
	$jum_user = mysqli_num_rows($sql_user);
	
	$sql_dis=mysqli_query($conn,"select * from disposition");
	$jum_dis = mysqli_num_rows($sql_dis);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang <strong><?php echo $_SESSION['FULLNAME'] ?></strong> Anda Login Sebagai <strong style="font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION['LEVEL'] ?></strong></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jum_masuk ?></h3>

              <p>Surat Masuk</p>
            </div>
            <div class="icon">
               <i class="fa fa-indent" aria-hidden="true"></i>
            </div>
            <a href="page-data-surat-masuk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jum_keluar ?></h3>

              <p>Surat Keluar</p>
            </div>
            <div class="icon">
               <i class="fa fa-outdent" aria-hidden="true"></i>
            </div>
            <a href="page-data-surat-keluar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jum_user ?></h3>

              <p>Operator</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="page-data-user.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jum_dis ?></h3>

              <p>Disposisi</p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
            <a href="page-disposisi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>