<!-- CONTENT -->
  <div id="content_holder" class="fixed">
    <div class="inner">
      <div id="content">
        <div class="box featured-box">
          <h2 class="heading-title"><span>Menüler</span></h2>
          <div class="box-content">
            <ul id="myRoundabout">
            <?php echo slider();?>
             
            </ul>
            <a href="#" class="previous_round">Previous</a> <a href="#" class="next_round">Next</a> </div>
        </div>
        <div class="box">
          <h2 class="heading-title"><span><?php echo duyurular(0,1);?></span></h2>
          <div class="box-content">
            <p><?php echo duyurular(1,0);?></p>
          </div>
        </div>
        <div class="box">
          <div class="banner">
            <div><a href="<?php echo kampanyalar(1,0,1,1);?>"><img src="<?php echo kampanyalar(0,1,1,1);?>"  /></a></div>
            <div><a href="<?php echo kampanyalar(1,1,1,0);?>"><img src="<?php echo kampanyalar(1,1,0,1);?>"  /></a></div>
          </div>
        </div>
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
  <!-- END OF CONTENT --> 