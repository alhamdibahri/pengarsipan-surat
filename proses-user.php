<?php
include 'koneksi.php'; 
if($_POST['req'] == 'add')
{
                    
	$iduser = $_POST['id_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$fullname = $_POST['fullname'];
	move_uploaded_file($_FILES['file']['tmp_name'], 'application/img/'.$_FILES['file']['name']);
	$sql = "INSERT INTO user (ID_USER,USERNAME,PASSWORD,FULLNAME,LEVEL,PHOTO)VALUES('".$iduser."','".$user."','".$pass."','".$fullname."','Operator','".$_FILES['file']['name']."')";
	$insert = mysqli_query($conn,$sql);
	//echo $sql;
	header('Location:page-data-user.php');
	
	exit;
}
elseif($_POST['req'] == 'edit')
{
                    
	$iduser = $_POST['id_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$fullname = $_POST['fullname'];
	if (move_uploaded_file($_FILES['file']['tmp_name'], 'application/img/'.$_FILES['file']['name']))
	{
		$sql = "UPDATE user set USERNAME='".$user."',PASSWORD='".$pass."',FULLNAME='".$fullname."',LEVEL='Operator',PHOTO='".$_FILES['file']['name']."' WHERE ID_USER='".$iduser."'";
		$udpate = mysqli_query($conn,$sql);
		//echo $sql;
		header('Location:page-data-user.php');
	}
	else
	{
		$sql = "UPDATE user set USERNAME='".$user."',PASSWORD='".$pass."',FULLNAME='".$fullname."',LEVEL='Operator' WHERE ID_USER='".$iduser."'";
		$udpate = mysqli_query($conn,$sql);
		//echo $sql;
		header('Location:page-data-user.php');
	}
	
	
	
	exit;
}
if ($_GET['req'] == 'dell')
{
	$iduser = $_GET['ID_USER'];
	$sql = "DELETE FROM user WHERE ID_USER='".$iduser."'";
	$dlete = mysqli_query($conn,$sql);
	header('Location:page-data-user.php');
}
?>