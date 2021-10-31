<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien', '3308') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');
?>

	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="image/logotlu.png">
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

					<p> Xin chào ! <?php echo $_SESSION['username'] ?> </p>
					<a href="dangxuat.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				</div>
			</div>

		</header>
		<!--endheader-->
		<div class="body">
			<div class="container">
				<div id="menu">
					<ul>
						<li><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
						<li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
						<li><a href="sinhvien.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
						<li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
						<li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
						<li><a id="current" href="contact.php"><i class="fas fa-address-book"></i>Liên hệ</a></li>
					</ul>

				</div>
				<div id="main-contain">
					<h2>Liên Hệ</h2></br>
					<div id="contact-contain">
						<!-- <img src="image/logokhoa.png" alt="khoacndttt"/ width="100px" height="100px">  -->
						<br><big>
							<span style="color:white">THUYLOI UNIVERSITY</span></big><br>
							Address :175 Tay Son Street, Dong Da District<br>
							Tel: +84 - 24 - 38533083</br>
							Fax: +84 - 24 - 35636221</br>
							Email: ico@tlu.edu.vn
					</div>
				</div>

			</div>

		</div>
		<!--endbody-->
		<footer>
			<div class="container">
				<!-- Phiên bản beta -->
		</footer>

	</body>

</html>
<?php
} else {
	header('location:login.php');
}
?>