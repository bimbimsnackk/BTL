<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['user_name'])){
	$link = new mysqli('localhost','root','','sinhvien','3306') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
?>

    <head>
        <meta charset="utf-8">
        <title>Thông tin lớp học</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="../image/logotlu.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="../image/lgtlu.png " width="30px">
					  </div>
					<a href="../sinhvien/indexsv.php">Quản lí sinh viên</a>
				 </div>
				 <div id="accountName">
					
					<p> Xin chào ! <?php echo $_SESSION['user_name'] ?> </p>
					<a href="../sinhvien/dangxuatsv.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a  href="indexsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
					  <li><a href="thongbaosv.php"><i class="fas fa-users"></i>Thông báo</a></li>
                      <li><a id="current" href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhviensv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contactsv.php"><i class="fas fa-address-book"></i>Liên Hệ</a></li>
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
											echo " <td style='text-align: center;'><a href='dslopsv.php?id=$idlop'><input id='btnChitiet' type='button' value='xem danh sách' '></a> </td>";
									}
								}
							?>
							</table>
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