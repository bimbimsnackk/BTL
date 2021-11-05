<!DOCTYPE html>
<html>
<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'sinhvien', "3306") or die('kết nối thất bại ');
mysqli_query($link, 'SET NAMES UTF8');
$query = 'SELECT * FROM giangvien ';
$result = mysqli_query($link, $query);
if (isset($_SESSION['user_name'])) {	

?>

	<head>
		<meta charset="utf-8">
		<title>Giảng viên </title>
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
			<div class="ct">
				<div class="container">
					<div id="menu">
						<ul>
							<li><a href="indexsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
							<li><a href="thongbaosv.php"><i class="fas fa-users"></i>Thông báo</a></li>
							<li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
							<li><a href="sinhviensv.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
							<li><a id="current" href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
							<li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
							<li><a href="contactsv.php"><i class="fas fa-address-book"></i>Liên hệ</a></li>
						</ul>

					</div>
					<div id="main-contain">
						<h2>GIẢNG VIÊN KHOA</h2>
						<?php
						if (mysqli_num_rows($result) > 0) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;
								$maso = $row['masoGV'];
								$hotenGV = $row['hoten'];
								$trinhdoGV = $row['trinhdo'];
								$chuyenmonGV = $row['chuyenmon'];
								$email = $row['email'];
								$sdt = $row['sdt'];
								$avt = $row['link_avt_GV'];
								echo '<div class="infGiangvien">
																	<div>
																	<a href="thongtingiangviensv.php?id=' . $maso . '"><img src="../image/';

								if ($avt == '') {
									echo 'test.jpg';
								} else {
									echo $avt;
								}

								echo '" width="120px" height = "120px">  </a>
																	</div>
																<div>
																';
								echo "<b>$hotenGV</b><br>";
								echo "<i><small>$maso</small></i><br>";
								echo "<i><small>$trinhdoGV</small></i><br>";
								echo "<i><small>email: $email</small></i><br>";
								echo "</div>";
								echo "</div>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<!--endbody-->
	</body>

</html>
<?php
} else {
	header('location:dangxuat.php');
}
?>