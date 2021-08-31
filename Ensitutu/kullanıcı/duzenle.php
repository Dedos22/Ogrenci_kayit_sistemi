<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Düzenle</title>
</head>
<?php
include"../ayar.php";
echo $id = $_GET["id"];
 	  
if(isset($_POST["guncelle"])){


	
	  $eposta = $_POST['eposta'];
	   $cep = $_POST['ceptelefonu'];
	    $ales = $_POST['ales'];
		 $yabancidil = $_POST['yabancidil'];
     
	
			$yukle = $db->prepare("UPDATE adaylar SET ana_bilim_dali=?,  program_adi=? , eposta=?, ceptelefonu=?, yabanci_dil_puani=?,ales_puani=?  WHERE aday_id=?");
            $update = $yukle->execute(array($abd, $pa, $eposta,$cep, $yabancidil,$ales,
				$id));
			if($update){
				header("Location: adaysayfasi.php");
			}else {
				header("Location: adaysayfasi.php");

			}
		
		
}
?>

<body>
</body>
</html>
