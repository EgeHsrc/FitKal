<?php

function sidebar(){
	
	$sidebar = '
	            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Kullanıcı Paneli</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                  <li><a><i class="fa fa-line-chart"></i> Fitness Programları <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sirketler.php">Antrenman Listesi</a></li>
                      <li><a href="">Antrenman Analizleri</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-line-chart"></i> Bölgesel Çalışmalar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index2.php">Sırt</a></li>
                      <li><a href="index3.php">Göğüs</a></li>
                      <li><a href="index4.php">Karın</a></li>
                      <li><a href="index5.php">Ön Kol</a></li>
                      <li><a href="index6.php">Arka Kol</a></li>
                      <li><a href="index7.php">Omuz</a></li>
                      <li><a href="index8.php">Bacak</a></li>
                    </ul>
                  </li>
                  <li><a href="contacts.php"><i class="fa fa-user-plus"></i> Online Koçluk </a></li>
                  <li><a href="quiz.php"><i class="fa fa-file-text"></i> BodyQuiz </a></li>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
                  
                </ul>
              </div>
            </div>
	';
	
	echo $sidebar;
	
}

function adminSidebar(){
	
	$adminSidebar = '
	            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin Paneli</h3>
                <ul class="nav side-menu">
                  <li><a href="adminIndex.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                  <li><a><i class="fa fa-line-chart"></i> Yatırım İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">Yatırımcı Ekle</a></li>
                      <li><a href="sirketler.php">Şirketler</a></li>
                      <li><a href="form_advanced.html">Şirket Ekle</a></li>
                      <li><a href="form_validation.html">Yatırım Analizleri</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-location-arrow"></i> Konumsal Analizler </a></li>
                  <li><a href="quiz.php"><i class="fa fa-file-text"></i> BodyQuiz </a></li>
                  <li><a href="islemler.php"><i class="fa fa-check-square-o"></i> Kullanıcı İşlemleri </a></li>
                  <li><a><i class="fa fa-users"></i> Log Kayıtları </a></li>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
                </ul>
              </div>
            </div>
	';
	
	echo $adminSidebar;
	
}


?>