<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<?php
include"../ayar.php";
$id = $_GET["id"]; 	  
if(isset($_POST["guncelle"])){


 $abd= $_POST['ana_bilim_dali'];
 $kayit_durumu="1";    

     
	
			$yukle = $db->prepare("UPDATE adaylar SET program_adi=? ,kayit_durumu=?   WHERE aday_id=?");
            $update = $yukle->execute(array($abd, $kayit_durumu, 
				$id));
			if($update){
				header("Location: adaysayfasi.php");
			}else {
				header("Location: adaysayfasi.php");

			}
		
		
}
?>

</body>
</html>
