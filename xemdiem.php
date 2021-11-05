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
		<link rel="shortcut icon" href="image/logotlu.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="image/logotlu.png " width="30px">
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
								$link = new mysqli('localhost','root','','sinhvien','3306') or die('kết nối thất bại '); 
								mysqli_query($link, 'SET NAMES UTF8');
								$query = "SELECT sinhvien.name, diemthi.ttnt, diemthi.hdh, diemthi.cnw, diemthi.tkud FROM sinhvien, diemthi WHERE sinhvien.sinhvienID = diemthi.sinhvienID";
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										
										$ten= $r['name'];
										$ttnt=$r['ttnt'];
										$hdh = $r['hdh'];
										$cnw = $r['cnw'];
										$tkud = $r['tkud'];
										$TBC = ($ttnt + $hdh +$cnw + $tkud)/4;
										echo "<tr> ";
											echo "<td>$i</td>";	
											echo "<td>$ten</td>";
											echo "<td align= 'center'>$ttnt</td>";	
											echo "<td align= 'center'>$hdh</td>";
											echo "<td align= 'center'>$cnw</td>";
											echo "<td align= 'center'>$tkud</td>";
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