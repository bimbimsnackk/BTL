<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien', '3306') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');

?>

	<head>
		<meta charset="utf-8">
		<title>Sinh viên</title>
		<link rel="stylesheet" href="../style/style.css">
		<link rel="stylesheet" href="../style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="../image/logotlu.png">
	</head>

	<body>
		<header>
			<div class="container">
				<div id="logo">
					<div id="logoImg">
						<img src="../image/logotlu.png " width="30px">
					</div>
					<a href="../index.php">Quản lí sinh viên</a>
				</div>
				<div id="accountName">

					<p> Xin chào ! <?php echo $_SESSION['username'] ?> </p>
					<a href="../dangxuat.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
				</div>
			</div>

		</header>
		<!--endheader-->
		<div class="body">
			<div class="container">
				<div id="menu">
					<ul>
						<li><a href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
						<li><a href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
						<li><a href="../sinhvien.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
						<li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
						<li><a id="current" href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
						<li><a href="../contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
					</ul>

				</div>
				<div id="main-contain">
					<h2>Nhập điểm</h2>

					<div class="form">

						</br></br>
						<form method="post">
							<table>
								<tr>
									<td>Họ tên </td>
									<td> <select name="ten">
											<?php
											$q = "SELECT * FROM sinhvien";
											$rs = mysqli_query($link, $q);
											if (mysqli_num_rows($rs) > 0) {
												while ($row = mysqli_fetch_assoc($rs)) {
													$svID = $row['sinhvienID'];

													$tensv = $row['name'];
													echo '<option value= "' . $svID . '">' . $tensv . '</option> ';
												}
											}
											?>
										</select>
									</td>
								</tr>

								<tr>
									<td>Mạng máy tính : </td>
									<td> <input type="text" name="ltud"></td>
								</tr>
								<tr>
									<td>Trí tuệ nhân tạo: </td>
									<td> <input type="text" name="ltvm"></td>
								</tr>
								<tr>
									<td>Hệ điều hành: </td>
									<td> <input type="text" name="htvt"></td>
								</tr>
								<tr>
									<td>Công nghệ web: </td>
									<td> <input type="text" name="htcm"></td>
								</tr>
								<tr>
									<td colspan=2>
										<input id="btnChapNhan" type="submit" value="Hoàn tất" name="themdiem" />
									</td>
								</tr>
							</table>

						</form>



						<?php


						if (isset($_POST['themdiem'])) { {

								if ($ten = $svdiemthi) {
									echo "sinh viên đã có điểm";
								} else {
									$ten = $_POST['ten'];
									$ltud = $_POST['ltud'];
									$ltvm = $_POST['ltvm'];
									$htvt = $_POST['htvt'];
									$htcm = $_POST['htcm'];
									$query = "INSERT INTO `diemthi`( `sinhvienID`,`ltud`, `ltvm`, `htvt`, `htcm`) VALUES('$ten','$ltud','$ltvm','$htvt','$htcm')";
									mysqli_query($link, $query) or die("thêm dữ liệu thất bại");
									header('location:../xemdiem.php');
								}
							}
						}
						?>
						<br>
						Chọn menu bên trái hoặc click vào <a href="../xemdiem.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại bảng điểm.
						<br>
						<br>


					</div>

				</div>

			</div>

		</div>
		<!--endbody-->
		<footer>
			<div class="container">
			</div>
		</footer>

	</body>

</html>
<?php
} else {
	header('location:../login.php');
}
?>