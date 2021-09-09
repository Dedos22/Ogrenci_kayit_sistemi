<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<style>
div{
background-color:#0099FF ;

 font-size:20px;



}
p{

background-color:#0099FF ;
 padding:10px;
 font-size:20px;
 width:900px;


}
select{
font-size:20px;
}
input{
 
}

</style>
<body onload="sh()">
<script>
function form_kontrol()
{
   if(document.getElementById("eposta").value.length == 0 & document.getElementById("ceptelefonu").value.length == 0 & document.getElementById("ales").value.length == 0 & document.getElementById("yabancidil").value.length == 0 )
        document.getElementById("guncelle").disabled = true;
  
    else
        document.getElementById("guncelle").disabled = false;
        
}
function sh()
{
    
        document.getElementById("guncelle").disabled = true;

}
</script>	

  <div >
  <?php
  session_start();
error_reporting(0);

include"../ayar.php";
   echo "Kullanici adiniz :".$_SESSION['aday_adi'];
 $adi= $_SESSION['aday_adi'];    
 $sifre= $_SESSION['aday_sifre'];
?>   
<br >

												
<?php


$yorumlar=$db->query("SELECT * FROM adaylar WHERE aday_sifre ='".$sifre."' and aday_adi ='".$adi."' ");
$yorumlar->execute();
$yorum=$yorumlar->fetchALL(PDO::FETCH_ASSOC);
foreach ($yorum as $row) { ?>

SOYADI:<?php  echo  $row["aday_soyadi"]; 

?><br >

BIRIM:<?php  echo  $row["aday_birim"];
$birim=$row["aday_birim"];
?><br >

TC:<?php  echo  $row["aday_tc"];
$birim=$row["aday_birim"];
$id=$row["aday_id"];


?><br ><br />
<?php 
$kayitdurumu=$row["kayit_durumu"];
if($kayitdurumu==2){

echo "Basvurunuz basarili olarak alinmistir.";
}
?>
</div><br />
										<p>   <form   action="duzenle.php?id=<?php echo $id; ?>" method="POST" >
										    <label for="fname">eposta:</label>
                                            <input type="text" value="<?php  echo  $row["eposta"];?>" name="eposta" id="eposta" onkeyup="form_kontrol()" ><br ><br>
                                            <label for="lname">cep telefonu:</label>
                                            <input type="text"  value="<?php  echo  $row["ceptelefonu"];?>"  name="ceptelefonu" id="ceptelefonu" onkeyup="form_kontrol()" ><br><br>
											 <label for="lname">ales puani:</label>
                                            <input type="text"  value="<?php  echo  $row["ales_puani"];?>" name="ales" id="ales" onkeyup="form_kontrol()" ><br><br>
											 <label for="lname">yabanci dil puani:</label>
                                            <input type="text"  value="<?php  echo  $row["yabanci_dil_puani"];?>" name="yabancidil" id="yabancidil" onkeyup="form_kontrol()" ><br><br>
										
											
                                            <input type="submit" name="guncelle" value="kaydet" id="guncelle">
  </form>
                                        
											
                                               
                                
                                       
<?php 

}

 ?></p>
 

</body>
</html>
