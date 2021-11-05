<?php
session_start();
if (isset($_SESSION['user_name'])) {

  // echo $_SESSION['username'];
  $link = new mysqli('localhost', 'root', '', 'sinhvien',) or die('failed');
  mysqli_query($link, 'SET NAMES UTF8');
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../image/logotlu.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>
    <header>
      <div class="container">
        <div id="logo">
          <div id="logoImg">
            <img src="../image/lgtlu.png " width="30px">
          </div>
          <a href="index.php">Quản lí sinh viên</a>
        </div>
        <div id="accountName">
          <p> Xin chào ! <?php echo $_SESSION['user_name'] ?></p>
          <a href="../sinhvien/dangxuatsv.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
        </div>
      </div>
    </header>
    <!--endheader-->
    <div class="body">
      <div class="container">
        <div id="menu">
          <ul>
            <li><a id="current" href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
            <li><a href="thongbaosv.php"><i class="fas fa-users"></i>Thông báo</a></li>
            <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
            <li><a href="sinhviensv.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
            <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
            <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
            <li><a href="contactsv.php"><i class="fas fa-address-book"></i>Contact</a></li>


          </ul>
          </br>
        </div>
        <div id="main-contain">
          <h2>Thông tin môn học</h2></br>
          <div id="thongtinslide">
            <div class="card-group">
              <div class="card">
                <img class="card-img-top" src="../image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Hệ điều hành</h5>
                  <p class="card-text">Số tiết : 45 tiết</p>
                  <p class="card-text">Thực hành : 5 buổi</p>
                  <!-- taget chuyển sang tab mới -->
                  <a href="https://drive.google.com/drive/folders/1Ex-3wsLMLTyNk6Al-J6_NSiTRxRsSxKG?usp=sharing" target="_blank"><button>Xem Slide</button></a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="../image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Công nghệ Web</h5>
                  <p class="card-text">Số tiết : 45 tiết</p>
                  <p class="card-text">Thực hành : 5 buổi</p>
                  <!-- taget chuyển sang tab mới -->
                  <a href="https://drive.google.com/drive/folders/1pdoyagQcErxNHfu60mIKwmUDEBx9tJq1" target="_blank"><button>Xem Slide</button></a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="../image/anhslide.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Thống kê ứng dụng</h5>
                  <p class="card-text">Số tiết : 45 tiết</p>
                  <p class="card-text">Thực hành : 5 buổi</p>
                  <!-- taget chuyển sang tab mới -->
                  <a href="https://drive.google.com/drive/folders/1pdoyagQcErxNHfu60mIKwmUDEBx9tJq1" target="_blank"><button>Xem Slide</button></a>
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
  header('location:login.php');
}
?>