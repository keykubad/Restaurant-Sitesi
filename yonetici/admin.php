<?php
//simgola.com restaruant
session_start();
require("../ayar.php");
require("fonksiyon.php");
require_once("ust.php");
	if ($_SESSION["login"]==""){
		git("index.php",3);
		die ('<meta charset="utf-8" />hop nereye? Dön başa bakalım :)');
		
	
	}	

$sayfa	=$_GET["s"];
switch ($sayfa){
	default:
	require_once("ana.php");
	break;
	
	case sifre:
	require_once("sifre.php");
	break;

	case ayarlar:
	require_once("ayarlar.php");
	break;
	
	case sabitmenuler:
	require_once("sabitmenuler.php");
	break;
	
	case menuduzenle:
	require_once("menuduzenle.php");
	break;
	
	case menuduzeni:
	require_once("menuduzen.php");
	break;
	
	case menusil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from menuler where id='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=menuduzenle",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;
	
	case cikis:
	session_destroy();
	ok("Çıkış başarıyla yapıldı yönlendiriliyorsunuz.");
	git("index.php",5);
	break;
	
	case altmenu_ekle:
	require_once("altmenu.php");
	break;
	
	case altmenuliste:
	require_once("altmenuliste.php");
	break;
	
	case altmenuduzen:
	require_once("altmenuduzenle.php");
	break;
	
	case altmenusil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from altmenuler where altid='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=altmenuliste",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;
	
	case urunekle:
	require_once("urunekle.php");
	break;
	
	case urunliste:
	require_once("urunlistesi.php");
	break;
	
	case urunduzen:
	require_once("urunduzen.php");
	break;
	
	case urunsil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from urunler where urunid='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=urunliste",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;
	
	case ekresimekle:
	require_once("ekresimekle.php");
	break;
	
	case ekresimliste:
	require_once("ekresimliste.php");
	break;
	
	case ekresimduzen:
	require_once("ekresimduzen.php");
	break;
	
	case ekresimsil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from ekresimler where id='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=ekresimliste",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;
	
	case sliderekle:
	require_once("sliderekle.php");
	break;
	
	case sliderliste:
	require_once("sliderliste.php");
	break;
	
	case sliderduzen:
	require_once("sliderduzen.php");
	break;
	
	case slidersil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from slider where ids='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=sliderliste",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;
	
	case duyuruekle:
	require_once("duyuruekle.php");
	break;
	
	case altkisa:
	require_once("hakkindaekle.php");
	break;
	
	case haberekle:
	require_once("haberekle.php");
	break;
	
	case haberliste:
	require_once("haberliste.php");
	break;
	
	case haberduzen:
	require_once("haberduzen.php");
	break;
	
	case habersil:
	$id		=$_GET["id"];
	if(demo()!= 1){
	$silm	=mysql_query("delete from haberler where hid='$id' ");
		if($silm){
		ok("Başarıyla silindi");
		git("admin.php?s=haberliste",3);
		}else{
		hata("Silinme başarısız");
		
		}
	}
	break;

}
	require_once("alt.php");






?>

