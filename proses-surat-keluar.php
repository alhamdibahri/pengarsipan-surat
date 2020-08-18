<?php session_start();
include 'koneksi.php'; 
if($_POST['req'] == 'add')
{
                    
	$id_mail = $_POST['id_mail'];
	$id_user = $_SESSION['ID_USER'];
	$idtype = "MTY002";
	$incoming = $_POST['tgl_terima'];
	$mail_code = $_POST['no_surat'];
	$mail_date = $_POST['tgl_surat'];
	$mail_from = $_POST['from'];
	$mail_to = $_POST['to'];
	$mail_sub = $_POST['subject'];
	$deskrip = $_POST['deskripsi'];	
	$file = $_FILES['file']['name'];
	$ukuran	= $_FILES['file']['size'];
	$ekstensi_diperbolehkan	= array('png','jpg','PNG','doc','docx','pdf','jpeg');
	$x = explode('.', $file);
	$ekstensi = strtolower(end($x));
	
	$sql = "INSERT INTO mail (ID_MAIL,ID_USER,ID_MTY,INCOMING_AT,MAIL_CODE,MAIL_DATE,MAIL_FROM,MAIL_TO,MAIL_SUBJECT,DESKRIPSI,FILE_UPLOAD,STATUS) 			    VALUES('".$id_mail."','".$id_user."','".$idtype."','".$incoming."','".$mail_code."','".$mail_date."','".$mail_from."','".$mail_to."','".$mail_sub."','".$deskrip."','".$file."','0')";
	$insert = mysqli_query($conn,$sql);
	//echo $sql;
	header('Location:page-data-surat-keluar.php');
	
	exit;
}
elseif($_POST['req'] == 'edit')
{
	$id_mail = $_POST['id_mail'];
	$id_user = $_SESSION['ID_USER'];
	$idtype = "MTY002";
	$incoming = $_POST['tgl_terima'];
	$mail_code = $_POST['no_surat'];
	$mail_date = $_POST['tgl_surat'];
	$mail_from = $_POST['from'];
	$mail_to = $_POST['to'];
	$mail_sub = $_POST['subject'];
	$deskrip = $_POST['deskripsi'];
	if (move_uploaded_file($_FILES['file']['tmp_name'], 'application/pdf/'.$_FILES['file']['name']))
	{
	$sql = "UPDATE mail set ID_MTY='".$idtype."',ID_USER='".$id_user."',INCOMING_AT='".$incoming."',MAIL_CODE='".$mail_code."',MAIL_DATE='".$mail_date."',MAIL_FROM='".$mail_from."',MAIL_TO='".$mail_to."',MAIL_SUBJECT='".$mail_sub."',DESKRIPSI='".$deskrip."',FILE_UPLOAD='".$_FILES['file']['name']."' WHERE ID_MAIL='".$id_mail."'";
	$udpate = mysqli_query($conn,$sql);
	//echo $sql;
	header('Location:page-data-surat-keluar.php');
	}
	else
	{
		$sql = "UPDATE mail set ID_MTY='".$idtype."',ID_USER='".$id_user."',INCOMING_AT='".$incoming."',MAIL_CODE='".$mail_code."',MAIL_DATE='".$mail_date."',MAIL_FROM='".$mail_from."',MAIL_TO='".$mail_to."',MAIL_SUBJECT='".$mail_sub."',DESKRIPSI='".$deskrip."' WHERE ID_MAIL='".$id_mail."'";
	$udpate = mysqli_query($conn,$sql);
	//echo $sql;
	header('Location:page-data-surat-keluar.php');
	}
	exit;
}
if ($_GET['req'] == 'dell')
{
	$id_mail = $_GET['ID_MAIL'];
	$delete = mysqli_query($conn,"DELETE FROM mail WHERE ID_MAIL='".$id_mail."'");
	header('Location:page-data-surat-keluar.php');
	exit;
}
?>