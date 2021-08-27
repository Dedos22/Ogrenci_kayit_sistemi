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


$yorumlar=$db->query("SELECT aday_birim,aday_soyadi,aday_tc FROM adaylar WHERE aday_sifre ='".$sifre."' and aday_adi ='".$adi."' ");
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
?>

<?php 

}
 ?>


</div>



  
<p>

 <?php
												    
                                                     include"../ayar.php";
                                                     $yazilar=$db->prepare("SELECT *  FROM bilim_dallari  WHERE birim_id ='".$birim."'");
                                                     $yazilar->execute();
                                                     $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                                     $yazisay=$yazilar->rowcount();

                                                     if($yazisay){
                                                     	foreach ($yazicek as $row) {
                                                     		
                                                     	


                                                     
                                                     ?>
													 <fcrm action="guncelle.php" method="post">
													
                                             <label >ANA BILIM DALI:</label> 
											        
                                           <select  name="ana_bilim_dali" >
										   ANA BILIM DALI:
                                           <option ><?php echo $row["ana_bilim_dali"] ;?></option>

                                           </select>
                                           <br ><br>
										    <label >PROGRAM ADI:</label> 
                                                 <select  name="program_adi" >
                                           <option value="<?php echo $row["program_adi"] ;?>"><?php echo $row["program_adi"] ;?></option>

                                           </select><br><br>
										   
										   
										    <label for="fname">eposta:</label>
                                            <input type="text"  name="eposta" ><br ><br>
                                            <label for="lname">cep telefonu:</label>
                                            <input type="text"  name="ceptelefonu" ><br><br>
											 <label for="lname">ales puani:</label>
                                            <input type="text"  name="ales" ><br><br>
											 <label for="lname">yabanci dil puani:</label>
                                            <input type="text"  name="yabancidil" ><br><br>
                                            <input type="submit" value="GÜNCELLE">
                                        
												</form> 
                                               
                                
                                                <?php }} ?></p>


<body>
</body>
</html>
