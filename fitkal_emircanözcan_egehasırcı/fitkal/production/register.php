<?php

require "settings.php";
include_once 'connection.php';
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $siteBasligi; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/ico" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img style="position:relative; left:17px; top:15px; width: 66%;" src="images/trend.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Kayıt Ekranı</h4>
							
							<?php
							
							$kullaniciAdi = $_POST["kullaniciAdi"];
							$kullaniciSoyadi = $_POST["kullaniciSoyadi"];
							$nickname = $_POST["kullaniciAdi"];
							$email = $_POST["email"];
							$sifre = $_POST["sifre"];
							$kullaniciTipi = $_POST["kullaniciTipi"];
							$sifre_md5 = md5($sifre);
							$sifre2 = $_POST["sifre2"];
							$dogumTarihi = $_POST["dogumTarihi"];
							$boy = $_POST["boy;"];
							$kilo = $_POST["kilo;"];
							$meslek = $_POST["meslek"];
							$cinsiyet = $_POST["cinsiyet"];
							$katilimTarihi = date("Y-m-d");
							
							/*echo "$kullaniciAdi <br>";
							echo "$kullaniciSoyadi <br>";
							echo "$nickname <br>";
							echo "$email <br>";
							echo "$sifre <br>";
							echo "$sifre2 <br>";
							echo "$dogumTarihi <br>";
							echo "$meslek <br>";
							echo "$cinsiyet <br>";*/

							
							if($_POST){
								
								if(!$kullaniciAdi || !$kullaniciSoyadi || !$nickname || !$email || !$sifre || !$sifre2 || !$dogumTarihi || !$boy || $kilo || !$meslek || !$cinsiyet ){
									echo "Lütfen boş alan bırakmayınız.";
								}else{
									if($sifre != $sifre2){
										echo "Girdiğiniz şifreler uyuşmuyor.";
									}else{
										
										$uyeEkle = mysqli_query($baglan, "
										INSERT INTO kullanicilar (kullaniciTipi, kullaniciAdi, kullaniciSoyadi, email, nickName, password, dogumTarihi, boy, kilo, meslekID, cinsiyet, katilimTarihi) 
										VALUES ('$kullaniciTipi','$kullaniciAdi','$kullaniciSoyadi','$email','$nickname','$sifre_md5','$dogumTarihi','$boy', '$kilo', '$meslek','$cinsiyet','$katilimTarihi')");
										
										if($uyeEkle){
											echo "Üyeliğiniz oluşturuldu";
											header('Location:login.php');
										}else{
											echo "Üyeliğiniz oluşturulamadı";
										}
									}
									
								}
								
							}
							
							?>
							
							
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">İsim</label>
									<input type="text" class="form-control" name="kullaniciAdi" required autofocus>
								</div>
								
								<div class="form-group">
									<label for="name">Soyisim</label>
									<input type="text" class="form-control" name="kullaniciSoyadi" required autofocus>
								</div>
								
								<div class="form-group">
									<label for="name">Kullanıcı Adı</label>
									<input type="text" class="form-control" name="nickname" required autofocus>
								</div>

								<div class="form-group">
									<label for="email">E-Mail</label>
									<input type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Mail adresi geçersiz
									</div>
								</div>

								<div class="form-group">
									<label for="password">Şifre</label>
									<input type="password" class="form-control" name="sifre" required data-eye>
									<div class="invalid-feedback">
										Şifre Gereklidir
									</div>
								</div>
								
								<div class="form-group">
									<label for="password">Şifre (Tekrar)</label>
									<input type="password" class="form-control" name="sifre2" required data-eye>
									<div class="invalid-feedback">
										Şifre Gereklidir
									</div>
								</div>
								
								<div class="form-group">
									<label for="name">Doğum Tarihi</label>
									<input type="date" class="form-control" name="dogumTarihi" required autofocus>
								</div>

								<div class="form-group">
									<label for="name">Boy</label>
									<input type="text" class="form-control" name="boy" required autofocus>
								</div>

								<div class="form-group">
									<label for="name">Kilo</label>
									<input type="text" class="form-control" name="kilo" required autofocus>
								</div>
								
								<div class="form-group">
									<label for="name">Kullanıcı Tipi</label>
									<select class="form-control" name="kullaniciTipi">
									  <option value="2" selected>Admin</option>
									  <option value="1" selected>Kullanıcı</option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="name">Meslek</label>									
									<select class="form-control" name="meslek" id="meslek">
									
										<option>Seçiniz..</option>													
										<?php

										$meslekAdi='meslekAdi';
										$meslekID='meslekID';

										$meslekQuery = mysqli_query($baglan, "select * from meslekler");
										if(mysqli_num_rows($meslekQuery)!=0)	{

											while($readMeslek = mysqli_fetch_array($meslekQuery))	{
												echo "<option value='$readMeslek[$meslekID]'>$readMeslek[$meslekAdi]</option>";
											}
										}

										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="name">Cinsiyet</label>
									<select class="form-control" name="cinsiyet">
										<option>Seçiniz..</option>													
										<?php

										$genderName='cinsiyetAdi';
										$genderID='cinsiyetID';

										$genderQuery = mysqli_query($baglan, "select * from cinsiyet");
										if(mysqli_num_rows($genderQuery)!=0)	{

											while($readGender = mysqli_fetch_array($genderQuery))	{
												echo "<option value='$readGender[$genderID]'>$readGender[$genderName]</option>";
											}
										}

										?>
									</select>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Kayıt Ol
									</button>
								</div>
								<div class="mt-4 text-center">
									<a href="index.php">Giriş Sayfası</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2022 &mdash; YATBİS 
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script>
		$(document).ready(function() {
		$('#meslek').select2();
		});
	</script>
</body>
</html>