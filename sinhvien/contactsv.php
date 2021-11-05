<?php
session_start();
if (isset($_SESSION['user_name'])) {
    $link = new mysqli('localhost', 'root', '', 'sinhvien', '3306') or die('kết nối thất bại ');
    mysqli_query($link, 'SET NAMES UTF8');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Liên hệ</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
        <link rel="shortcut icon" href="../image/logotlu.png">
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

                    <p> Xin chào ! <?php echo $_SESSION['user_name'] ?> </p>
                    <a href="../sinhvien/dangxuatsv.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
                </div>
            </div>

        </header>
        <!--endheader-->
        <div class="body">
            <div class="container">
                <div id="menu">
                    <ul>
                        <li><a href="indexsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li><a href="thongbaosv.php"><i class="fas fa-users"></i>Thông báo</a></li>
                        <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                        <li><a href="sinhviensv.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                        <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                        <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                        <li><a id="current" href="contactsv.php"><i class="fas fa-address-book"></i>Liên hệ</a></li>
                    </ul>

                </div>
                <div id="main-contain">
                    <h2>Liên Hệ</h2></br>
                    <div id="contact-contain">
                        <br><big>
                            <span style="color:red">THUYLOI UNIVERSITY</span></big><br>
                        <h4 style="color: white ;">Address :175 Tay Son Street, Dong Da District</h4><br>
                        <h4 style="color: white ;">Tel: +84 - 24 - 38533083</h4></br>
                        <h4 style="color: white ;">Fax: +84 - 24 - 35636221</h4></br>
                        <h4 style="color: white ;">Email: ico@tlu.edu.vn</h4>
                    </div>
                </div>

            </div>

        </div>
        <!--endbody-->
        <footer>
            <div class="container">

        </footer>

    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>