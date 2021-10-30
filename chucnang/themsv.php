<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');			
?>

    <head>
        <meta charset="utf-8">
        <title>Sinh viên</title>
        <link rel = "stylesheet" href = "../style/style.css">
        <link rel = "stylesheet" href = "../style/fontawesome/css/all.css">
		<link rel = "shortcut icon" href = "../image/logokhoa.ico">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="../image/logokhoa.png " width="30px">
					  </div>
					<a href="../index.php">STUDENT MANAGER</a>
				 </div>
				<div id="accountName">
					
					<p> Xin chào ! </p>
					<a href="../dangxuat.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                     <li><a   href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a id="current" href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="../contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Sinh Viên</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin sinh viên : </b> </span> </br>
					(Chú ý điền đủ thông tin)
				
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <input type="text" name="ten" autofocus></td>
							</tr>
							
							<tr>
								<td>Ngày sinh </td>
								<td> <input type="date" name="ngaysinh"></td>
							</tr>
							<tr>
								<td>Số điện thoại </td>
								<td> <input type="text" name="sdt"></td>
							</tr>
							<tr>
								<td>Quê quán </td>
								<td> <input type="text" name="quequan"></td>
							</tr>
							<tr>
								<td>Chọn Lớp  </td>
								<td> <select name="lop">
									 <?php
											 $q = "SELECT * FROM lophoc";
											 $rs = mysqli_query($link, $q);
											 if(mysqli_num_rows($rs)>0)
											 {
												 $i =0;
												 while ($row  = mysqli_fetch_assoc($rs))
												 {
													 $i++;
													 $lopID = $row['lopID'];
													 $tenlop = $row['tenlop'];
	
													// echo $tenlop;
													echo"<option value= '$lopID'>$tenlop</option>";
												 }
											 }
									 ?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="them"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
					
						
						if(isset($_POST['them'])){
							if(empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['quequan'])) {echo'<p style="color:red;font-weight:bold; "> Bạn chưa nhập thông tin đầy đủ !</p> ';}
							else
							{ 
								$hotenSV = $_POST['ten'];
								$ngaySinh = $_POST['ngaysinh'];
								$lopID = $_POST['lop'];
								$sDt = $_POST['sdt'];
								$queQuan = $_POST['quequan'];
								$query = "INSERT INTO `sinhvien`( `name`, `lopID`,`birthday`, `phonenumber`, `address`) VALUES('$hotenSV','$lopID','$ngaySinh','$sDt','$queQuan')";
								mysqli_query($link,$query) or die("thêm dữ liệu thất bại");
								header('location:../sinhvien.php');
							}
						}
					?>
					<br>
					Chọn menu bên trái hoặc click vào <a href="../sinhvien.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại danh sách sinh viên.
					<br>
					<br>
					
				
				</div>
				
              </div>
                    
            </div>
           
        </div>
        <!--endbody-->
		<footer>
			<div class="container">
				Phiên bản beta
			</div>
		</footer>
       
    </body>
</html>
<?php
	}
	else{
		header('location:../login.php');
	}
?>