<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<h2>sil</h2>

<body>
</body>
</html>
<?php
//yorum sil

$sil_id=$_GET["id"];
if(isset($sil_id)){


	$silme = $db->prepare("DELETE from bilim_dallari WHERE id=?");
	$delete = $silme->execute(array($sil_id));

	if($delete){
		header("Location: sistem.php?delete=basarili");
	}else {
		header("Location: sistem.php?delete=basarisiz");

	}

}
?>