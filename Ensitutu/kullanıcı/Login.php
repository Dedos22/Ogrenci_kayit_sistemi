<?php 
include "..\ayar.php";
?>

<style>
body {
  margin: 0;
  padding: 0;
  background-color: #D7D7D7;
  height: 100vh;
}
table{
 background-color:#0099FF ;
 padding:50px;
 font-size:20px;
 position:fixed;
  top: 200px;
      right: 550px;
}

</style>



<form action="Login.php" method="POST">




  <table align="center">
  
  <tr>
      <td width="104" height="43"><h2>ADAY GIRIS EKRANI</h2></td>
    
    </tr>
    <tr>
      <td width="104" height="43">KullaniciAdi</td>
      <td width="15">:</td>
      <td width="376"><input type="text" name="kadi" /></td>
    </tr>
    <tr>
      <td>Sifre</td>
      <td>:</td>
      <td><input type="password" name="sifre" /></td>
    </tr>
  <td></td>
      <td></td>
      <td><input name="submit" type="submit"  value="Giris" /></td>
  </tr>
  </table>
  
  
  
  
</form>
<?php
    ob_start();
    session_start();

   
     
    $kadi = $_POST['kadi'];
    $sifre = $_POST['sifre'];
  
    $sql = "SELECT * FROM adaylar WHERE aday_adi='$kadi' AND aday_sifre='$sifre' ";
    $stmt = $db->query($sql);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_OBJ);

    if ($kadi=="" || $sifre=="" ) {
	     echo "<script type='text/javascript'>alert('Lutfen bilgilerinizi giriniz.');</script>";
       
    }else{
        if ($kadi==($_SESSION['aday_adi'] = $result->aday_adi) && $sifre == ($_SESSION['aday_sifre'] = $result->aday_sifre))
        {
            $_SESSION['login'] = true;
            $_SESSION['kadi_adi'] = $kadi;
			
            header("Location: adaysayfasi1.php");
        }
        else{
		
           echo "<script type='text/javascript'>alert('Bilgiler Yanlis');</script>";
        }
    }


 
    ob_end_flush();
?>