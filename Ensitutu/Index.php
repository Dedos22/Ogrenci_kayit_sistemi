<?php 
include "ayar.php";
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
<form action="Index.php" method="POST">
  <table align="center">
  <tr>
      <td width="104" height="43"><h2>LOGIN</h2></td>
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

    include"ayar.php";
     
    $kadi = $_POST['kadi'];
    $sifre = $_POST['sifre'];
  
    $sql = "SELECT * FROM kullanicilar WHERE Kullanici_Adi='$kadi' AND Kullanici_Sifre='$sifre' ";
    $stmt = $db->query($sql);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_OBJ);

    if ($kadi=="" || $sifre=="" ) {
	     echo "<script type='text/javascript'>alert('Lutfen bilgilerinizi giriniz.');</script>";
       
    }else{
        if ($kadi==($_SESSION['Kullanici_Adi'] = $result->Kullanici_Adi) && $sifre == ($_SESSION['Kullanici_Sifre'] = $result->Kullanici_Sifre))
        {
            $_SESSION['login'] = true;
            $_SESSION['kadi_adi'] = $kadi;
            header("Location: admin.php");
        }
        else{
		
           echo "<script type='text/javascript'>alert('Bilgiler Yanlis');</script>";
        }
    }


 
    ob_end_flush();
?>