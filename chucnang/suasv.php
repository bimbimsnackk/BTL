
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM sinhvien WHERE sinhvienID = "'.$_GET['id'].'"' ;
	$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$ten= $r['name'];
										$ngaysinh=$r['birthday'];
										$sdt = $r['phonenumber'];
										$quequan = $r['address'];
									}
								}
	//echo $query;
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sửa thông tin sinh viên</title>
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
					
					<p> Xin chào !  <?php echo $_SESSION['username'] ?> </p>
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
                      <li><a id="current"href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="../contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Sửa thông tin Sinh Viên</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập lại thông tin sinh viên <?php echo $ten ?>: </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <input type="text" name="ten" value="<?php echo $ten; ?>">
								</td>
							</tr>
							<tr>
								<td>Ngày sinh </td>
								<td> <input type="date" name="ngaysinh" value= "<?php echo $ngaysinh;?>" </td>
							</tr>
							<tr>
								<td>Số điện thoại </td>
								<td> <input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
							</tr>
							<tr>
								<td>Quê quán </td>
								<td> <input type="text" name="quequan" value="<?php echo $quequan; ?>"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="sua"/>
								</td>
							</tr>
						</table>
						
					</form>
					<br>Chọn menu bên trái hoặc click vào <a href="../sinhvien.php" style="color: blue; text-decoration:underline">đây</a> để quay lại danh sách sinh viên.
					
					
					<?php
						
						if(isset($_POST['sua'])){
							if(empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['quequan'])) {echo'</br> <p style="color:red;font-weight:bold; "> vui lòng không để trống các trường!</p> </br>';}
							else{
								$id = $_GET['id'];
								$hotenSV = $_POST['ten'];
								$ngaySinh = $_POST['ngaysinh'];
								$sDt = $_POST['sdt'];
								$queQuan = $_POST['quequan'];
								$query = "UPDATE `sinhvien` SET name = '$hotenSV', birthday = '$ngaySinh', phonenumber = '$sDt', address = '$queQuan' WHERE sinhvienID = '$id'";
								mysqli_query($link, $query) or die("sửa không thành công");
								header('location:../sinhvien.php');
							}
						}
					?>
					
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