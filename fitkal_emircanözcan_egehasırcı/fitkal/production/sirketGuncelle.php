<?php
session_start();
ob_start();
require "settings.php"; // require, include gibi belirtilen dosyayı kodun yazıldığı dosya içerisine eklemek için kullanılır. Ama include gibi uyarı vermek yerine hata verir ve kodun çalışmasını durdurur. require fonksiyonunun da kullanımı include fonksiyonu ile aynıdır.
require "sidebar.php";
require "navbar.php";
require "footer.php";
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.

$userID = $_SESSION["kullaniciID"];

if(!isset($_SESSION["kullaniciID"])) {
	header('Location: login.php');
}

if($_SESSION["kullaniciTipi"] != 2):
    header('Location: login.php');
endif;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/ico" />

    <title><?php echo $siteBasligi; ?></title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php
			
			ustSidebar();
						
			?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
			<?php
			
			adminSidebar();
			
			?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
		
		<?php
		
		navbar();
		
		?>
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->

          <div class="row">
			
			<div class="col-md-8 col-sm-8  ">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Şirket Bilgileri <br><small>Şirket verileri anlık olarak veritabanından çekilmektedir. </small></h2>
                    <div class="clearfix"></div>
                  </div>
					<div class="x_content">
					
					<?php
					
					$sirketID = $_GET["sirketID"]; #get ile sirketID değerini sirketler.php sayfasından aldık.
					
					// POST ile formdan aldığımızı yeni değerlerimizi bu kısımda tutuyoruz.
					
					$yeniSirketAdi = $_POST['yeniSirketAdi'];
					$yeniSermaye = $_POST['yeniSermaye'];
					$yeniPiyasaDegeri = $_POST['yeniPiyasaDegeri'];
					$yeniSirketTipi = $_POST['yeniSirketTipi'];
					$yeniSektor = $_POST['yeniSektor'];
					$yeniKurulusTarihi = $_POST['kurulusTarihi'];
									
					#eğer bir güncelleme işlemi olmayacaksa mevcut değerlerin ilgili alanlarda yazması lazım
					#get ile gelen sirketID'sine sahip değerlerin textbox ve selectbox'lar içinde
					#yazılmasını sağlıyoruz.
					
					$sirketInfo=mysqli_query($baglan,"SELECT * FROM sirketler WHERE sirketID=$sirketID");
					$readSirketInfo = mysqli_fetch_array($sirketInfo);

					if($_POST['updateSirket']){ #updatesirket butonuna basılırsa aşağıdaki işlemleri yap
												
						if(!$yeniSirketAdi || !$yeniSermaye || !$yeniPiyasaDegeri || !$yeniSirketTipi || !$yeniSektor || !$yeniKurulusTarihi ){
							echo "Lütfen boş alan bırakmayınız!<br>";
							
							#yukarıdaki hata alındığında boş değer girilip girilmediğini anlamak için değişkenleri bastırıyoruz.
							echo "$yeniSirketAdi<br>";
							echo "$yeniSermaye<br>";
							echo "$yeniPiyasaDegeri<br>";
							echo "$yeniSirketTipi<br>";
							echo "$yeniSektor<br>";
							echo "$yeniKurulusTarihi<br>";
							
						}else{
																											
							$updateSirketInfo = mysqli_query($baglan, "UPDATE sirketler SET sirketAdi='$yeniSirketAdi',sermaye='$yeniSermaye',piyasaDegeri='$yeniPiyasaDegeri',sirketTipi='$yeniSirketTipi',sektor='$yeniSektor',kurulusTarihi='$yeniKurulusTarihi' WHERE sirketID=$sirketID");
							
							if($updateSirketInfo){
								
								echo "Şirket bilgileri güncellendi!";
								header("Refresh:1"); 
								
								#update işleminden sonra güncel verilerin görülebilmesi amacıyla yenileme yapıyoruz.																
								
							}else{
								
								echo "Kullanıcı bilgileri güncellenirken bir sıkıntı oluştu!";
								
							}
							
						}
						
					}else{ #butona basılmadıysa şirketin güncel değerlerini alıp onları yazdırıyoruz.
						
						$sirketAdi = $readSirketInfo["sirketAdi"];
						$sermaye = $readSirketInfo["sermaye"];
						$piyasaDegeri = $readSirketInfo["piyasaDegeri"];
						$sirketTipi = $readSirketInfo["sirketTipi"];
						$sektor = $readSirketInfo["sektor"];
						$kurulusTarihi = $readSirketInfo["kurulusTarihi"];						
					}
					
					?>
					
						<br />
						<form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Şirket Adı
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="yeniSirketAdi" required="required" class="form-control" value="<?php echo $sirketAdi; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sermaye
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="yeniSermaye" required="required" class="form-control" value="<?php echo $sermaye; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Piyasa Değeri</label>
								<div class="col-md-6 col-sm-6 ">
									<input class="form-control" type="text" name="yeniPiyasaDegeri" value="<?php echo $piyasaDegeri; ?>">
								</div>
							</div>
							
							<div class="item form-group">
							<?php
							
							$seciliSirketQuery = mysqli_query($baglan, "SELECT sirketTipiID, sirketTipiAdi FROM sirkettipi, sirketler WHERE sirketler.sirketTipi = sirkettipi.sirketTipiID and sirketID = $sirketID");
							$readSeciliSirket = mysqli_fetch_array($seciliSirketQuery);
							
							?>
								<label class="col-form-label col-md-3 col-sm-3 label-align">Şirket Tipi</label>
								<div class="col-md-6 col-sm-6 ">									
									<select class="form-control" name="yeniSirketTipi">
									
										<option value="<?php echo $readSeciliSirket['sirketTipiID'];  ?>" selected><?php echo $readSeciliSirket['sirketTipiAdi']; ?></option>													
										<?php

										$sirketTipiAdi='sirketTipiAdi';
										$sirketTipiID='sirketTipiID';

										$sirketQuery = mysqli_query($baglan, "select * from sirkettipi");
										if(mysqli_num_rows($sirketQuery)!=0)	{

											while($readSirket = mysqli_fetch_array($sirketQuery))	{
												echo "<option value='$readSirket[$sirketTipiID]'>$readSirket[$sirketTipiAdi]</option>";
											}
										}

										?>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
							
							<?php
							
							$seciliSirketSektorQuery = mysqli_query($baglan, "SELECT sektorID, sektorAdi FROM sektorler, sirketler  WHERE sirketler.sektor = sektorler.sektorID AND sirketID = $sirketID");
							$readSeciliSirketSektor = mysqli_fetch_array($seciliSirketSektorQuery);
							
							?>
							
								<label class="col-form-label col-md-3 col-sm-3 label-align">Sektör</label>
								<div class="col-md-6 col-sm-6 " style="font-size: 16px;">									
									<select class="form-control" name="yeniSektor" id="sektor">
									
										<option value="<?php echo $readSeciliSirketSektor['sektorID'];  ?>" selected><?php echo $readSeciliSirketSektor['sektorAdi']; ?></option>													
										<?php

										$sektorAdi='sektorAdi';
										$sektorID='sektorID';

										$sektorQuery = mysqli_query($baglan, "select * from sektorler");
										if(mysqli_num_rows($sektorQuery)!=0)	{

											while($readSektor = mysqli_fetch_array($sektorQuery))	{
												echo "<option value='$readSektor[$sektorID]'>$readSektor[$sektorAdi]</option>";
											}
										}

										?>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Kuruluş Tarihi
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input class="date-picker form-control" name="kurulusTarihi" placeholder="dd-mm-yyyy" type="date" required="required" value="<?php echo $kurulusTarihi; ?>">
								</div>
							</div>
							
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">	
									<button class="btn btn-danger"><a href="sirketler.php" style="color:white;">Geri</a></button>
									<input type="submit" name="updateSirket" class="btn btn-success" value="Güncelle"> 
								</div>
							</div>

						</form>
					</div>
                </div>
              </div>
			  
			  <div class="col-md-4 col-sm-4  ">

			  </div>
          </div>
		  
		  <br />


        </div>
        <!-- /page content -->

        <!-- footer content -->
		
		<?php
		
		footer();
		
		?>
		
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script>
		$(document).ready(function() {
		$('#sektor').select2();
		});
	</script>
	
  </body>
</html>
<?php
ob_end_flush();
?>
