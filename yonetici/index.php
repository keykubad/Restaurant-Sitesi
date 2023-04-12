
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kurumsal Firma Yönetim Paneli Giriş</title>
<link href="css/giris.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post">
<div id="site">
<div id="sitebosluk"></div>
<div id="ortainput">
<div id="kullaniciadi"><label>Kullanıcı Adı</label>
<div id="kullaniciadiinput"><input name="kadi" size="20px" type="text" /></div>
</div>

<div id="sifre">
<label>Şifre</label>
<div id="sifreinput"><input type="password" name="sifre" size="20px" /></div>
</div>
<div id="alt">

<div id="girisyap" style="margin-left:450px;"><input type="submit" /></div>
</div>
</div>

          
	
    <?php
session_start();
		require_once("../ayar.php");
		require_once("fonksiyon.php");
				$kad	= $_POST["kadi"];
				$sif	= md5($_POST["sifre"]);
				if($_POST){
				if(($kad=="") or ($sif=="")){
				echo "<script>alert('Kullanıcı adı veya şifreyi boş bırakmayınız..')</script>";
		

				}else{

					$bagla	=	mysql_fetch_array(mysql_query("select * from yonetici where kullanici='".$kad."' and sifre='".$sif."'"));
					if(mysql_affected_rows()){
						$_SESSION["login"] 		= true;
						$_SESSION["user"]		= $kad;
						$_SESSION["password"]	= $sif;
						git("admin.php",2);
					}else{
						echo "<script>alert('Kullanıcı adı veya şifre yanlış..')</script>";
					}
					
				
				}
				}
?>
</div>
</form>
</body>
</html>