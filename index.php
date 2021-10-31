<?php
session_start();
if (isset($_SESSION['username'])) {

  // echo $_SESSION['username'];
  $link = new mysqli('localhost', 'root', '', 'sinhvien', '3308') or die('failed');
  mysqli_query($link, 'SET NAMES UTF8');
  $query = 'SELECT * FROM tintuc';
  $result = mysqli_query($link, $query);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.css">
    <link rel="shortcut icon" href="image/logotlu.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>
    <header>
      <div class="container">
        <div id="logo">
          <div id="logoImg">
            <img src="image/lgtlu.png " width="30px">
          </div>
          <a href="index.php">Quản lí sinh viên</a>
        </div>
        <div id="accountName">
          <p> Xin chào ! </p>
          <a href="dangxuat.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
        </div>
      </div>
    </header>
    <!--endheader-->
    <div class="body">
      <div class="container">
        <div id="menu">
          <ul>
            <li><a id="current" href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
            <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
            <li><a href="sinhvien.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
            <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
            <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
            <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>


          </ul>
          </br>
        </div>
        <div id="main-contain">
          <h2>Thông tin</h2></br>
          <div id="thongtinslide">
            <div class="card-group">
              <div class="card">
                <img class="card-img-top" src="image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Hệ điều hành</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Công nghệ Web</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Thống kê ứng dụng</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>

  </html>

<?php

} else {
  header('location: login.php');
}
?>