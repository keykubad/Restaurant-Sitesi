<?php
$cek	=mysql_fetch_array(mysql_query("select * from ayarlar"));
	if($cek["site_durum"]==2){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		Site kapalı bakım veya yedekleme yapılıyor!';
		exit();
	}
$sayfa	=$_GET["sayfa"];

switch($sayfa){
	default:
	$cek	=mysql_fetch_array(mysql_query("select * from ayarlar"));
	$title	=$cek["site_title"];
	$des	=$cek["site_keyw"];
	$key	=$cek["site_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/slider.php");
	require_once(TEMA_URL."/alt.php");
	break;
	
	case menuicerik:
	$id=$_GET["id"];
	$cek	=mysql_fetch_array(mysql_query("select * from menuler where id='$id'"));
	$title	=seo($cek["menu_adi"]);
	$des	=$cek["menu_keyw"];
	$key	=$cek["menu_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/menuicerik.php");
	require_once(TEMA_URL."/alt.php");
	break;
	
	case altmenuicerik:
	$id=$_GET["id"];
	$cek	=mysql_fetch_array(mysql_query("select * from altmenuler where altid='$id'"));
	$title	=seo($cek["altmenu_adi"]);
	$des	=$cek["altmenu_keyw"];
	$key	=$cek["altmenu_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/altmenuicerik.php");
	require_once(TEMA_URL."/alt.php");
	break;
	
	case urunicerik:
	$id=$_GET["id"];
	$cek	=mysql_fetch_array(mysql_query("select * from urunler where urunid='$id'"));
	$title	=seo($cek["urun_adi"]);
	$des	=$cek["urun_keyw"];
	$key	=$cek["urun_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/urunicerik.php");
	require_once(TEMA_URL."/alt.php");
	break;
	
	case haberliste:
	$cek	=mysql_fetch_array(mysql_query("select * from ayarlar"));
	$title	=$cek["site_title"];
	$des	=$cek["site_keyw"];
	$key	=$cek["site_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/haberliste.php");
	require_once(TEMA_URL."/alt.php");
	break;

	case haberoku:
	$id=$_GET["id"];
	$cek	=mysql_fetch_array(mysql_query("select * from haberler where hid='$id'"));
	$title	=seo($cek["hab_baslik"]);
	$des	=$cek["hab_keyw"];
	$key	=$cek["hab_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/haberoku.php");
	require_once(TEMA_URL."/alt.php");
	break;
	
	case iletisim:
	$cek	=mysql_fetch_array(mysql_query("select * from ayarlar"));
	$title	=$cek["site_title"];
	$des	=$cek["site_keyw"];
	$key	=$cek["site_desc"];
	require_once(TEMA_URL."/ust.php");
	require_once(TEMA_URL."/menuler.php");
	require_once(TEMA_URL."/iletisim.php");
	require_once(TEMA_URL."/alt.php");
	break;
}
?>