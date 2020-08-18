<?php
include 'koneksi.php';
if (isset($_GET['req']) && $_GET['req'] == 'edit')
{
	$iduser = $_GET['ID_USER'];
	$sql = mysqli_query($conn,"SELECT * FROM user WHERE ID_USER='".$iduser."'");
	$data = mysqli_fetch_array($sql);
	$hasilkode = $data['ID_USER'];
	$username = $data['USERNAME'];
	$password = $data['PASSWORD'];
	$fullname = $data['FULLNAME'];
	$level = $data['LEVEL'];
	
}
elseif (isset($_GET['req']) && $_GET['req'] == 'add')
{
	$carikode = mysqli_query($conn,"select max(ID_USER) from user");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "USR".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
	$id ='';
	$username = '';
	$password = '';
	$fullname = '';
	$level = '';
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Tambah User
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-plus"></i> Tambah Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="proses-user.php" enctype="multipart/form-data">
              <input type="hidden" class="form-control" id="exampleInputEmail1" name="req" value="<?php echo $_GET['req'] ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id User</label>
                  <input name="id_user" type="text" value="<?php echo $hasilkode ?>" class="form-control" id="exampleInputEmail1" placeholder="Id 				User" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input name="username" type="text" value="<?php echo $username ?>" class="form-control" id="exampleInputPassword1" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" type="password" value="<?php echo $password ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fullname</label>
                  <input name="fullname" type="text" value="<?php echo $fullname ?>" class="form-control" id="exampleInputEmail1" placeholder="Fullname" />
                  
                </div>
                <?php if (isset($_GET['req']) && $_GET['req'] == 'edit'){ ?>
                    <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <br />
                       <img src="application/img/<?php echo $data['PHOTO'] ?>" width="100px" height="100px" />
                  	</div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputFile">
                        <?php if (isset($_GET['req']) && $_GET['req'] == 'add'){  ?>
                        	Upload Photo
                        <?php } else { ?>
							Ubah Photo
					 	<?php }?>
                        </label>
                        <input type="file" id="file" name="file">
                  	</div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          		<!-- /.box -->
        	</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>