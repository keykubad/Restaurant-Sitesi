<?php
//Seo fonksiyonum buda linkleri duzenletir
function seo($tr1) {  
$turkce=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü"); 
$duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U");  
$tr1=str_replace($turkce,$duzgun,$tr1);  
$tr1 = preg_replace("@[^A-Za-z0-9\-_]+@i","",$tr1);  
return $tr1;  
}
//sınırsız kategori yap :)
function SinirsizKategoriListele($kategoriArray , $ebeveyn = 0  , $kademe_pixel = 5 ,  $i = 0  ,  $menuler = NULL , $nested = FALSE )
{
 

    if( empty($kategoriArray) ){
        return;
    }
 

    if( !$nested ){
     
        foreach($kategoriArray as $row):
            $items[$row['urun_altkat']][]=$row;
        endforeach;
    }else{
 
        $items=$kategoriArray;
    }
 

    foreach( $items[$ebeveyn] as $sayfa ){
   
        $bosluk=str_repeat(' ',($i * $kademe_pixel));
 
  
        $menuler .= '<li><a href="'.seo($sayfa["urun_adi"]).'-'.$sayfa['urunid'].'-urunicerik.html">'.$sayfa['urun_adi'].'</a>'.PHP_EOL;
		
	
    
        if(isset($items[$sayfa['urunid']])){
		
			
		$menuler .= '<ul class="children">'.PHP_EOL;
       $menuler=SinirsizKategoriListele($items,$sayfa['urunid'],$kademe_pixel,($i + 1),$menuler,TRUE);
	   


				
				 
			$menuler .= '</ul>'.PHP_EOL;	
				
        }
		
		    
		
		$menuler .= '</li>'.PHP_EOL;
	
    }
 

    return $menuler;
}
//site title description ve keyword cekiyoruz ANASAYFA
function dizi($dizi){
		return mysql_fetch_array($dizi);


}

//site genel ust ayarları
function site_genel($title,$des,$key){
	
	echo "<title>".$title."</title>";
	echo '
		<meta name="keywords" content="'.$key.'" />
		<meta name="description" content="'.$des.'" />
		';


}
//ust menulerin fonksiyonu burada
function ustmenuler($basla,$limit){
	$ust	=mysql_query("select * from menuler where  menu_aktif='1' LIMIT ".$basla.",".$limit."");
	
		while ($don=dizi($ust)){
		//bu kısımda menu yapısına göre alt menu varsa bir sorgu yoksa baska sorgu
			if($don["altmenu"] == 1){
			$ustid=$don['id'];
			echo '<li class="warning"><a href="'.seo($menu_adi=$don["menu_adi"]).'-'.$ustid.'-menu.html">'.$menu_adi=$don["menu_adi"].'</a>';
			$alt	=mysql_query("select * from altmenuler where ustid='$ustid'");
			echo '<ul class="secondary">';
			//burada kategoriye göre alt menuler dönecek
			while($s=dizi($alt)){
			$altid=$s['altid'];
			
			echo '
            <li><a href="'.seo($s["altmenu_adi"]).'-'.$altid.'-altmenu.html">'.$s["altmenu_adi"].'</a></li>';
			
			}
			echo '</ul>';
			}else{
			$ustid=$don['id'];
			echo '<li><a href="'.seo($menu_adi=$don["menu_adi"]).'-'.$ustid.'-menu.html">'.$menu_adi=$don["menu_adi"].'</a></li>';

			}
		echo '</li></li>';
		}

}

//Slider cekme fonksiyonu

function slider(){
	$slider	=mysql_query("select * from slider");
		while($s=dizi($slider)){
		
		  echo'<li>
                <div class="prod_holder">';  
			echo '<a href="'.$slink=$s["slider_link"].'">';
			echo '<img src="'.URL.''.$sresim=$s["slider_resim"].'" /> </a>';
			echo '<h3>'.$sbaslik=$s["slider_baslik"].'</h3></div>';
			echo '<span class="pricetag">'.$sek=$s["slider_ek"].'</span></li>';
			
		
		}

}
//duyurular fonksiyonu
function duyurular($baslik,$dicerik){

		$cek	=mysql_fetch_array(mysql_query("select * from duyuru"));
		//$baslik=1;
		if($baslik==0){
		return $baslik=$cek["dbaslik"];
		}
		//$dicerik=1;
		if($dicerik==0){
		return $dicerik=$cek["dic"];
		}
}

