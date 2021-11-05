<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien', '3306') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM sinhvien INNER JOIN diemthi ON sinhvien.sinhvienID = diemthi.sinhvienID WHERE sinhvien.sinhvienID = "' . $_GET['id'] . '"';

	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($r = mysqli_fetch_assoc($result)) {
			$i++;
			$sinhvienID = $r['sinhvienID'];
			$ten = $r['name'];
			$ttnt = $r['ttnt'];
			$hdh = $r['hdh'];
			$cnw = $r['cnw'];
			$tkud = $r['tkud'];
		}
	}

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
					<h2>Sửa điểm</h2>

					<div class="form">

						</br></br>
						<form method="post">
							<table>
								<tr>
									<td>Họ tên </td>
									<td> <?php echo $ten; ?>
									</td>
								</tr>

								<tr>
									<td>Trí tuệ nhân tạo </td>
									<td> <input type="text" name="ttnt" value="<?php echo $ttnt; ?>"></td>
								</tr>
								<tr>
									<td>Hệ điều hành </td>
									<td> <input type="text" name="hdh" value="<?php echo $hdh; ?>"></td>
								</tr>
								<tr>
									<td>Công nghệ web</td>
									<td> <input type="text" name="cnw" value="<?php echo $cnw; ?>"></td>
								</tr>
								<tr>
									<td>Thống kê ứng dụng </td>
									<td> <input type="text" name="tkud" value="<?php echo $tkud; ?>"></td>
								</tr>
								<tr>
									<td colspan=2>
										<input id="btnChapNhan" type="submit" value="Hoàn tất" name="suadiem" />
									</td>
								</tr>
							</table>

						</form>



						<?php


						if (isset($_POST['suadiem'])) { {

								if ($ten = $svdiemthi) {
									echo "sinh viên đã có điểm";
								} else {
									$id = $_GET['id'];
									$ten = $_POST['ten'];
									$ttnt = $_POST['ttnt'];
									$hdh = $_POST['hdh'];
									$cnw = $_POST['cnw'];
									$tkud = $_POST['tkud'];
									$query = "UPDATE  diemthi SET ttnt = '$ttnt',  hdh = '$hdh',  cnw ='$cnw', tkud = '$tkud' WHERE sinhvienID = '$id'";
									mysqli_query($link, $query) or die("sửa dữ liệu thất bại");
									header('location:../suadiem.php');
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