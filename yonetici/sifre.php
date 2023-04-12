<?php

$genel		=mysql_fetch_array(mysql_query("select * from yonetici"));




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
			<th valign="top">Kullanıcı adı:</th>
			<td><input type="text" class="inp-form" name="kul" value="<?php echo $genel["kullanici"];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Şifre:</th>
			<td><input type="text" class="inp-form" name="sifre"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" value="<?php echo $genel["email"];?>"/></td>
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
$kul		=$_POST["kul"];
$sifre		=$_POST["sifre"];
$email		=$_POST["email"];
			if($_POST){
	if(demo()!= 1){
			if(!$sifre){
				$guncelle	=mysql_query("update yonetici set kullanici='$kul',email='$email' where id='1' ");
			}else{
				$guncelle	=mysql_query("update yonetici set kullanici='$kul',sifre='".md5($sifre)."',email='$email' where id='1' ");
			
			}
			if($guncelle){
				ok("Yonetici ayarları başarıyla güncellendi.");
				//git("admin.php?s=ayarlar",2);
				
			}else{
				hata("Yönetici ayarları güncellenemedi.");
			
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