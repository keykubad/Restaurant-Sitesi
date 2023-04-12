<?php
$id			=$_GET["id"];
$cek		=mysql_fetch_array(mysql_query("select * from ekresimler where id='$id'"));

?>

<div id="page-heading"><h1>Ek resim düzenle</h1></div>
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
		<th>Ürün ek resim:</th>
		<td><input type="file" class="file_1" name="resimek" /></td>
	
		</tr>
		<tr>
		<th valign="top">Ek resim kategorisi:</th>
		<td>	
		<select  class="styledselect_form_1" name="kat">
		<?php 
				$ust	=mysql_query("select * from urunler order by urunid=".$cek["ustid"]."");
				while($don=mysql_fetch_array($ust)){
		?>
			<option value="<?php echo $don["urunid"];?>" selected><?php echo $don["urun_adi"];?></option>

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
$uresim			=$_FILES["resimek"]["tmp_name"];
$yolver			="../yuklenenler/urunler/".$_FILES["resimek"]["name"];
$kat			=$_POST["kat"];

			if($_POST){
		if(demo()!= 1){
				if($uresim==""){
					$ekle	=mysql_query("update ekresimler set 
					ustid='$kat' where id='$id'");
						if($ekle){
							ok("Ek resim başarıyla guncellendi.");
							git("admin.php?s=ekresimliste",3);
							
						}else{
							hata("Ek resim güncellenemedi.");
							git("admin.php?s=ekresimliste",3);
						
						}
			
				}else{
				if(($_FILES['resimek']['type'])== "image/gif" or ($_FILES['resimek']['type'])== "image/jpeg" or ($_FILES['resimek']['type'])== "image/png" ){
							copy($uresim,$yolver);
							if ($yolver){
								$yolver=str_replace("../","/",$yolver);
							}
					$ekle	=mysql_query("update ekresimler set 
					ustid='$kat',
					ekresim='$yolver' where id='$id'");
						if($ekle){
							ok("Ek resim başarıyla guncellendi.");
							git("admin.php?s=ekresimliste",3);
							
						}else{
							hata("Ek resim güncellenemedi.");
							git("admin.php?s=ekresimliste",3);
						
						}
					}else{

					echo hata("Tip resim degil yukleme yapılamaz.");
					exit();
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