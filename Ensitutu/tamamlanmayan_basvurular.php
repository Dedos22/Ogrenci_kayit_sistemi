<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<h2>Basvuru Listesi</h2>
 <table border="1" class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ADI</th>
                                                  <th>SOYADI</th>
												  <th>TC</th>
                                                <th>ENSTITU</th>
												 <th>CEPTELEFONU</th>
												 <th>EPOSTA</th>
												 <th>KAYIT DURUMU</th>
												 <th>ALES PUANI</th>
												 <th>YABANCI DIL PUANI</th>
												 <th>PROGRAM ADI</th>
                                                <th>DÜZENLE</th>
                                                 <th>SIL</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                     include"ayar.php";
                                                     $yazilar=$db->prepare("SELECT *  FROM adaylar WHERE kayit_durumu=0");
                                                     $yazilar->execute();
                                                     $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                                     $yazisay=$yazilar->rowcount();

                                                     if($yazisay){
                                                     	foreach ($yazicek as $row) {
                                                     
                                                  
                                                     ?>
                                              
                                            <tr>
                                                <td  > <?php echo $row["aday_id"] ;?></td>
                                            
                                                  <td  ><?php echo $row["aday_adi"] ;?></td>
												   <td ><?php echo $row["aday_soyadi"] ;?></td>
												   <td ><?php echo $row["aday_tc"] ;?></td>
												   <td ><?php echo $row["aday_birim"] ;?></td>
												   <td ><?php echo $row["ceptelefonu"] ;?></td>
												   <td ><?php echo $row["eposta"] ;?></td>
												   <td ><?php echo $row["kayit_durumu"] ;?></td>
												   <td ><?php echo $row["ales_puani"] ;?></td>
												   <td ><?php echo $row["yabanci_dil_puani"] ;?></td>
												   
												   
												   <td ><?php echo $row["program_adi"] ;?></td>
												   
												   
												   
                                                   <td>   <a href="basvuru_duzenle.php?guncelle_id=<?php echo $row["aday_id"] ?>">Duzenle</a>                                              
												   
                                               </td><td>
                                                  <a href="basvuru_listesi.php?id=<?php echo $row["aday_id"]; ?>">Sil</a>
                                               </td>
                                            </tr>
                                
                                                <?php }} ?>


                                        </tbody>
                                    </table>



</body>
</html>
<?php

$sil_id=$_GET["id"];
if(isset($_GET["id"])){

    //echo $sil_id; exit;
	$silme = $db->query("DELETE FROM adaylar WHERE aday_id=$sil_id");
	//$delete = $silme->execute();
    
	if($delete){
		header("Location: basvuru_listesi.php");
	}else {
		header("Location:  basvuru_listesi.php?delete=basarisiz");

	}

}
?>