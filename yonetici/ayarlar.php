<?php

$genel		=mysql_fetch_array(mysql_query("select * from ayarlar"));




?>

<div id="page-heading"><h1>Genel Ayarlar</h1></div>
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
			<th valign="top">Site adı (title):</th>
			<td><input type="text" class="inp-form" name="title" value="<?php echo $genel["site_title"];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Site url:</th>
			<td><input type="text" class="inp-form" name="url" value="<?php echo $genel["site_url"];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Site adres:</th>
			<td><input type="text" class="inp-form" name="adres" value="<?php echo $genel["site_adres"];?>"/></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Site tel:</th>
			<td><input type="text" class="inp-form" name="tel" value="<?php echo $genel["site_tel"];?>"/></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Site fax:</th>
			<td><input type="text" class="inp-form" name="fax" value="<?php echo $genel["site_fax"];?>"/></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Site description:</th>
			<td><input type="text" class="inp-form" name="desc" value="<?php echo $genel["site_desc"];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Site keywords:</th>
			<td><input type="text" class="inp-form" name="keyw" value="<?php echo $genel["site_keyw"];?>"/></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Site tema:</th>
		<td>	
		<select  class="styledselect_form_1" name="tema">
			<?php klasor_listele("../tema");?>
		</select>
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Site durumu:</th>
		<td>	
		<select  class="styledselect_form_1" name="durum">
			<option value="1" <?php echo $genel["site_durum"]== 1 ? selected : null;?>>Açık</option>
			<option value="2" <?php echo $genel["site_durum"]== 2 ? selected : null;?>>Kapalı</option>

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
$title		=$_POST["title"];
$desc		=$_POST["desc"];
$keyw		=$_POST["keyw"];
$durum		=$_POST["durum"];
$tema		=$_POST["tema"];
$adres		=$_POST["adres"];
$tel		=$_POST["tel"];
$fax		=$_POST["fax"];
$url		=$_POST["url"];
			if($_POST){
				if(demo()!= 1){
		$guncelle	=mysql_query("update ayarlar set 
		site_title='$title',site_desc='$desc',site_keyw='$keyw',site_durum='$durum',
		site_tema='$tema',
		site_adres='$adres',
		site_tel='$tel',
		site_fax='$fax',
		site_url='$url' where id='1' ");
			if($guncelle){
				ok("Site ayarları başarıyla güncellendi.");
				git("admin.php?s=ayarlar",2);
				
			}else{
				hata("Site ayarları güncellenemedi.");
			
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