<!-- CONTENT -->
  <div id="content_holder" class="fixed">
    <div class="inner">
      <div class="breadcrumb"> <a href="<?php echo URL;?>">Anasayfaya dön</a></div>
      <h2 class="heading-title"><span>Tüm haberler</span></h2>
      <div id="content">
        <div class="cart-info">
<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from haberler"));
$limit            	= 2;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 2;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='tumhaberler.html'>İlk</a>";
        $sayfalamaYaz.= "<a href='tumhaberler-$onceki-sayfala.html'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='tumhaberler-$i-sayfala.html' class='page-numbers'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='tumhaberler-$sonraki-sayfala.html' class='next page-numbers'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='tumhaberler-$sayfa_sayisi-sayfala.html' class='next page-numbers'>Son</a>";

    }              
?>  
          <table>
            <thead>
              <tr>
                <td class="remove">Sıra</td>
                <td class="image">Haber başlık</td>
 
              </tr>
            </thead>
			 </table>
			 
            <tbody>
            <table>
        <?php echo haberliste();?>

         </table>
            </tbody>
     
        </div>
       
        </div>
     
     <div class="pagination">
          <div class="links"> <?php echo $sayfalamaYaz;?> </div>
         
        </div>
      </div>
    </div>
  <!-- END OF CONTENT --> 