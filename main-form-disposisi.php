<?php
include 'koneksi.php';
	$idmail = $_GET['ID_MAIL'];
	$sql = mysqli_query($conn,'SELECT * FROM mail WHERE ID_MAIL="'.$idmail.'" AND ID_MTY="MTY001"');
	$data = mysqli_fetch_array($sql);
	$incoming_at = $data['INCOMING_AT'];
	$mail_code = $data['MAIL_CODE'];
	$mail_date = $data['MAIL_DATE'];
	$mail_from	= $data['MAIL_FROM'];
	$mail_to = $data['MAIL_TO'];
	$mail_subject = $data['MAIL_SUBJECT'];
	$description = $data['DESKRIPSI'];
	$hasilkode = $data['ID_MAIL'];
	
	$carikode = mysqli_query($conn,"select max(ID_DISPO) from disposition");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "DIS".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Disposisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-plus"></i>Halaman Disposisi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="proses-disposisi.php" enctype="multipart/form-data">
              <input type="hidden" class="form-control" id="exampleInputEmail1" name="req" value="<?php echo $_GET['req'] ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID DISPOSISI</label>
                   		<?php //echo $label ?>
						<input type="text" name="id_dispo" value="<?php echo $hasilkode ?>" class="form-control" id="exampleInputEmail1" placeholder="ID DISPOSISI" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">ID MAIL</label>
						<input type="text" name="idmail" class="form-control" value="<?php echo $data['ID_MAIL'] ?>" id="exampleInputPassword1" placeholder="ID MAIL" required="">
                    </div>
					<div class="form-group">
						<label for="exampleInputPassword1">SURAT DARI</label>
						<input type="text" name="surat_dari" value="<?php echo $mail_from ?>" class="form-control" id="exampleInputPassword1" placeholder="SURAT DARI" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">TANGGAL SURAT</label>
						<input type="text" name="to" class="form-control" value="<?php echo $data['MAIL_DATE'] ?>" id="exampleInputPassword1" placeholder="TANGGAL SURAT" required="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">DISPOSTION AT</label>
						<input type="date" name="dispo_at" class="form-control" id="exampleInputPassword1" placeholder="DISPOSTION AT" required="">
                    </div>
                    <div class="form-group">
                  <label>NOTIFIKASI</label>
                  <select class="form-control" name="notifikasi">
                    <option selected value="">-PILIH- </option>
                    <option value="Tindak Lanjuti">Tindak Lanjuti</option>
                    <option value="Selesaikan">Selesaikan</option>
                    <option value="Untuk Diketahui">Untuk Diketahui</option>
                    <option value="Saran Kepala Sekolah">Saran Kepala Sekolah</option>
                    <option value="Siapkan">Siapkan</option>
                    <option value="Pedomani">Pedomani</option>
                    <option value="Inventarisir / Kompulir">Inventarisir / Kompulir </option>
                    <option value="Pertimbangkan">Pertimbangkan</option>
                    <option value="Untuk Diwakili">Untuk Diwakili </option>
                    <option value="Agar Hadir">Agar Hadir</option>
                    <option value="Laporkan Hasilnya">Laporkan Hasilnya</option>
                    <option value="Koordinasi">Koordinasi </option>
                    <option value="Agar Menghadap Saya">Agar Menghadap Saya</option>
                    <option value="Sampaikan Ybs">Sampaikan Ybs </option>
                    <option value="Laporkan Yth. Kacab Dinas Pendidikan">Laporkan Yth. Kacab Dinas Pendidikan</option>
                    <option value="Laporkan Yth.">Laporkan Yth. </option>
                  </select>
                </div>
                     <div class="form-group">
                    <label>KEPADA</label>
                    <select class="form-control" name="kepada">
                    <option selected value="" >-PILIH- </option>
                    <option value="Kasubag. Tata Usaha">Kasubag. Tata Usaha</option>
                    <option value="Wakasek Kurikulum">Wakasek Kurikulum</option>
                    <option value="Wakasek Kesiswaan">Wakasek Kesiswaan</option>
                    <option value="Wakasek Sarana & Prasarana">Wakasek Sarana & Prasarana</option>
                    <option value="Wakasek Humas & HKI">Wakasek Humas & HKI</option>
                    <option value="Penjamin Mutu Sekolah">Penjamin Mutu Sekolah</option>
                    <option value="Ka. Komli">Ka. Komli </option>
                    <option value="Ka. Beng">Ka. Beng</option>
                    <option value="Koordinator Perpustakaan">Koordinator Perpustakaan </option>
                    <option value="Koordinator BK">Koordinator BK</option>
                    <option value="Koordinator BKK">Koordinator BKK</option>
                    <option value="Ketua Unit Produksi">Ketua Unit Produksi </option>
                    <option value="Direktur Bank Mini SMK">Direktur Bank Mini SMK</option>
                    <option value="Pembina Ekstra">Pembina Ekstra </option>
                  </select>
                </div>
                     <div class="form-group">
                    <label>STATUS</label>
                    <select class="form-control" name="status">
                    <option selected  value="">-PILIH- </option>
                    <option value="Amat Segera">Amat Segera</option>
                    <option value="Segera">Segera</option>
                    <option value="Penting">Penting</option>
                  </select>
                </div>
                    <div class="form-group">
						<label for="exampleInputPassword1">PERIHAL</label>
						<input type="text" name="perihal" class="form-control" id="exampleInputPassword1" placeholder="PERIHAL" required="">
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