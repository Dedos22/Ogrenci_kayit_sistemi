<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h2>UPDATE</h2>
<?php
$yazi_id=$_GET["guncelle_id"];

include"ayar.php";
                $yazilar=$db->prepare("SELECT *  FROM bilim_dallari WHERE id=?");
                $yazilar->execute(array($yazi_id));
                $yazicek = $yazilar->fetch(PDO::FETCH_ASSOC);

  ?>

  <form action="duzenle.php?guncelle_id=<?php echo $yazi_id; ?>" method="POST" >
  
   <label for="fname">Lisans Programi:</label><br>
  <input type="text" id="anabilimdali" name="anabilimdali" value="<?php echo $yazicek["lisans_programi"] ;?>" ><br>
  <label for="lname">Ana Bilim Dali:</label><br>
  <input type="text" id="programadi" name="programadi" value="<?php echo $yazicek["ana_bilim_dali"] ;?>"  ><br><br>
   <label for="lname">Kontenjan:</label><br>
  <input type="text" id="kontenjan" name="kontenjan" value="<?php echo $yazicek["kontenjan"] ;?>" ><br><br>
  
  <input type="submit" name="guncelle" value="guncelle">
  </form>
</body>
</html>


<?php

$id = $_GET["guncelle_id"];
   
if(isset($_POST["guncelle"])){
	echo   $abd= $_POST['anabilimdali'];
    echo $pa = $_POST['programadi'];
     $kontenjan = $_POST['kontenjan'];
	
		
		
		
		
		
			$yukle = $db->prepare("UPDATE bilim_dallari SET lisans_programi=?, ana_bilim_dali=? , kontenjan=?  WHERE id=?");
            $update = $yukle->execute(array($abd, $pa, $kontenjan,
				$id));
			if($update){
				header("Location: sistem.php");
			}else {
				header("Location: sistem.php");

			}
		
		
}
?>