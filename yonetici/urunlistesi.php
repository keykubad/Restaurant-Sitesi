<div id="page-heading"><h1>Ürünleri Düzenle</h1></div>
<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
	
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ürün adı</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ürün resim</a></th>
					<th class="table-header-repeat line-left"><a href="">Alt kategori</a></th>
					<th class="table-header-repeat line-left"><a href="">Ayarlar</a></th>
				</tr>
<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['ss']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from urunler"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 1;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
		
        $sayfalamaYaz.= "<a href='admin.php?s=urunliste' class='page-far-left'></a>";
		
        $sayfalamaYaz.= "<a href='admin.php?s=urunliste&ss=$onceki' class='page-left'></a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
				
                   $sayfalamaYaz.= "<div id='page-info'>$i</div>";
				   
            }else{
                $sayfalamaYaz.= "<a href='admin.php?s=urunliste&ss=$i' id='page-info'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='admin.php?s=urunliste&ss=$sonraki' class='page-right'></a>";
        $sayfalamaYaz.= "<a href='admin.php?s=urunliste&ss=$sayfa_sayisi' class='page-far-right'></a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from urunler ORDER BY urunid desc LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){

	
?>

				<tr class="alternate-row">
			
					<td><?php echo $yazveri["urun_adi"];?></td>
					<td><center><img src="<?php echo "../".$yazveri["urun_resim"];?>" width="40" height="40"></center></td>
					<td><a href=""><?php echo $yazveri["urun_altkat"] == 0 ? Hiçbiri : $yazveri["urun_altkat"];?></a></td>
				
					<td class="options-width">
					<a href="admin.php?s=urunduzen&id=<?php echo $yazveri["urunid"];?>" title="duzenle" class="icon-1 info-tooltip"></a>
					<a href="admin.php?s=urunsil&id=<?php echo $yazveri["urunid"];?>" title="sil" class="icon-2 info-tooltip"></a>

					</td>
				</tr>
<?php } ?>			
				</table>
				<!--  end product-table................................... --> 
				</form>

			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
			<?php echo $sayfalamaYaz;?>

			</td>

			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>