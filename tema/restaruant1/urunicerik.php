  <!-- CONTENT -->
  <div id="content_holder" class="fixed">
    <div class="inner">
      <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="category.html">Pizza</a> » Pizza Delicioso </div>
      <h2 class="heading-title"><span><?php echo urunicerik(0,1,1,1);?></span></h2>
      
      <!-- PRODUCT INFO -->
      <div class="product-info fixed">
        <div class="left">
          <div class="image"> <a href="<?php echo URL.urunicerik(1,1,1,0);?>" class="cloud-zoom" id="zoom1" rel="adjustX: 5, adjustY:0, zoomWidth:550, zoomHeight:400, showTitle: false"> <img src="<?php echo URL.urunicerik(1,1,1,0);?>" width="402" height="402" title="<?php echo urunicerik(0,1,1,1);?>" /></a> <span class="pricetag"><?php echo urunicerik(1,1,0,1);?></span> </div>
          <div class="image-additional">
            <div class="image_car_holder">
              <ul class="jcarousel-skin-opencart">
              
              <?php echo ekresim();?>
              </ul>
            </div>
            <script type="text/javascript"><!--
      $('.image-additional ul').jcarousel({
	  vertical: false,
	  visible: 4,
	  scroll: 1
      });
      //--></script> 
          </div>
        </div>
        <div class="right">
           <span>
	<?php echo urunicerik(1,0,1,1);?>
		  </span> <br/>
           
       
	
        <div class="clear"></div>
      </div>
      <!-- END OF PRODUCT INFO -->
      
      <div id="content">


      <div class="box">
          <h2 class="heading-title"><span>Son Menüler</span></h2>
          <div class="box-content">
            <div class="box-product fixed">
          <?php echo sonurunler(0,8); ?>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
  <!-- END OF CONTENT --> 