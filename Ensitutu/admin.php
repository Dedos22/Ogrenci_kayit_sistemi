<?php 
session_start();
error_reporting(0);

include"ayar.php";
?>
<html>
 
<head>
<meta charset="utf-8"> 
</head>
<body>
 

<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>

<ul>
  <li><?php echo "Kullanici adiniz :".$_SESSION['Kullanici_Adi'];
 $adi= $_SESSION['Kullanici_Adi']; 
$id=$_SESSION['Kullanici_Sifre'];
?></li>
</li>
   
<li>

<?php


$yorumlar=$db->query("SELECT Birim FROM Kullanicilar WHERE Kullanici_Sifre ='".$id."' and Kullanici_Adi ='".$adi."' ");
$yorumlar->execute();
$yorum=$yorumlar->fetchALL(PDO::FETCH_ASSOC);
foreach ($yorum as $row) { ?>
<b><p><p><?php  
$birim=$row["Birim"];
?></b>

<?php 

}
 ?>
 </li>
  <li><a class="active" href="admin.php?fg=1">Sistem</a></li>
    <li><a class="active" href="admin.php?fg=2">Basvuru Listesi</a></li>


<li><a class="active" href="admin.php?fg=4">Tamamlanmayan Başvurular </a></li>
 <li><?php
if ($_SESSION['Kullanici_Adi']==""){
echo '<script>window.location.href ="index.php";</script>';
}else{
;

echo "<br><a href=logout.php>LOGOUT</a>";
}


?></li>

</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

  <h3><?php 
  
  if($row["Birim"]==1){
      echo "Fen Bilimleri Enstitusu";
	  } else if($row["Birim"]==2){
	  echo "Sağlık Bilimleri Enstitüsü";
	  }else{
	   echo "Sosyal Bilimler Enstitusu";
	  
	  }

?></h3>

  <?PHP
  if($_GET["fg"]==1)
  {  ?>
     <iframe src="sistem.php" style=" height:1000; width:1220" title="sistem_sayfasi"></iframe>
	 <?PHP
  }
   else if($_GET["fg"]==2)
  {  ?>
     <iframe src="basvuru_listesi.php" style=" height:1000; width:1220" title="basvuru_sayfasi"></iframe>
	 <?PHP
  }
  else if($_GET["fg"]==4)
  {  ?>
     <iframe src="tamamlanmayan_basvurular.php" style=" height:1000; width:1220" title="tamamlanmayan_başvurular"></iframe>
	 <?PHP
  }
  
  
  ?>
</div>

</body>
</html>
