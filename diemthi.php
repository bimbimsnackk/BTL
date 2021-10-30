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
        <title>Giảng viên </title>
        <link rel="stylesheet" href="style/style.css">
         <link rel="stylesheet" href="style/fontawesome/css/all.css">
		 <link rel="shortcut icon" href="image/logokhoa.ico">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="image/lgtlu.png " width="30px">
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
                    <li><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a id = "current" href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Liên hệ</a></li>
                  </ul>
            	</div>
              <div id="main-contain"> 
			  <h2>ĐIỂM THI </h2>
				<div class= "chucnang">
						<div class="infGiangvien">
						<div>
							<a href="xemdiem.php"><img src="image/xem.jpg" width="120px" height="120px";>  </a>
						</div>
						<div>
							<b> XEM ĐIỂM </b> </br>
						</div>
					</div>
					<div class="infGiangvien">
						<div>
							<a href="suadiem.php"><img src="image/sua.jpg" width="120px" height="120px";>  </a>
						</div>
						<div>
							<b> SỬA ĐIỂM  </b> </br>
						</div>
					</div>
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
	else 
	{
		 header('location: login.php');
	}
?>