//kampanya fonksiyonu
function kampanyalar($ksol,$ksollink,$ksag,$ksaglink){

		$cek	=mysql_fetch_array(mysql_query("select * from duyuru"));
		//$baslik=1;
		if($ksol==0){
		return $ksol	=$cek["kresim"];
		
		}
		elseif($ksollink==0){
		return $ksollink=$cek["klink"];
		
		}
		elseif($ksag==0){
	
		return $ksag		=$cek["kikiresim"];
		
		}
		elseif ($ksaglink==0){
		return $ksaglink	=$cek["kikilink"];
		
		}else{
		return false;
		}
}


//Son ürünler 

function sonurunler($basla,$son){

		$cek	= mysql_query("select * from urunler order by urunid desc LIMIT $basla,$son");
		
			while ($s=dizi($cek)){
			$uid	=$s["urunid"];
			echo '<div class="prod_hold"> 
			<a class="wrap_link" href="'.seo($s["urun_adi"]).'-'.$uid.'-urunicerik.html">
			<span class="image">';
			
			echo '<img src="'.URL.''.$urunresim	=$s["urun_resim"];
			
			echo '" width="180" height="180"/></span> </a>';
			echo '<div class="pricetag_small"> 
			<span class="old_price">
			</span> <span class="new_price">';
					echo $urunek	=$s["uek"];
				
			echo '</span> </div>';
			echo '<div class="info">
                  <h3>';
					echo $urunbaslik	=$s["urun_adi"];
			echo '</h3><p>';
					echo $urunicerik	=strip_tags(substr($s["urun_icerik"],0,200))."...";

			echo '</p></div></div>';
				
				}
			

}

