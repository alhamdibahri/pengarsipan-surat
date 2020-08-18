<?php
include 'koneksi.php';
if (isset($_GET['req']) && $_GET['req'] == 'edit')
{
	$idmail = $_GET['ID_MAIL'];
	$sql = mysqli_query($conn,'SELECT * FROM mail WHERE ID_MAIL="'.$idmail.'" AND ID_MTY="MTY002"');
	$data = mysqli_fetch_array($sql);
	$incoming_at = $data['INCOMING_AT'];
	$mail_code = $data['MAIL_CODE'];
	$mail_date = $data['MAIL_DATE'];
	$mail_from	= $data['MAIL_FROM'];
	$mail_to = $data['MAIL_TO'];
	$mail_subject = $data['MAIL_SUBJECT'];
	$description = $data['DESKRIPSI'];
	$hasilkode = $data['ID_MAIL'];
}
elseif (isset($_GET['req']) && $_GET['req'] == 'add')
{
	$carikode = mysqli_query($conn,"select max(ID_MAIL) from mail WHERE ID_MTY='MTY002'");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "SK".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
	$_SESSION['ID_MAIL'] = $hasilkode;
	$label = '';
	$incoming_at = '';
	$mail_code = '';
	$mail_date = '';
	$mail_from	= '';
	$mail_to = '';
	$mail_subject = '';
	$description = '';
	
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Tambah Surat Keluar</h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-plus"></i> Tambah Data Surat Keluar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="proses-surat-keluar.php" enctype="multipart/form-data">
              <input type="hidden" class="form-control" id="exampleInputEmail1" name="req" value="<?php echo $_GET['req'] ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID MAIL</label>
                   		<?php //echo $label ?>
						<input type="text" name="id_mail" value="<?php echo $hasilkode ?>" class="form-control" id="exampleInputEmail1" placeholder="ID MAIL" required="">
                    </div>
					<div class="form-group">
						<label for="exampleInputPassword1">TANGGAL PENGIRIMAN</label>
						<input type="date" name="tgl_terima" value="<?php echo $incoming_at ?>" class="form-control" id="exampleInputPassword1" placeholder="TANGGAL TERIMA" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">NOMOR SURAT</label>
						<input type="text" name="no_surat" value="<?php echo $mail_code ?>" class="form-control" id="exampleInputPassword1" placeholder="NOMOR SURAT" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">TANGGAL SURAT</label>
						<input type="date" name="tgl_surat" value="<?php echo $mail_date ?>" class="form-control" id="exampleInputPassword1" placeholder="TANGGAL SURAT" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">MAIL FROM</label>
						<input type="text" name="from" class="form-control" value="<?php echo $mail_from ?>" id="exampleInputPassword1" placeholder="MAIL FROM" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">MAIL TO</label>
						<input type="text" name="to" class="form-control" value="<?php echo $mail_to ?>" id="exampleInputPassword1" placeholder="MAIL TO" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">MAIL SUBJECT</label>
						<input type="text" name="subject" value="<?php echo $mail_subject ?>" class="form-control" id="exampleInputPassword1" placeholder="MAIL SUBJECT" required="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">DESCRIPTION</label>
                      <textarea name="deskripsi" placeholder="DESKRIPSI SURAT" class="form-control" id="exampleInputPassword1" required=""><?php echo $description ?></textarea>
            		</div>
                    <?php if (isset($_GET['req']) && $_GET['req'] == 'edit'){ ?>
                    <div class="form-group">
                        <label for="exampleInputFile">Nama File</label>
                        <br />
                       <?php echo $data['FILE_UPLOAD'] ?>
                  	</div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputFile">
                        <?php if (isset($_GET['req']) && $_GET['req'] == 'add'){  ?>
                        	Upload File
                        <?php } else { ?>
							Ubah File
					 	<?php }?>
                        </label>
                        <input type="file" id="file" name="file">
                  	</div>
					<button type="submit" class="btn btn-info">Submit</button>
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