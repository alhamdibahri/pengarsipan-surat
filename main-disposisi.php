<?php
include 'koneksi.php';
$sql = mysqli_query($conn,"SELECT * FROM mail WHERE ID_MTY='MTY001'");
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Daftar Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
     
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Surat Masuk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th><center>TANGGAL TERIMA</center></th>
                      <th><center>NO SURAT</center></th>
                      <th><center>TANGGAL SURAT</center></th>
                      <th><center>SUBJECT</center></th>
                      <th><center>PERIHAL</center></th>
                      <th><center>AKSI</center></th>
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
                      <td><?php echo $data['INCOMING_AT'] ?></td>
                      <td><?php echo $data['MAIL_CODE'] ?></td>
                      <td><?php echo $data['MAIL_DATE'] ?></td>
                      <td><?php echo $data['MAIL_SUBJECT'] ?></td>
                      <td><?php echo $data['DESKRIPSI'] ?></td>
                      <td>
                      <center>
                      <?php if ($data['STATUS'] == '0'){ ?>
                      	<a href="page-form-disposisi.php?ID_MAIL=<?php echo $data['ID_MAIL'] ?>" class="btn btn-info"><i class="fa fa-edit"></i> Disposisi</a>
                        <?php }else { ?>
                        <a href="print-disposisi.php?ID_MAIL=<?php echo $data['ID_MAIL'] ?>" class="btn btn-success"><i class="ion-android-print"></i> Print</a>
                        <?php }  ?>
                       </center>
                      </td>
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