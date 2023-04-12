

<div id="page-heading"><h1>Alt menüler</h1></div>
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
			<th valign="top">Alt menü adı:</th>
			<td><input type="text" class="inp-form" name="menuad" /></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Alt menü description:</th>
			<td><input type="text" class="inp-form" name="desc" /></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Alt menü keywords:</th>
			<td><input type="text" class="inp-form" name="keyw" /></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Alt menü içerik:</th>
		<td><textarea  name="icerik" id="editor"></textarea></td>
		<td></td>
	</tr>
			<tr>
		<th valign="top">Üst menü seç:</th>
		<td>	
		<select  class="styledselect_form_1" name="idsi">
		<?php
			$cektir		=mysql_query("select * from menuler ");
			while($don=mysql_fetch_array($cektir)){
				$ustkat	=$don["menu_adi"];
				$ustid	=$don["id"];
		?>	

		
		
			<option value="<?php echo $ustid;?>"><?php echo $ustkat; ?></option>
		<?php } ?>
		</select>
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Alt menü aktifmi?:</th>
		<td>	
		<select  class="styledselect_form_1" name="aktif">
			<option value="1">Evet</option>
			<option value="2">Hayır</option>

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
$icerik			=$_POST["icerik"];
$aktif			=$_POST["aktif"];
$ustid			=$_POST["idsi"];
$keyw			=$_POST["keyw"];
$desc			=$_POST["desc"];
$icerik=str_replace("'","",$icerik);
$icerik=str_replace('"','',$icerik);
			if($_POST){
					if(demo()!= 1){
					$ekle	=mysql_query("insert into altmenuler 
					(altmenu_adi,altmenu_icerik,altmenu_aktif,ustid,altmenu_desc,altmenu_keyw) 
					values ('$menuad','$icerik','$aktif','$ustid','$desc','$keyw') ");
			if($ekle){
				ok("Menü başarıyla eklendi.");
			
				
			}else{
				hata("Menü eklenemedi.");
			
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