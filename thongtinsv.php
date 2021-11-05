
<?php
	
	session_start();
 	 if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sinh viên</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="image/lgtlu.png">
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
					
					<p> Xin chào ! <?php echo $_SESSION ["username"] ?></p>
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
                      <li><a id="current" href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>SINH VIÊN - Thông tin sinh viên</h2>
			  	<div id="thongtin">
			  			<div id="avtGiangvien">
			  				<?php 
			  						$link = new mysqli('localhost','root','','sinhvien','3306') or die('kết nối thất bại '); 
									mysqli_query($link, 'SET NAMES UTF8');
			  						if (isset($_POST['upload'])){
			  						$file = $_FILES['avt'];
			  						// echo $file['name'];
			  						// exit();
			  						move_uploaded_file($file['tmp_name'],"upload/".$file['name']);
			  						$link_avt = $file['name'];
			  						$q = 'UPDATE sinhvien SET avt = "'.$link_avt.'" WHERE  sinhvienID = "'.$_GET['id'].'"';
			  						mysqli_query($link, $q) or die('không cập nhật được');
			  						echo "<div>Đã cập nhật</div>";
			  						}

				  					$query = 'SELECT * FROM sinhvien WHERE sinhvienID = "'.$_GET['id'].'" '; 
									$result = mysqli_query($link, $query);
									if( mysqli_num_rows($result) > 0 )
										{
											$i = 0; 
											while($r= mysqli_fetch_assoc($result))
											{
												$i++;
												$lopID = $r['lopID'];
												$masv=$r['sinhvienID'];
												$ten= $r['name'];
												$ngaysinhsql =$r['birthday'];
												$ngaysinh = date("d-m-Y", strtotime($ngaysinhsql));
												$sdt = $r['phonenumber'];
												$quequan = $r['address'];
												$sotruong = $r['so_truong'];
												$avt = $r['avt'];
											}
										}
																	
									$q = 'SELECT tenlop FROM lophoc WHERE lopID = "'.$lopID.'" '; 
									$rs = mysqli_query($link, $q);
									$r1= mysqli_fetch_assoc($rs);
									$tenlop = $r1['tenlop'];
									//echo $tenlop;
			  				
			  					if($avt == ""){
			  						echo '<img src= "image/test.jpg" width="200px" height="200px">';
			  					}
			  					else{
			  					echo '<img src= "upload/'.$avt.'" width="200px" height="200px">';
			  					}
			  					echo " <br><b> ".$ten."</b>";
			  					echo "<br> MSSV: ".$masv;
			  				?>
			  				<form method="post" name="upload_avt" enctype="multipart/form-data">
			  					<input type="file" name = "avt" id="file" class="input_file"> 
			  					<label for ="file"> chọn file</label>
			  					<input type="submit" name = "upload" value= "upload">

			  				</form>
			  				
			  			</div>
			  			<div id="chi_tiet">
			  				 <?php
			  				  echo "<big>Họ tên: ";
			  				  echo $ten. "</big>";
							  echo "<br>Lớp: " .$tenlop. "<br>";
			  				  echo "<br>Ngày sinh: " .$ngaysinh. "<br>";
			  				  echo "Số điện thoại: " .$sdt . "<br>";
			  				  echo "Quê quán: " .$quequan . "<br>";
			  				  if ($sotruong == ""){
			  				  	echo 'Sở trường: Chưa cập nhật <br>
			  				  		<br> <span style="color:red">Cập nhật sở trường:</span> <br>
						  			<form method="post">
									<textarea name="so_truong"> </textarea>
									<input id="btnChapNhan" type="submit" value="Hoàn tất" name="thaydoi"/> ';
								if(isset($_POST['thaydoi']))
										{
											$so_truong = $_POST['so_truong'];
											$query = "UPDATE sinhvien SET so_truong = '$so_truong' WHERE name = '$ten'";
											mysqli_query($link, $query) or die ('thay đổi không thành công');
											header('location:sinhvien.php');
											
										}

			  				  }
			  				  else 
			  				  echo "Sở trường: " .$sotruong . "<br>";
			  				?>
					<form>
			  			</div>
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
	else {
		header('location:login.php');
	}
?>