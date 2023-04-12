<?php
$id			=$_GET["id"];
$cek		=mysql_fetch_array(mysql_query("select * from menuler where id='$id'"));

?>

<div id="page-heading"><h1>Sabit menü düzenle</h1></div>
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
		<form method="post">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Menü adı:</th>
			<td><input type="text" class="inp-form" name="menuad" value="<?php echo $cek["menu_adi"];?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Menü sıra:</th>
			<td><input type="text" class="inp-form" name="menusira" value="<?php echo $cek["menu_sira"];?>"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Menü description:</th>
			<td><input type="text" class="inp-form" name="desc" value="<?php echo $cek["menu_desc"];?>"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Menü keywords:</th>
			<td><input type="text" class="inp-form" name="keyw" value="<?php echo $cek["menu_keyw"];?>"/></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Menü içerik:</th>
		<td><textarea  name="icerik" id="editor"><?php echo $cek["menu_icerik"];?></textarea></td>
		<td></td>
	</tr>
		<tr>
		<th valign="top">Menü aktifmi?:</th>
		<td>	
		<select  class="styledselect_form_1" name="aktif">
			<option value="1" <?php echo $cek["menu_aktif"] == 1 ? selected : null;?>>Evet</option>
			<option value="2" <?php echo $cek["menu_aktif"] == 2 ? selected : null;?>>Hayır</option>

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
$menuad			=$_POST["menuad"];
$menusira		=$_POST["menusira"];
$icerik			=$_POST["icerik"];
$aktif			=$_POST["aktif"];
$desc			=$_POST["desc"];
$keyw			=$_POST["keyw"];
$icerik=str_replace("'","",$icerik);
			if($_POST){
	if(demo()!= 1){
					$ekle	=mysql_query("update menuler set 
					menu_adi='$menuad',
					menu_sira='$menusira',
					menu_icerik='$icerik',
					menu_aktif='$aktif',
					menu_desc='$desc',
					menu_keyw='$keyw' where id='$id'");
			if($ekle){
				ok("Menü başarıyla guncellendi.");
				git("admin.php?s=menuduzenle",3);
				
			}else{
				hata("Menü güncellenemedi.");
				git("admin.php?s=menuduzeni",3);
			
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