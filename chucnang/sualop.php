
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM lophoc WHERE lopID = "'.$_GET['id'].'"';
	$result = mysqli_query($link, $query);
	if( mysqli_num_rows($result) > 0){
		$i=0;
			while ($r = mysqli_fetch_assoc($result)){
			$i++;
			$lop = $r['tenlop'];
			$GVchunhiem= $r['chunhiem'];
			$phongHoc=$r['phonghoc'];						
			}
	}
	
	//echo $query;
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sửa thông tin lớp </title>
        <link rel="stylesheet" href="../style/style.css">
         <link rel="stylesheet" href="../style/fontawesome/css/all.css">
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
                      <li><a href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a id="current" href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="../contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>
              </div>
              <div id="main-contain"> 
				<h2>Sửa thông tin Lớp</h2>
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập lại thông tin lớp <?php echo $lop; ?> : </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Tên Lớp : </td>
								<td> <input type="text" name="ten" value = "<?php echo $lop;?>"> </td>
							</tr>
							<tr>
								<td>GVCN :</td>
								<td> <input type="text" name="GVCN" value = "<?php echo $GVchunhiem; ?>"> </td>
							</tr>
							<tr>
								<td>Phòng học :  </td>
								<td> <select name = "phonghoc" > 
										<option><?php echo $phongHoc; ?> </option>
										<option>P.101</option>
										<option>P.102</option>
										<option>P.103</option>
										<option>P.201</option>
										<option>P.202</option>
										<option>P.203</option>
										<option>P.301</option>
										<option>P.302</option>
										<option>P.303</option>
									</select>
								</td>
							</tr>
					
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="sua"/>
								</td>
							</tr>
						</table>
						
					</form>
					<br>Chọn menu bên trái hoặc click vào <a href="../lop.php" style="color: blue; text-decoration:underline">đây</a> để quay lại danh sách lớp.
				<?php
						$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
						mysqli_query($link, 'SET NAMES UTF8');
						
						if(isset($_POST['sua'])){
							if(empty($_POST['ten']) or empty($_POST['GVCN']) or empty($_POST['phonghoc'])) {echo'</br> <p style="color:red; "> vui lòng không để trống các trường! </p> </br>';}
							else{
							$lop = $_POST['ten'];
							$GVchunhiem = $_POST['GVCN'];
							$phongHoc = $_POST['phonghoc'];
							$query = "UPDATE `lophoc` SET tenlop='$lop',chunhiem = '$GVchunhiem' , phonghoc = '$phongHoc' WHERE tenlop = '$lop'";
							mysqli_query($link, $query) or die("sửa không thành công");
							header('location:../lop.php');
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