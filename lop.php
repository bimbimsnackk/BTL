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
        <title>Thông tin lớp học</title>
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
					  <li><a href="thongbao.php"><i class="fas fa-users"></i>Thông báo</a></li>
                      <li><a id="current" href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Liên Hệ</a></li>
                  </ul>
              </div>
              <div id="main-contain"> 
			  <h2>DANH SÁCH LỚP </h2><br>
			  <div id="listSV">
			
							  <table width = "70%">
								<tr>
									<th>STT</th>
									<th>Lớp </th>
									<th>Chủ nhiệm</th>
									<!-- <th>Phòng học</th> -->
									<th>Chức năng</th>
								</tr>
							 
							<?php
								
								$query = "SELECT * FROM lophoc";
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$idlop = $r['lopID'];
										$lop = $r['tenlop'];
										$GVchunhiem= $r['chunhiem'];
										// $phongHoc=$r['phonghoc'];
										
										echo "<tr> ";
											echo "<td>$i</td>";	
											echo "<td>$lop</td>";	
											echo "<td>$GVchunhiem</td>"	;
											// echo "<td>$phongHoc</td>";	
											echo " <td style='text-align: center;'> <a href='chucnang/sualop.php?id=$idlop'><input id='btnSua' type='button' value='sửa' '></a>   <a href='chucnang/xoalop.php?id=$idlop'><input id='btnXoa' type='button' value='xóa'></a>  <a href='dslop.php?id=$idlop'><input id='btnChitiet' type='button' value='xem danh sách' '></a> </td>";
									}
								}
							?>
							</table>
					  </div>
			<form id="formChucnang">
				<a href="chucnang/themlop.php" ><input  id="btnThemSV" type="button" value="THÊM LỚP"> </a>
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