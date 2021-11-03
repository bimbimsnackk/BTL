<!DOCTYPE html>
<html>
<?php
	$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM giangvien '; 
	$result = mysqli_query($link, $query);
	if( mysqli_num_rows($result) > 0 )
									{
										$i = 0; 
										while($row= mysqli_fetch_assoc($result))
										{
											$i++;
											$maso = $row['masoGV'];
											$hotenGV = $row['hoten'];
											$trinhdoGV = $row['trinhdo'];
											$chuyenmonGV = $row['chuyenmon'];
											$email = $row['email'];
											$sdt = $row['sdt'];
											$avt = $row['link_avt_GV'];
										}

?>

    <head>
        <meta charset="utf-8">
        <title>Giảng viên </title>
        <link rel="stylesheet" href="style/style.css">
         <link rel="stylesheet" href="style/fontawesome/css/all.css">
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
					
					<p> Xin chào ! </p>
					<a href="" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li> <a href="index.php">Trang chủ</a> </li>
					  <li><a href="thongbao.php"><i class="fas fa-users"></i>Thông báo</a></li>
					  <li><a href="lop.php">LỚP</a></li>
                      <li> <a href="sinhvien.php">SINH VIÊN</a> </li>
                      <li> <a id="current"  href="giangvien.php">GIẢNG VIÊN</a> </li>
                      <li><a href="diemthi.php">ĐIỂM THI</a></li>
                      <li><a href="contact.php">Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>GIẢNG VIÊN KHOA </h2>
			  	<div id= "box_giangvien" > 
			  		
							<?php
									if( mysqli_num_rows($result) > 0 )
									{
										$i = 0; 
										while($row= mysqli_fetch_assoc($result))
										{
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
												<a href="thongtingiangvien.php?id='.$maso.'"><img src="image/';
												
											if ($avt == '') {
												echo 'test.jpg';
											}
											else{
											echo $avt;}

											echo '" width="120px" height = "120px">  </a>
												</div>
												<div>
											';
											echo "<b>$hotenGV</b></br>";
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
           
        </div>
        <!--endbody-->
		<footer>
			<div class="container">
				Phiên bản beta - Developement by Phạm Hiếu
			</div>
		</footer>
       
    </body>
</html>