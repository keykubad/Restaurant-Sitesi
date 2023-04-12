
  
   <!-- HEADER -->
  <div id="header">
    <div class="inner">
      <ul class="main_menu menu_left">

        <?php 
		echo ustmenuler(0,3);
		?>
	
  <li><a href="index.html">Anasayfa</a></li>
      </ul>
      
	 <div id="logo"><a href="index.html"><img src="<?php echo URL.TEMA_URL;?>/image/logo.png" width="217" height="141" alt="Spicylicious store" /></a></div>
      <ul class="main_menu menu_right">

		<?php 
		echo ustmenuler(3,6);
		?>
<li><a href="tumhaberler.html">Tüm haberler</a></li>,
<li><a href="iletisim.html">İletişim</a></li>
      </ul>
      <div class="menu">
        <ul id="topnav">

	<?php
			$sql_kategori=mysql_query("SELECT * FROM urunler order by urunid ASC");
			$kategori_list=array();
			$i=0;
			while($row_kategori=mysql_fetch_object($sql_kategori)){
			
				$kategori_list[$i]['urunid']=$row_kategori->urunid;
				$kategori_list[$i]['urun_adi']=$row_kategori->urun_adi;
				$kategori_list[$i]['urun_altkat']=$row_kategori->urun_altkat;
				$i++;
				
			}
				echo  SinirsizKategoriListele($kategori_list);
	?>

         
        </ul>
      </div>
    </div>
  </div>
  <!-- END OF HEADER --> 
    <!-- CONTENT -->
