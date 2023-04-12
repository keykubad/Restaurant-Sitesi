<?php
$id			=$_GET["id"];
$cek		=mysql_fetch_array(mysql_query("select * from slider where ids='$id'"));


?>

<div id="page-heading"><h1>Slider düzenle</h1></div>
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
			<th valign="top">Slider başlık:</th>
			<td><input type="text" class="inp-form" name="baslik" value="<?php echo $cek["slider_baslik"];?>" /></td>
			<td></td>
		</tr>
	<tr>
			<th valign="top">Slider link:</th>
			<td><input type="text" class="inp-form" name="link" value="<?php echo $cek["slider_link"];?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Slider ek bilgi:</th>
			<td><input type="text" class="inp-form" name="ekbilgi" value="<?php echo $cek["slider_ek"];?>" /></td>
			<td></td>
		</tr>
		<tr>
		<th>Slider resim:</th>
		<td><input type="file" class="file_1" name="resim" /></td>

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
$link			=$_POST["link"];
$ekbilgi		=$_POST["ekbilgi"];
$uresim			=$_FILES["resim"]["tmp_name"];
$yolver			="../yuklenenler/slider/".$_FILES["resim"]["name"];

			if($_POST){
	if(demo()!= 1){
				if($_FILES['resim']["tmp_name"]==""){
						$ekle	=mysql_query("update slider set 
							slider_baslik='$baslik',
							slider_link='$link',
							slider_ek='$ekbilgi' where ids='$id'");
						if($ekle){
							ok("Slider başarıyla guncellendi.");
							git("admin.php?s=sliderliste",3);
							
						}else{
							hata("Slider güncellenemedi.");
							git("admin.php?s=sliderliste",3);
						
						}
				
				}else{
			
					if(($_FILES['resim']['type'])== "image/gif"  or ($_FILES['resim']['type'])== "image/jpeg" or ($_FILES['resim']['type'])== "image/png" ){
						copy($uresim,$yolver);
						if ($yolver){
							$yolver=str_replace("../","/",$yolver);
						}
							$ekle	=mysql_query("update slider set 
							slider_baslik='$baslik',
							slider_link='$link',
							slider_ek='$ekbilgi',
							slider_resim='$yolver' where ids='$id'");
						if($ekle){
							ok("Slider başarıyla guncellendi.");
							git("admin.php?s=sliderliste",3);
							
						}else{
							hata("Slider güncellenemedi.");
							git("admin.php?s=sliderliste",3);
						
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