<?php
$id			=$_GET["id"];
$cek		=mysql_fetch_array(mysql_query("select * from urunler where urunid='$id'"));


?>

<div id="page-heading"><h1>Ürün düzenle</h1></div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	

	
		<!-- start id-form -->
		<form enctype="multipart/form-data" method="POST">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Ürün adı:</th>
			<td><input type="text" class="inp-form" name="uad" value="<?php echo $cek["urun_adi"];?>" /></td>
			<td></td>
		</tr>
	<tr>
			<th valign="top">Ürün keywords:</th>
			<td><input type="text" class="inp-form" name="ukeyw" value="<?php echo $cek["urun_keyw"];?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Ürün description:</th>
			<td><input type="text" class="inp-form" name="udesc" value="<?php echo $cek["urun_desc"];?>" /></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Ürün ek bilgi:</th>
			<td><input type="text" class="inp-form" name="uek" value="<?php echo $cek["uek"];?>" /></td>
			<td></td>
		</tr>
		<tr>
		<th>Ürün ana resim:</th>
		<td><input type="file" class="file_1" name="resimana" /></td>
		<td><div class="bubble-left"></div>
		<div class="bubble-inner">Resim formatı dışında kabul edilmez</div>
		<div class="bubble-right"></div></td>
		</tr>

		<tr>
		<th valign="top">Ürün içerik:</th>
		<td><textarea  name="uicerik" id="editor"><?php echo $cek["urun_icerik"];?></textarea></td>
		<td></td>
	</tr>
		<tr>
		<th valign="top">Alt kategori:</th>
		<td>	
		<select  class="styledselect_form_1" name="ustmenu">
		<option value="0" <?php echo $cek["urun_altkat"]==0 ? selected : null;?>>Hiçbiri</option>
		<?php

		$ust		=mysql_query("select * from urunler order by urunid='$cek[urun_altkat]'");
		?>
		
		<?php
			while($dondur=mysql_fetch_array($ust)){
		?>
			<option value="<?php echo $dondur["urunid"];?>" <?php echo $cek["urun_altkat"]!=0 ? selected : null;?>><?php echo $dondur["urun_adi"];?></option>
		<?php } ?>
		</select>
		</td>
		<td></td>
		</tr>
		

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
		<input type="submit" value="Kaydet" class="form-submit"/>
			<input type="reset" value="temizle" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->


<?php
$uad			=$_POST["uad"];
$udesc			=$_POST["udesc"];
$ukeyw			=$_POST["ukeyw"];
$uek			=$_POST["uek"];
$uresim			=$_FILES["resimana"]["tmp_name"];
$yolver			="../yuklenenler/urunler/".$_FILES["resimana"]["name"];
$uicerik		=$_POST["uicerik"];
$ualt			=$_POST["ustmenu"];
$uicerik=str_replace("'","",$uicerik);
$uicerik=str_replace('"','',$uicerik);
			if($_POST){
	if(demo()!= 1){
				if($_FILES['resimana']["tmp_name"]==""){
						$ekle	=mysql_query("update urunler set 
							urun_adi='$uad',
							urun_desc='$udesc',
							uek='$uek',
							urun_keyw='$ukeyw',
							urun_icerik='$uicerik',
							urun_altkat='$ualt' where urunid='$id'");
						if($ekle){
							ok("Ürün başarıyla guncellendi.");
							git("admin.php?s=urunliste",3);
							
						}else{
							hata("Menü güncellenemedi.");
							git("admin.php?s=urunliste",3);
						
						}
				
				}else{
			
					if(($_FILES['resimana']['type'])== "image/gif"  or ($_FILES['resimana']['type'])== "image/jpeg" or ($_FILES['resimana']['type'])== "image/png" ){
						copy($uresim,$yolver);
						if ($yolver){
							$yolver=str_replace("../","/",$yolver);
						}
							$ekle	=mysql_query("update urunler set 
							urun_adi='$uad',
							urun_desc='$udesc',
							urun_keyw='$ukeyw',
							uek='$uek',
							urun_resim='$yolver',
							urun_icerik='$uicerik',
							urun_altkat='$ualt' where urunid='$id'");
						if($ekle){
							ok("Ürün başarıyla guncellendi.");
							git("admin.php?s=urunliste",3);
							
						}else{
							hata("Menü güncellenemedi.");
							git("admin.php?s=urunliste",3);
						
						}
					}else{
					hata("Dosya tipi resim olmalıdır");
					
					}
		}
	}
		}
?>

	</td>
	<td>



</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>