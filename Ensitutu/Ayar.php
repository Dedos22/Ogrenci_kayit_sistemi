<?php
	$mysqlsunucu = "localhost";
	$mysqlkullanici = "root";
	$mysqlsifre = "toortoor";
	$dbname="Enstitu_Kayit";

	try{
	    $db = new PDO("mysql:host=$mysqlsunucu;dbname=$dbname;charset=utf8", $mysqlkullanici, $mysqlsifre);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Baglanti basarili"; 
	}catch(PDOException $e){
	    echo "Baglanti hatasi: " . $e->getMessage();
	}
?>