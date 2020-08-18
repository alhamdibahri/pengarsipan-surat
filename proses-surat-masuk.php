<?php session_start();
include 'koneksi.php';
if ($_GET['req'] == 'detail')
{
	$query = mysqli_query($conn,"SELECT * FROM mail WHERE ID_MAIL='".$_GET['ID_MAIL']."'");
	$data = mysqli_fetch_array($query);
	
	if (substr($data['FILE_UPLOAD'],-4) == '.doc' || substr($data['FILE_UPLOAD'],-5) == '.docx')
	{
		function read_file_docx($filename)
	{
	
		$striped_content = "";
		
		$content = "";
		
		if(!$filename || !file_exists($filename)) return false;
		
		$zip = zip_open($filename);
		
		if (!$zip || is_numeric($zip)) return false;
		
		while ($zip_entry = zip_read($zip)) 
		{
		
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;
			
			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			
			zip_entry_close($zip_entry);
		
		}// end while
	
		zip_close($zip);
		$content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
		
		$content = str_replace('</w:r></w:p>', "\r\n", $content);
		
		$striped_content = strip_tags($content);
		
		return $striped_content;
	
	}
	$gg = $data['FILE_UPLOAD'];
	$filename = <<<end
application/doc/$gg
end;
	$content = read_file_docx($filename);

		if($content !== false) 
		{
			echo nl2br($content);
		}
		else 
		{
			echo 'Couldn\'t the file. Please check that file.';
		}
		exit;
	}
	elseif (substr($data['FILE_UPLOAD'],-4) == '.pdf')
	{
		$a = $data['FILE_UPLOAD'];
	$file = <<<end
application/pdf/$a
end;
	  $filename = $data['FILE'];
	  header('Content-type: application/pdf');
	  header('Content-Disposition:inline; filename="'.$filename.'"');
	  header('Content-Transfer-Encoding:binary');
  	  header('Accept-Ranges:bytes');
	  @readfile($file);
	}
	elseif (substr($data['FILE_UPLOAD'],-4) == '.jpg' || substr($data['FILE_UPLOAD'],-5) == '.jpeg' || substr($data['FILE_UPLOAD'],-4) == '.PNG' || substr($data['FILE_UPLOAD'],-4) == '.png')
	{
		echo'<img src="application/img/'.$data['FILE_UPLOAD'].'" class="img-thumbnail" width="100%"  height="100%"/>';
	}
	else 
	{
		echo 'sdlkfjsdlkf';
	}
	
	exit;
}
if($_POST['req'] == 'add')
{
                    
	$id_mail = $_POST['id_mail'];
	$id_user = $_SESSION['ID_USER'];
	$idtype = "MTY001";
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
	move_uploaded_file($_FILES['file']['tmp_name'], 'dist/img/'.$_FILES['file']['name']);
	$sql = "INSERT INTO mail (ID_MAIL,ID_USER,ID_MTY,INCOMING_AT,MAIL_CODE,MAIL_DATE,MAIL_FROM,MAIL_TO,MAIL_SUBJECT,DESKRIPSI,FILE_UPLOAD,STATUS) 			   
	VALUES('".$id_mail."','".$id_user."','".$idtype."','".$incoming."','".$mail_code."','".$mail_date."','".$mail_from."','".$mail_to."','".$mail_sub."','".$deskrip."','".$file."','0')";
	$insert = mysqli_query($conn,$sql);
	//echo $sql;
	header('Location:page-data-surat-masuk.php');
	
	exit;
}
elseif($_POST['req'] == 'edit')
{
	$id_mail = $_POST['id_mail'];
	$id_user = $_SESSION['ID_USER'];
	$idtype = "MTY001";
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
	
	if (move_uploaded_file($_FILES['file']['tmp_name'], 'application/pdf/'.$_FILES['file']['name']))
	{
	$sql = "UPDATE mail set ID_MTY='".$idtype."',ID_USER='".$id_user."',INCOMING_AT='".$incoming."',MAIL_CODE='".$mail_code."',MAIL_DATE='".$mail_date."',MAIL_FROM='".$mail_from."',MAIL_TO='".$mail_to."',MAIL_SUBJECT='".$mail_sub."',DESKRIPSI='".$deskrip."',FILE_UPLOAD='".$file."' WHERE ID_MAIL='".$id_mail."'";
	$udpate = mysqli_query($conn,$sql);
	echo $sql;
	header('Location:page-data-surat-masuk.php');
	}
	else
	{
		$sql = "UPDATE mail set ID_MTY='".$idtype."',ID_USER='".$id_user."',INCOMING_AT='".$incoming."',MAIL_CODE='".$mail_code."',MAIL_DATE='".$mail_date."',MAIL_FROM='".$mail_from."',MAIL_TO='".$mail_to."',MAIL_SUBJECT='".$mail_sub."',DESKRIPSI='".$deskrip."' WHERE ID_MAIL='".$id_mail."'";
	$udpate = mysqli_query($conn,$sql);
	echo $sql;
	header('Location:page-data-surat-masuk.php');
	}
	exit;
}
if($_GET['req'] == 'dell')
{
	$id_mail = $_GET['ID_MAIL'];
	$delete = mysqli_query($conn,"DELETE FROM mail WHERE ID_MAIL='".$id_mail."'");
	header('Location:page-data-surat-masuk.php');
	exit;
}
?>