//menu icerikleri burada
function menuicerik ($mbaslik,$micerik){
$id	=$_GET["id"];
		$cek =dizi(mysql_query("select * from menuler 
		where id='$id' order by menu_aktif='1'"));
		
			if($mbaslik==0){
				return $mbaslik	=$cek["menu_adi"];
			
			}
			if($micerik==0){
				return $micerik	=$cek["menu_icerik"];
			
			}
		

}

//altmenu icerikleri burada
function altmenuicerik ($altmbaslik,$altmicerik){
$id	=$_GET["id"];
		$cek =dizi(mysql_query("select * from altmenuler 
		where altid='$id' order by altmenu_aktif='1'"));
		
			if($altmbaslik==0){
				return $altmbaslik	=$cek["altmenu_adi"];
			
			}
			if($altmicerik==0){
				return $altmicerik	=$cek["altmenu_icerik"];
			
			}
		

}



//urun icerigi burada cekiliyor

function urunicerik($baslik,$icerik,$ek,$uresim){
$uid=$_GET["id"];
	$al		=dizi(mysql_query("select * from urunler where urunid='$uid'"));
		if($baslik==0){
			return $baslik=$al["urun_adi"];
		
		
		}
		if($icerik==0){
			return $icerik=$al["urun_icerik"];
		
		
		}
		if($ek==0){
			return $ek=$al["uek"];
		
		
		}
		if($uresim==0){
			return $uresim=$al["urun_resim"];
		
		
		}
	
}

//urun ek resimler
function ekresim (){
$usid	=$_GET["id"];

	$ek		=mysql_query("select * from ekresimler where ustid='".$usid."'");
		while($s=dizi($ek)){
		
		?>
		 <li><a href='<?php echo URL.$ekresim=$s["ekresim"];?>' class='cloud-zoom-gallery' title='Thumbnail 2' rel="useZoom: 'zoom1', smallImage: '<?php echo URL.$ekresim=$s["ekresim"];?>'">
		 <img src="<?php echo URL.$ekresim=$s["ekresim"];?>" height="80" alt = "Thumbnail 1"/> </a></li>
<?php	
		}

}

//haber listesi burada
function haberliste(){
global $goster;
global $limit;
	$haber	=mysql_query("select * from haberler LIMIT $goster,$limit");
		while($s=dizi($haber)){
			echo '<tr><td class="remove">'.$s["hid"].'</td>';
			echo '<td class="image"><a href="'.seo($s["hab_baslik"]).'-'.$s["hid"].'-haberoku.html">'.$s["hab_baslik"].'</a></td></tr>';
		
		}

}

//haber okuma fonksiyonu
function haberoku ($mbaslik,$micerik){
$id	=$_GET["id"];
		$cek =dizi(mysql_query("select * from haberler 
		where hid='$id'"));
		
			if($mbaslik==0){
				return $mbaslik	=$cek["hab_baslik"];
			
			}
			if($micerik==0){
				return $micerik	=$cek["hab_icerik"];
			
			}
		

}
//haber footer liste
function haberalt(){
global $goster;
global $limit;
	$haber	=mysql_query("select * from haberler LIMIT 0,6");
		while($s=dizi($haber)){
			echo '<li><a href="'.seo($s["hab_baslik"]).'-'.$s["hid"].'-haberoku.html">'.$s["hab_baslik"].'</a></li>';
		
		}

}

//footer kısa tanıtım hakkımızda vs yazısı
function altkisa($baslik,$icerik){
	$alt	=dizi(mysql_query("select * from altkisa"));
		if($baslik==0){
			return $baslik=stripslashes($alt["alt_baslik"]);
		
		}
		if($icerik==0){
		
			return $icerik=stripslashes($alt["alt_icerik"]);
		
		}

}

//footer menuleri cek
function altmenulistesi(){

		$s=mysql_query("select * from menuler order by menu_aktif='1' LIMIT 0,5");
			while($a=dizi($s)){
				echo '<li><a href="'.seo($a["menu_adi"]).'-'.$a["id"].'-menu.html">'.$a["menu_adi"].'</a></li>';
			
			}

}
//iletisim fonksiyonumuz
function eposta ($adsoyad, $eposta, $konu, $mesaj){
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: {$adsoyad} <{$eposta}>\r\n";
		$header .= "Reply-To: {$adsoyad} <{$eposta}>\r\n";
		$mesaj = '<div style="padding: 10px; font-size: 17px; font-weight: bold">'.$konu.'</div>
		<div style="margin: 10px 0; border: 1px solid #ddd; padding: 10px; color: #333">'.nl2br($mesaj).'</div>
		<div style="border-top: 1px solid #ddd; padding: 10px 0; font-style: oblique; color: #aaa">Tüm Hakları Saklıdır. &copy; 2012 - Simgola.com</div>';
		if(mail(EPOSTA, $konu, $mesaj, $header)){
			return true;
		}else {
			return true;
		}
}
function lisans($license_code)
{
    // Ben yazdığım scriptlerde sript urlsini almak için bunun gibi bir değişken kullanırım. Değişken içeriği örneğin şöyledir:
   
    global $scripturl;

    // Şimdi site adresini alağıcağız. Ancak işimizi şans bırakmamak amacıyla burada kendimizi biraz kasacağız.
    // $_SERVER['SERVER_NAME'] bazenleri boş dönebiliyor. Bunu kontrol ediyoruz. Boş ise bir sonraki $_SERVER['HTTP_HOST']'a bakıyoruz.
    if (!empty($_SERVER['SERVER_NAME']))
        $site = $_SERVER['SERVER_NAME'];
    // $_SERVER['HTTP_HOST']'de bazen boş dönebilir. İşimizi şansa bırakmak olmaz. Bu nedenle bir sonraki else'ye geçiyoruz. $scripturl'nin içinden http://www. sız site adresini alıyoruz.
    elseif (!empty($_SERVER['HTTP_HOST']))
        $site = $_SERVER['HTTP_HOST'];
    // Burası biraz daha karmaşık kısaca $scripturl içinden http://www. kısmı dışını alıyor.
    else
        $site = preg_match('~(http|ftp)[s]?:\/\/[w\.]*([a-zA-Z0-9\.]+)\/~i', $scripturl, $match) ? $match[2] : '';

    // Yukarıda yaptığımız tüm işlemlere rağmen bir site adresi elde edemediysek, müşteriyi kasmaya gerek yok. Lisans işlemini devre dışı bırakıyoruz. null olarak döndürüyoruz fonksiyonu.
    if (empty($site))
        return;

    // Nuraya geçebildiysek site adresini almışız. Ama ki site adresinin başında yine www. varsa siliyoruz...
    if (strpos($site, 'www.') !== false)
        $site = substr($site, 4);

    // Burada algoritmamızı kullanarak site adresinizi şifreliyor. Tekrar aynı lisans şifresini almaya çalışıyoruz.
    $site_hash = sha1(sha1(md5($site. 'karistir')). 'karistir2');
    $site_hash = substr($site_hash, 0, 25);
    $site_hash = wordwrap($site_hash, 5, '-', true);
    $site_hash = mb_strtoupper($site_hash);

    // Evettt. Can alıcı nokta. 2-5 satır üstteki aldığım şifre ile müşteriye verdiğimiz lisans kodunu eşşeltirmeye/denkleştirmeye çalışıyor. Eğerki eşleşmez veya denkleşmez ise vay onun haline: scripti öldüyoruz!
    if ($site_hash != $license_code || $site_hash !== $license_code)
        die ('<meta charset="utf-8" />Lütfen geçerli lisans kodu girin!' . $site);
}

lisans('2D2AB-BB2C4-706FF-165EE-DC7E2'); 
?>