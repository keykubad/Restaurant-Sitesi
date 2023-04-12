  <!-- CONTENT -->
  <div id="content_holder" class="fixed">
    <div class="inner">
      <div class="breadcrumb"> <a href="<?php echo URL;?>">Anasayfa</a>  <?php echo kattopvebaslik(1,0);?>  </div>
    

      <div class="product-filter">
        <div class="product-compare">Kategoriye ait (<?php echo kattopvebaslik(0,1);?>) sonuç bulundu</div>
 
  
      </div>
<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from urunler"));
$limit            	= 12;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 2;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='index.php?sayfa=kategoriliste'>İlk</a>";
        $sayfalamaYaz.= "<a href='index.php?sayfa=kategoriliste&s=$onceki'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='index.php?sayfa=kategoriliste&s=$i' class='page-numbers'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='index.php?sayfa=kategoriliste&s=$sonraki' class='next page-numbers'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='index.php?sayfa=kategoriliste&s=$sayfa_sayisi' class='next page-numbers'>Son</a>";

    }              
?>     

      
      <div id="content" class="content-column-left">
        <div class="cat_list fixed">
	<?php echo kategoriliste();?>
        <div class="pagination">
          <div class="links"> <?php echo $sayfalamaYaz;?> </div>
         
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- END OF CONTENT --> 