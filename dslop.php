<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = "SELECT * FROM sinhvien WHERE sinhvien.lopID = '".$_GET['id']."'";
	$result = mysqli_query($link, $query);
	
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
						   <img src="image/lgtlu.png " width="30px">
					  </div>
					<a href="index.php">Quản lí sinh viên</a>
				 </div>
				<div id="accountName">
					
					<p> Xin chào ! <?php echo $_SESSION['username'] ?> </p>
					<a href="dangxuat.php" alt= "Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				</div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                     <li><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
					 <li><a href="thongbao.php"><i class="fas fa-users"></i>Thông báo</a></li>
                      <li><a id = "current" href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>DANH SÁCH SINH VIÊN LỚP  <?php $q = "SELECT tenlop FROM lophoc WHERE lopID = '".$_GET['id']."' " ;
														  $rs = mysqli_query($link, $q);
															 while($r = mysqli_fetch_assoc($rs))
															 {
																 $tenlop = $r['tenlop'];
															 };
															 echo $tenlop ;?></h2><br>
			  <div id="listSV">
						<table width = "70%">
								<tr>
									<th>STT</th>
									<th>Họ Tên</th>
									<th>Ngày sinh</th>
									<th>SĐT</th>
									<th>Địa chỉ</th>
									<th>Chức năng</th>
								</tr>
							<?php
								$i=0;
								if(mysqli_num_rows($result) > 0){
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$sinhvienID = $r['sinhvienID'];
										$ten= $r['name'];
										$ngaysinhsql =$r['birthday'];
										$ngaysinh = date("d-m-Y", strtotime($ngaysinhsql));
										$sdt = $r['phonenumber'];
										$quequan = $r['address'];
										echo "<tr> ";
											echo "<td>$i</td>";	
											echo "<td>$ten</td>"	;
											echo "<td>$ngaysinh</td>";	
											echo "<td>$sdt</td>"	;
											echo "<td>$quequan</td>"	;
											echo " <td style='text-align: center;'> <a href='chucnang/suasv.php?id=$sinhvienID '><input id='btnSua' type='button' value='sửa' '></a>   <a href='chucnang/xoasv.php?id=$sinhvienID '><input id='btnXoa' type='button' value='xóa'></a> <a href='thongtinsv.php?id=$sinhvienID '><input id='btnChitiet' type='button' value='chi  tiết' '></a>  </td>";
									}
								}
								else{
									echo '<tr > <td colspan="6" align = "center">Chưa có sinh viên ở lớp này! </td></tr>';
								}
							?>
						
						
							</table>
							<br>
							<p style="color: white; text-align:center;"><b> SĨ SỐ: <?php echo $i;?> </b></p>
					  </div>
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
	else 
	{
		 header('location: login.php');
	}
?>

