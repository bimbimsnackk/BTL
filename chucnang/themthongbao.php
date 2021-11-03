<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');			
?>
    <head>
        <meta charset="utf-8">
        <title>Thông Báo</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="../image/logotlu.png">	
        <style>
            #nd {
                height: 200px;
                width: 300px;
            }
        </style>
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="../image/lgtlu.png " width="30px">
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
                      <li><a  href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a id="current" href="../thongbao.php"><i class="fas fa-users"></i>Thông báo</a></li>
                      <li><a href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="../contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Thông Báo</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin cần nhắc : </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Tiêu Đề :</td>
								<td> <input type="text" name="tieude"></td>
							</tr>
							<tr>
								<td>Nội dung :</td>
								<td> <input id="nd" type="text" name="noidung"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="themthongbao"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
						$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
						mysqli_query($link, 'SET NAMES UTF8');
						
						if(isset($_POST['themthongbao'])){
							if(empty($_POST['tieude']) or empty($_POST['noidung'])) {echo'</br> <p style="color:red; "> Bạn chưa nhập thông tin đầy đủ ! </p> </br>';}
							else{
							$tieude = $_POST['tieude'];
							$noidung = $_POST['noidung'];
							$query = "INSERT INTO `tintuc`( `tieude`, `noidung`) VALUES('$tieude','$noidung')"; 
							mysqli_query($link,$query) or die("thêm dữ liệu thất bại");
							header('location:../thongbao.php');
							}
						}
						
					?>
					<br>Chọn menu bên trái hoặc click vào <a href="../thongbao.php" style="color: blue; text-decoration:underline;font-weight:bold;">đây</a> để quay lại thông báo.
					
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
	}
	else{
		header('location:../login.php');
	}
?>