<?php
//Simgola.com restaruant sitesi
//demo aç kapat 1 açık 2 kapalı
function demo ($demo){

	$demo=2;
	if($demo==1){
	
		echo '<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Demo mod AKTİF ! Ekleme silme ve duzenleme işlemleri yapılamaz !!!</td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';
		exit();
	
	}
return $demo;

}
	//sabit tema ayarları
$ayar	=mysql_fetch_array(mysql_query("select * from ayarlar"));
		define("PATH", realpath("."));
		define("URL", $ayar["site_url"]);
		define("TEMA_URL","/tema/".$ayar["site_tema"]);
		define("TEMA", PATH."/tema/".$ayar["site_tema"]);
		define("TEMA_DIR", $ayar["site_tema"]);

function git ($yer,$sure){
		echo '<meta http-equiv="refresh" content="'.$sure.';URL='.$yer.'">';

}
//yesil hatasız
function ok ($ok){
	echo '<div id="message-green"><table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr><td class="green-left">'.$ok.'</td><td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td></tr></table></div>';

}
function hata ($hata){
	echo '<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">'.$hata.'</td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';

}

//klasorleri listele
function klasor_listele($dizin){
		$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
		while ($dosya = readdir($dizinAc)){
			if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
				echo "<option ";
				echo $dosya == TEMA_DIR ? 'selected' : null;
				echo " value='{$dosya}'>{$dosya}</option>";
			}
		}
}


?>

