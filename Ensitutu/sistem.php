
<title>SISTEM SAYFASI</title>
</head>
<h2>SISTEM SAYFASI</h2>
<body>

<form action="sistem.php" method="POST">
  <label for="fname">Lisans Programi:</label><br>
  <input type="text" id="anabilimdali" name="anabilimdali" ><br><br>
  <label for="lname">Ana Bilim Dali:</label><br>
  <input type="text" id="programadi" name="programadi" ><br><br>
   <label for="lname">Kontenjan:</label><br>
  <input type="text" id="kontenjan" name="kontenjan" ><br><br>
  
  <input type="submit" name="kayit" value="kayit">
</form> 




</body>
</html>
<?php
if(isset($_POST["kayit"])){
include"ayar.php";

echo $anabilimdali=$_POST['anabilimdali'];
$programadi=$_POST['programadi'];
$kontenjan=$_POST['kontenjan'];



try{
   
    $kaydet=$db->query("INSERT INTO bilim_dallari (lisans_programi,ana_bilim_dali, kontenjan) VALUES ('".$anabilimdali."','".$programadi."','".$kontenjan."')");
    echo "veriler eklendi";   
 
    
}catch(Exception $ex){
    echo "basarisiz";   
}

}

?>

                                     <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                 <th>LISANS PROGRAMI</th>
                                                  <th>ANA BILIM DALI</th>
                                                <th>KONTENJAN</th>
                                                <th>DÜZENLE</th>
                                                 <th>SIL</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                     include"ayar.php";
                                                     $yazilar=$db->prepare("SELECT *  FROM bilim_dallari ORDER BY id DESC");
                                                     $yazilar->execute();
                                                     $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                                     $yazisay=$yazilar->rowcount();

                                                     if($yazisay){
                                                     	foreach ($yazicek as $row) {
                                                     
                                                  
                                                     ?>
                                              
                                            <tr>
                                                <td  > <?php echo $row["id"] ;?></td>
                                            
                                                  <td  ><?php echo $row["lisans_programi"] ;?></td>
												   <td ><?php echo $row["ana_bilim_dali"] ;?></td>
												   <td ><?php echo $row["kontenjan"] ;?></td>
                                                   <td>   <a href="duzenle.php?guncelle_id=<?php echo $row["id"] ?>">Duzenle</a>                                              
												   
                                               </td><td>
                                                  <a href="sistem.php?id=<?php echo $row["id"]; ?>">Sil</a>
                                               </td>
                                            </tr>
                                
                                                <?php }} ?>


                                        </tbody>
                                    </table>


<?php

$sil_id=$_GET["id"];
if(isset($_GET["id"])){

    //echo $sil_id; exit;
	$silme = $db->query("DELETE FROM bilim_dallari WHERE id=$sil_id");
	//$delete = $silme->execute();
    
	if($delete){
		header("Location: sistem.php");
	}else {
		header("Location: sistem.php?delete=basarisiz");

	}

}
?>












