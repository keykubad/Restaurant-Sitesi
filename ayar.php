<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Simgola
	error_reporting(0);
	
#baglantý degiskenleri

	$host		="localhost";
	$kullanici	="musterii_yemek";
	$sifre		="123tre**";
	$veritabani	="musterii_restaurant";
	
#veritabani baglanti
	$baglan=mysql_connect($host,$kullanici,$sifre) or die (mysql_error());
#veritabani sec
	mysql_select_db($veritabani,$baglan) or die (mysql_error());
#karakter sec
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET character_set_connection = 'UTF8'");
	mysql_query("SET character_set_client = 'UTF8'");
	mysql_query("SET character_set_results = 'UTF8'"); 
	
	

?>