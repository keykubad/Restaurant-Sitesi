<?php

		$cek=mysql_fetch_array(mysql_query("select * from duyuru"));


?>

<div id="page-heading"><h1>Duyuru ekle</h1></div>
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
			<th valign="top">Duyuru başlık:</th>
			<td><input type="text" class="inp-form" name="dbaslik" value="<?php echo $cek["dbaslik"];?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Duyuru içerik:</th>
			<td><textarea name="dic" id="editor"/><?php echo $cek["dic"];?></textarea></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Kampanya resim sol:</th>
			<td><input type="text" class="inp-form" name="ksol" value="<?php echo $cek["kresim"];?>"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Kampanya link sol:</th>
			<td><input type="text" class="inp-form" name="ksollink" value="<?php echo $cek["klink"];?>"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Kampanya resim sağ:</th>
			<td><input type="text" class="inp-form" name="ksag" value="<?php echo $cek["kikiresim"];?>"/></td>
			<td></td>
		</tr>
				<tr>
			<th valign="top">Kampanya link sağ:</th>
			<td><input type="text" class="inp-form" name="ksaglink" value="<?php echo $cek["kikilink"];?>" /></td>
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
$baslik			=$_POST["dbaslik"];
$dic			=$_POST["dic"];
$ksolres		=$_POST["ksol"];
$ksollink		=$_POST["ksollink"];
$ksagres		=$_POST["ksag"];
$ksaglink		=$_POST["ksaglink"];

if($_POST){
	if(demo()!= 1){	
					$ekle	=mysql_query("update duyuru set
					dbaslik='$baslik',
					dic='$dic',
					kresim='$ksolres',
					klink='$ksollink',
					kikiresim='$ksagres',
					kikilink='$ksaglink' where did='1'");
					
						if($ekle){
							ok("Duyuru ve kampanya başarıyla güncellendi.");
						}else{
							hata("Duyuru ve kampanya güncellenemedi.");
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