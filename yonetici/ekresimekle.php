

<div id="page-heading"><h1>Ürün ekle</h1></div>
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
		<th>Ürün ana resim:</th>
		<td><input type="file" class="file_1" name="resimana" /></td>
	
		</tr>
		<tr>
		<th valign="top">Resim kategorisi?:</th>
		<td>	
		<select  class="styledselect_form_1" name="kat">
		<?php
		$kategoricek	=mysql_query("select * from urunler");
		while($don=mysql_fetch_array($kategoricek)){
		$idsi	=$don["urunid"];
		$urunad	=$don["urun_adi"];
		?>
			
			<option value="<?php echo $idsi;?>"><?php echo $urunad;?></option>
		<?php
		}
		?>
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
$urunkat		=$_POST["kat"];
$uresim			=$_FILES["resimana"]["tmp_name"];
$yolver			="../yuklenenler/urunler/".$_FILES["resimana"]["name"];
$uicerik		=$_POST["icerik"];
$uicerik=str_replace("'","",$uicerik);
$uicerik=str_replace('"','',$uicerik);

if($_POST){
	if(demo()!= 1){
			if(($_FILES['resimana']['type'])== "image/gif" or ($_FILES['resimana']['type'])== "image/jpeg" or ($_FILES['resimana']['type'])== "image/png" ){
				
			copy($uresim,$yolver);
				if ($yolver){
					$yolver=str_replace("../","/",$yolver);
				}
					$ekle	=mysql_query("insert into ekresimler 
					(ekresim,ustid) 
					values ('$yolver',
							'$urunkat') ");
						if($ekle){
							ok("Ek resim başarıyla eklendi.");
			
				
						}else{
							hata("Ek resim eklenemedi.");
			
						}
				}else{

				echo hata("Tip resim degil yukleme yapılamaz.");
				exit();
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