<?php
//klasorleri listele
function klasor_listele($dizin){
		$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
		while ($dosya = readdir($dizinAc)){
			if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
			
				echo $dosya;
			}
		}
}
		$ayar		=mysql_fetch_array(mysql_query("select * from ayarlar"));
		$yonetici	=mysql_fetch_array(mysql_query("select * from yonetici"));
		//sabit tema ayarlarım
		define("PATH", realpath("."));
		define("URL", $ayar["site_url"]);
		define("TEMA_URL","tema/".$ayar["site_tema"]);
		define("TEMA", PATH."tema/".$ayar["site_tema"]);
		define("TEMA_DIR", $ayar["site_tema"]);
		define("EPOSTA", $yonetici["email"]);
		
		
?>