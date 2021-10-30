<!DOCTYPE html>
<html>
<?php
	session_start();
 	 if(isset($_SESSION['username'])){
?>

    <head>
        <meta charset="utf-8">
        <title>Sinh viên</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="image/logokhoa.ico">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="image/logokhoa.png " width="30px">
					  </div>
					<a href="index.php">STUDENT MANAGER</a>
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
                     <li><a  href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a id="current" href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>
             	</div>
             	 <div id="main-contain"> 
			  			<h2>BẢNG ĐIỂM </h2></br>
			  		<div id="listSV">
			
							  <table width = "70%">
								<tr>
									<th>STT</th>
									
									<th>Mạng máy tính</th>
									<th>Trí tuệ nhân tạo</th>
									<th>Hệ điều hành</th>
									<th>Công nghệ Web</th>
									<th>Thống kê ứng dụng</th>
									<th>TBC</th>
								</tr>
							 
							<?php
								$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
								mysqli_query($link, 'SET NAMES UTF8');
								$query = "SELECT sinhvien.name, diemthi.ltud, diemthi.ltvm, diemthi.htvt, diemthi.htcm FROM sinhvien, diemthi WHERE sinhvien.sinhvienID = diemthi.sinhvienID";
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										
										$ten= $r['name'];
										$ltud=$r['ltud'];
										$ltvm = $r['ltvm'];
										$htvt = $r['htvt'];
										$htcm = $r['htcm'];
										$TBC = ($ltud + $ltvm +$htvt + $htcm)/4;
										echo "<tr> ";
											echo "<td>$i</td>";	
											echo "<td>$ten</td>";
											echo "<td align= 'center'>$ltud</td>";	
											echo "<td align= 'center'>$ltvm</td>";
											echo "<td align= 'center'>$htvt</td>";
											echo "<td align= 'center'>$htcm</td>";
											echo "<td align= 'center'>$TBC</td>";
									}
								}
							?>
							</table>
					  </div>
						<form id="formChucnang">
							<a href="chucnang/themdiem.php" ><input  id="btnThemSV" type="button" value="SỬA ĐIỂM"> </a>
						</form>
              		</div>
            </div>
           
        </div>
        <!--endbody-->
		<footer>
			<div class="container">
				Made by : Tiến Dũng
			</div>
		</footer>
       
    </body>
</html>
<?php
	}
	else {
		header('location:login.php');
	}
?>