<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include"ayar.php";

   

if(isset($guncelle)){
	echo   $abd= $_POST['anabilimdali'];
    echo $pa = $_POST['programadi'];
     $kontenjan = $_POST['kontenjan'];
	
		$id = $_GET["guncelle_id"];
		
		
		
		
			$yukle = $db->prepare("UPDATE bilim_dallari SET lisans_programi=?,  ana_bilim_dali=? , kontenjan=?  WHERE id=?");
            $update = $yukle->execute(array($abd, $pa, $kontenjan,
				$id));
			if($update){
				header("Location: sistem.php");
			}else {
				header("Location: sistem.php");

			}
		
		

?>
<body>
</body>
</html>
