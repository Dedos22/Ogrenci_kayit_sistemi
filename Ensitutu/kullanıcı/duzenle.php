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
      $kayit_durumu="2";  
	
			$yukle = $db->prepare("UPDATE adaylar SET  eposta=?, ceptelefonu=?, yabanci_dil_puani=?,ales_puani=?, kayit_durumu=?  WHERE aday_id=?");
            $update = $yukle->execute(array( $eposta,$cep, $yabancidil,$ales,$kayit_durumu,
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
