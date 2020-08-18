<?php
include 'koneksi.php';
$sql = mysqli_query($conn,"SELECT * FROM user");
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Daftar User
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
     
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th><center>ID USER</center></th>
                      <th><center>USERNAME</center></th>
                      <th><center>FULLNAME</center></th>
                      <th><center>LEVEL</center></th>
                      <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
                      <th><center>AKSI</center></th>
                      <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
					$no = 1;
					while($data=mysqli_fetch_array($sql))
					{
					?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['ID_USER'] ?></td>
                      <td><?php echo $data['USERNAME'] ?></td>
                      <td><?php echo $data['FULLNAME'] ?></td>
                      <td><?php echo $data['LEVEL'] ?></td>
                      <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
                      <td>
                      
                      <center>
                      <?php if ($data['LEVEL'] == 'Admin'){ ?>
                      	<button class="btn btn-warning">NO ACTION</button>
                      <?php }else{ ?>
                      	<a href="page-input-user.php?req=edit&ID_USER=<?php echo $data['ID_USER'] ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <a href="proses-user.php?req=dell&ID_USER=<?php echo $data['ID_USER'] ?>" onclick="return confirm('YAKIN INGIN DI HAPUS?');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        <?php } ?>
                       </center>
                       
                      </td>
                      <?php } ?>
                    </tr>
                    <?php 
						$no++; }
					?>
                </tbody>
              </table>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>