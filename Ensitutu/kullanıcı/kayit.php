<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
input{
width:350px;

}


</style>

</head>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
     
    </div>
    <div class="col-sm-4">
      <img src="resim.jpg" style="width:300px" class="img-circle" alt="Ahi evran üniversitesi">
	  <h2>KAYIT OL</h2> 
	  <form method="POST">
    
	<input type="text" name="TC" placeholder=" TC Kimlik Numarasi"><br><br>
	<input type="text" name="adi" placeholder=" Adiniz:"><br><br>
	<input type="text" name="soyadi" placeholder=" Soyadiniz:"><br><br>
	<label for="cars">enstitu:</label><br >

<select name="enstitu" id="enstitu">
  <option value="1">Fen Bilimleri Enstitusu</option>
  <option value="2">Saglik bilimleri Enstitusu</option>
  <option value="3">Sosyal Bilimler Enstitusu</option>
 
</select><br><br>
	<input type="password" name="sifre" placeholder=" sifre:"><br><br>
	<input type="password" name="sifre1" placeholder=" tekrar sifre:"><br><br>
	
	
	
	<button name="kontrolEt">Kayit Ol</button><br >
	<a href="Login.php">Giris Sayfasi için tiklayiniz...</a>
</form>

    <div class="col-sm-4">
      
    </div>
  </div>
</div>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
     
    </div>
    <div class="col-sm-4">
   
 


    <div class="col-sm-4">
      
    </div>
  </div>
</div>



<?php
if (isset($_POST["kontrolEt"])) {
include"../ayar.php";
	$TC = $_POST["TC"];
	if (strlen($TC) == 11) {
		if (is_numeric($TC)) {
			$TC_10 = ((($TC[0] + $TC[2] + $TC[4] + $TC[6] + $TC[8])*7) - ($TC[1] + $TC[3] + $TC[5] + $TC[7])) % 10;
			if ($TC_10 == $TC[9]) {
				$TC_11 = ($TC[0] + $TC[1] + $TC[2] + $TC[3] + $TC[4] + $TC[5] + $TC[6] + $TC[7] + $TC[8] + $TC[9]) % 10;
				if ($TC_11 == $TC[10]) {
					echo "TC Kimlik Numarasi GEÇERLI!";
					$sifre = $_POST["sifre"];
                    $sifre1= $_POST["sifre1"];	
                    if($sifre!=$sifre1){

                     echo "sifreleriniz uyusmamaktadir.";
                    }else{
					  $adi= $_POST["adi"];
					  $soyadi= $_POST["soyadi"];
					  $enstitu= $_POST["enstitu"];
					
                         try{
   
                         $kaydet=$db->query("INSERT INTO adaylar (aday_adi,aday_soyadi, aday_sifre,aday_tc,aday_birim) VALUES ('".$adi."','".$soyadi."','".$sifre."','".$TC."','".$enstitu."')");
                           echo "kayit basarili";   
 
    
                          }catch(Exception $ex){
                          echo "basarisiz"; 
						  }
					
					}
					
				} else {
					echo "Geçersiz TC Kimlik Numarasi!";
				}
			} else {
				echo "Geçersiz TC Kimlik Numarasi!";
			}
		} else {
			echo "TC Kimlik Numarasi yalnizca rakamlardan olusmaktadir.";
		}
	} else {
		echo "TC Kimlik Numarasi 11 hane olmak zorundadir.";
	}
	
	
	
}





?>