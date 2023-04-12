<?php

		$cek=mysql_fetch_array(mysql_query("select * from altkisa"));


?>

<div id="page-heading"><h1>Alt kısa açıklama</h1></div>
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
		<form method="POST">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Alt kısa başlık:</th>
			<td><input type="text" class="inp-form" name="baslik" value="<?php echo $cek["alt_baslik"];?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Alt kısa içerik:</th>
			<td><textarea name="icerik" id="editor"/><?php echo $cek["alt_icerik"];?></textarea></td>
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
$baslik			=$_POST["baslik"];
$icerik			=$_POST["icerik"];


if($_POST){
	if(demo()!= 1){	
					$ekle	=mysql_query("update altkisa set
					alt_baslik='$baslik',
					alt_icerik='$icerik' where kid='1'");
					
						if($ekle){
							ok("Alt kısa açıklama başarıyla güncellendi.");
						}else{
							hata("Alt kısa açıklama güncellenemedi.");
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