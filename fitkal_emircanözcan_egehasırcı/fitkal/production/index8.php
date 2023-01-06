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

if($_SESSION["kullaniciTipi"] != 1):
    header('Location: login.php');
endif;

ob_end_flush();

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php
			
			ustSidebar();
			
			echo $userID;
			
			?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
			<?php
			
			sidebar();
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
          <div class="row">
          
          <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasarım Kodlama</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
        }
 
        html{
            font-size:62.5%;/*1rem = 10px*/
        }
 
        body,h1,h2,ul{
            margin:0;
            padding:0;
            
        }
        ul{
            list-style: none;
        }
 
        /*******************/
        body{
            font-family: 'Nunito Sans', sans-serif;
        }
        .arkaplan{
            background-color: #25373D;
        }
        .kapsayici{
            width: 960px;
            margin:0 auto;
        }
        
        .ust{
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 200px;
        }
 
        .ust .logo{
            text-align: center;
            color:#fff;
        }
        .ust .logo h1{
            font-size:4rem;
            letter-spacing: .5rem;
        }
 
        .ust .logo h1::first-letter{
            color:#FCB941;
        }
 
        .ust .logo h1:hover::first-letter{
            background-color: #FCB941;
            color:#25373D;
        }
 
        .ust .logo h2{
            font-size:2.4rem;
        }
 
        
 
        
 
        .ust .menu ul{
            display: flex;
        }
        .ust .menu ul li{
            margin:0 1rem;
        }
 
        .ust .menu ul a{
            color:#fff;
            text-decoration: none;
            font-size:1.8rem;
            padding:0 2rem;
        }
        .ust .menu ul a:hover{
            color:#FCB941;
        }
 
        .orta .bolum1{
            margin-top:20px;
            border:10px solid #25373D;
            padding:20px;
        }
 
        .orta .bolum1 img{
            display: block;
            width: 100%;
        }
 
        .orta .bolum2{
            margin-top:20px;
            display: flex;
            justify-content: space-between;
        }
        .orta .bolum2 .kutu{
            flex-basis: 290px;
        }
 
        .orta .bolum2 .kutu h2{
            font-size: 2rem;
        }
 
        .orta .bolum2 .kutu p{
            font-size: 1.6rem;
        }
 
        .orta .bolum3{
            display: flex;
            justify-content: space-between;
            gap:20px;
        }
 
        .orta .bolum3 h1{
            font-size:2.5rem;
        }
 
        .orta .bolum3 p{
            font-size:1.6rem;
        }
 
        .alt{
            margin-top:20px;
            padding:20px 0;
            display: flex;
            gap:20px;
        }
        .alt .baglanti{
            flex-grow: 1;
        }
 
        .alt .baglanti ul li{
            border-bottom:dotted 1px #FCB941;
            margin:5px 0;
        }
 
        .alt .baglanti a{
            font-size:1.6rem;
            text-decoration: none;
            color:#FCB941;
        }
 
 
        .cizgi{
            border-top:dotted 1px #FCB941;
            margin:20px 0;
        }
 
        .alt-kenar-10{
            border-bottom:10px solid #FCB941;
        }
        
    </style>
</head>
<body>
 
   
    <!-- sayfa ortası-->
    <div class="orta kapsayici">
        <div class="bolum1">
            <img src="https://picsum.photos/960/360" alt="Kapak resmi">
        </div>
        <div class="bolum2">
            <div class="kutu">
                <img src="https://picsum.photos/290/180" alt="">
                <h2>Lorem Ipsum</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit temporibus praesentium iure </p>
            </div>
            <div class="kutu">
                <img src="https://picsum.photos/290/180" alt="">
                <h2>Lorem Ipsum</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit temporibus praesentium iure </p>
            </div>
            <div class="kutu">
                <img src="https://picsum.photos/290/180" alt="">
                <h2>Lorem Ipsum</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit temporibus praesentium iure </p>
            </div>
 
 
        </div>
        <div class="cizgi"></div>
        <div class="bolum3">
            <div class="icerik">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum atque ullam provident, adipisci quaerat delectus repudiandae voluptatem quo odit consequuntur modi. Ipsa sint quam corrupti vitae dolorem dicta, quia corporis.</p>
                <p>Esse, nulla neque soluta ipsa, voluptates aliquid tempora sequi nisi mollitia quod porro ipsum ratione dolores, ad ullam. Culpa numquam animi dolor architecto maiores ad saepe soluta minima eum totam.</p>
            </div>
            <div class="gorsel">
                <img src="https://picsum.photos/450/250" alt="İlgili ürün bilgisi">
            </div>
        </div>
    </div>
 
   
</body>
</html>


 

          
        </div>
          <!-- /top tiles -->

         
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
	
	<script type="text/javascript">
    var dom = document.getElementById('container');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};
    
    var option;

    option = {
  xAxis: {
    type: 'category',
    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [120, 200, 150, 80, 70, 110, 130],
      type: 'bar',
      showBackground: true,
      backgroundStyle: {
        color: 'rgba(180, 180, 180, 0.2)'
      }
    }
  ]
};


//yeni chart

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
	
	
	var dom = document.getElementById('bar');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};
    
    var option;

    option = {
  title: {
    text: 'Cinsiyete Göre Dağılım',
    left: 'center'
  },
  tooltip: {
    trigger: 'item'
  },
  legend: {
    orient: 'vertical',
    left: 'left'
  },
  series: [
    {
      name: 'Access From',
      type: 'pie',
      radius: '50%',
      data: [
        { value: <?php echo $kadinSayisi; ?>, name: 'Kadın' },
        { value: <?php echo $erkekSayisi; ?>, name: 'Erkek' },
        { value: <?php echo $belirsizSayisi; ?>, name: 'Belirsiz' }
      ],
      emphasis: {
        itemStyle: {
          shadowBlur: 10,
          shadowOffsetX: 0,
          shadowColor: 'rgba(0, 0, 0, 0.5)'
        }
      }
    }
  ]
};

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  </script>
	
  </body>
</html>
