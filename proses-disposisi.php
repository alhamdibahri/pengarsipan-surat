<?php session_start();
include 'koneksi.php';
if(isset($_POST['surat_dari']))
{
	$id_dispo = $_POST['id_dispo'];
	$idmail = $_POST['idmail'];
	$dispo_at = $_POST['dispo_at'];
	$notifikasi = $_POST['notifikasi'];
	$kepada = $_POST['kepada'];
	$status = $_POST['status'];
	$perihal = $_POST['perihal'];
	
	$sql = "INSERT INTO disposition (ID_DISPO,ID_USER,ID_MAIL,DISPOSITION_AT,REPLY_AT,DESKRIPSI_DIS,NOTIFICATION,STATUS) VALUES('".$id_dispo."','".$_SESSION['ID_USER']."','".$idmail."','".$dispo_at."','".$kepada."','".$perihal."','".$notifikasi."','".$status."')";
	$insert = mysqli_query($conn,$sql);	
	
	$sql_update = "UPDATE mail set STATUS='1' WHERE ID_MAIL='".$idmail."'";
	$update = mysqli_query($conn,$sql_update);
	header('Location:page-disposisi.php');
}
?>