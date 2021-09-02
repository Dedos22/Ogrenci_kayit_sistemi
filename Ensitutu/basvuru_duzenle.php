<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Basvuru Düzenle</title>
</head>

<body>
<?php
$yazi_id=$_GET["guncelle_id"];

include"ayar.php";
                $yazilar=$db->prepare("SELECT *  FROM adaylar WHERE aday_id=?");
                $yazilar->execute(array($yazi_id));
                $yazicek = $yazilar->fetch(PDO::FETCH_ASSOC);
						

  ?>

  <form action="basvuru_duzenle.php?guncelle_id=<?php echo $yazi_id; ?>" method="POST" >
  
   <label for="fname">Adi:</label><br>
  <input type="text" id="aday_adi" name="aday_adi" value="<?php echo $yazicek["aday_adi"] ;?>" ><br>
  <label for="lname">soyadi:</label><br>
  <input type="text" id="aday_soyadi" name="aday_soyadi" value="<?php echo $yazicek["aday_soyadi"] ;?>"  ><br><br>
   <label for="lname">tc:</label><br>
  <input type="text" id="aday_tc" name="aday_tc" value="<?php echo $yazicek["aday_tc"] ;?>" ><br><br>
  <label for="lname">ceptelefonu:</label><br>
  <input type="text" id="ceptelefonu" name="ceptelefonu" value="<?php echo $yazicek["ceptelefonu"] ;?>" ><br><br>
  <label for="lname">ales puani:</label><br>
  <input type="text" id="ales_puani" name="ales_puani" value="<?php echo $yazicek["ales_puani"] ;?>" ><br><br>
  <label for="lname">yabanci dil puani:</label><br>
  <input type="text" id="yabanci_dil_puani" name="yabanci_dil_puani" value="<?php echo $yazicek["yabanci_dil_puani"] ;?>" ><br><br>
  <label for="cars">ana bilim dali:</label>

<select name="program_adi" id="program_adi">

												    
                                                   

  
  <option value="<?php echo $yazicek["ana_bilim_dali"] ;?>  "><?php echo $yazicek["ana_bilim_dali"] ;?> </option>
  

  
  
</select>
  
  <br >
  
  <input type="submit" name="guncelle" value="guncelle">
  </form>
</body>
</html>


<?php

$id = $_GET["guncelle_id"];
   
if(isset($_POST["guncelle"])){
	 $adi= $_POST['aday_adi'];
    $soyadi= $_POST['aday_soyadi'];
     $tc = $_POST['aday_tc'];
	$ceptelefonu = $_POST['ceptelefonu'];
	$ales_puani = $_POST['ales_puani'];
	$yabanci_dil_puani = $_POST['yabanci_dil_puani'];
	$program_adi = $_POST['program_adi'];
		
		
		
		
		
			$yukle = $db->prepare("UPDATE adaylar SET aday_adi=?, aday_soyadi=? , aday_tc=?,ceptelefonu=?,ales_puani=?,yabanci_dil_puani=?,program_adi=?  WHERE aday_id=?");
            $update = $yukle->execute(array($adi, $soyadi, $tc,$ceptelefonu,$ales_puani,$yabanci_dil_puani,$program_adi,
				$id));
			if($update){
				header("Location: basvuru_listesi.php");
			}else {
				header("Location: basvuru_listesi.php");

			}
		
		
}
?>








</body>
</html>
