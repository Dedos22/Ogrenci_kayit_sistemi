<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script>
function on()
{
    var e = document.getElementById("ana_bilim_dali");
	var str = e.options[e.selectedIndex].text;
    if( str != "")
        document.getElementById("guncelle").disabled = false;
        
}
function sh()
{
    
        document.getElementById("guncelle").disabled = true;

}
</script>			
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

<body onload="sh()">
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
echo $birim=$row["aday_birim"];
 $id=$row["aday_id"];
	
?>

 <br ><br />
</div><br />
 

    <?php }   ?> 
									     <form action="update.php?id=<?php echo $id; ?>" method="POST" >
	                                                 <?php
												    
                                                     include"../ayar.php";
                                                     $yazilar=$db->prepare("SELECT id,ana_bilim_dali,program_adi FROM bilim_dallari  WHERE birim_id ='".$birim."'");
                                                     $yazilar->execute();
                                                     $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                                     $yazisay=$yazilar->rowcount();
                                                      ?> <select id="ana_bilim_dali" onchange="on()"  name="ana_bilim_dali" ><?PHP
                                                     if($yazisay>0){
                                                     	foreach ($yazicek as $row) {
                                                   
                                                     ?>
		

													
                                             <label >ANA BILIM DALI & PROGRAM ADI:</label> 
											        
                                           
										   ANA BILIM DALI:
										  <?PHP 
                                          echo  "<option   value='".$row["ana_bilim_dali"]."'> ".$row["program_adi"]."</option>";
                                          
										  ?>
										  <?php }
												$yazicek--;
												}?>
                                           </select>
                                           <br ><br>
										   
										    
										   <input type="submit" name="guncelle" value="kaydet" id="guncelle">
										   	    </form>
</body>
</html>
