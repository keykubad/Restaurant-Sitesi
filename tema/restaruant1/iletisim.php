<?php
session_start();

// Güvenlik kodu için rastgele 2 sayı üretiliyor
    $sayi1 = rand(1,9);
    $sayi2 = rand(1,9);

// Bu sayıların toplamı alınıyor
    $toplam_sayi = $sayi1+$sayi2;

// Toplam sayı güvenlik kodu olarak sessiona atanıyor
    $_SESSION['koruma'] = "$toplam_sayi";
	$genel	=mysql_fetch_array(mysql_query("select * from ayarlar"));
	$adres	=$genel["site_adres"];
	$tel	=$genel["site_tel"];
	$fax	=$genel["site_fax"];
?>	
<!-- CONTENT -->
  <div id="content_holder" class="fixed">
    <div class="inner">
      <div class="breadcrumb"> <a href="<?php echo URL;?>">Anasayfa</a></div>
      <h2 class="heading-title"><span>iletişim</span></h2>
      
      <!-- LEFT COLUMN -->
      <div id="column-left">
        <div class="box">
          <h3 class="heading-title"><span>Bilgilerimiz</span></h3>
          <div class="box-content box-contact-details">
            <ul>
              <li class="address"> <span>Adres:</span><br />
                <?php echo $adres;?></li>
              <li class="phone"> <span>Telefon:</span><br />
                <?php echo $tel;?></li>
              <li class="fax"> <span>Fax:</span><br />
                <?php echo $fax;?></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END OF LEFT COLUMN -->
      
      <div id="content" class="content-column-kolonsol">
        <div class="content contacts-page">
          <div class="box-contacts fixed">
            <div class="box-content">
              <div class="stitched"></div>
			  <form method="post">
              <div class="form"> <span class="label">Adınız soyadınız:</span>
                <input type="text" value="" name="name"/>
                <br/>
                <br/>
                <span class="label">E-mail adresiniz:</span>
                <input type="text" value="" name="email"/>
				 <br/>
                <br/>
                <span class="label">Konu:</span>
                <input type="text" value="" name="konu"/>
                <br/>
                <br/>
                <span class="label">Mesajınız:</span>
                <textarea style="width: 98%;" rows="10" cols="40" name="mesaj"></textarea>
                <br/>
                <br/>
                <span class="label">Koruma önlemi:</span>
                 Güvenlik kodu: <?=$sayi1;?> + <?=$sayi2;?> = <input type="text" value="" name="koruma"/>
                <br/>

              </div>
              <div class="stitched"></div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="buttons">
            <div class="left"><input type="submit" style="background:#CCC;padding:7px;width:100px;" id="button-contact" value="Gönder"></div>
          </div>
		  </form>
        </div>
		<?php
			$ad		=$_POST["name"];
			$email	=$_POST["email"];
			$mesaj	=$_POST["mesaj"];
			$koruma	=$_POST["koruma"];
			$konu	=$_POST["konu"];
			
			if($_POST){
			if(($email=="") || ($ad=="") || ($mesaj=="") || ($konu=="") ){
					echo '<div style="background:#CCC;padding:10px;color:red;font-weight:bold;font-size:15px;text-align:center;">
						Boş alan bırakmayınız!!!</div>';
						exit();
				
			}else{
			 //Güvenlik kodu kontrol ediliyor
				if($_SESSION['koruma'] == $koruma) {
					echo '<center><span class="hata"><b>Hata:</b> Güvenlik kodunu hatalı girdiniz! Lütfen tekrar deneyiniz. <br><a href="javascript:history.go(-1)">Geri dön</a></center> ';
				}else{
				
					if(eposta($ad,$email,$konu,$mesaj)){
						echo '<div style="background:#CCC;padding:10px;color:green;font-weight:bold;font-size:15px;text-align:center;">
						Mailiniz başarıyla iletildi.En kısa sürede sizinle iletişime geçilecek.</div>';
					
					}else{
						echo '<div style="background:#CCC;padding:10px;color:red;font-weight:bold;font-size:15px;text-align:center;">
						Mailiniz başarıyla iletildi.En kısa sürede sizinle iletişime geçilecek.</div>';
					
					}
				}
			}
			}
		?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  

  <!-- END OF CONTENT --> 