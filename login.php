
<?php
session_start()

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="style/style.css">
		<link rel="shortcut icon" href="image/logokhoa.ico">
    </head>
    <body>
        <header> 
            <div class="container"> 
                    <h1 align="center">Đăng nhập</h1>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
            <div class="container"> 
                <div id="formlogin">
                    <form method="post" name="login-form">
                            <h3>Nhập thông tin đăng nhập</h3>
							<br>
								<table>
									<tr height="50px">
									   <td>
										  Tài khoản : thêm 1 dòng 
									   </td>
									   <td>
										   <input type="text" name="taikhoan">
									   </td> 
									</tr>
									<tr>
										<td>
											Mật khẩu
										</td>
										<td>
											<input id="submit" type="password" name="password">
										</td> 
									</tr>
								</table>
								<input id="btndangnhap" type="submit" name="login" value="Login">
        						<p>Bạn chưa có tài khoản? <a href='register.php'>Đăng ký ngay</a></p><br/>
					 </form>
								<?php
									
									$link = new mysqli('localhost','root','','sinhvien','3308') or die('kết nối thất bại '); 
									mysqli_query($link, 'SET NAMES UTF8');
									if(isset($_POST['login'])){
										if ( empty($_POST['taikhoan']) or empty($_POST['password'])) { echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';}
										else
										{
											$username= $_POST['taikhoan'];
											$password= $_POST['password'];
											$query="SELECT * FROM dangnhap where account = '$username' and password = '$password'";
											$result = mysqli_query($link, $query);
											$num = mysqli_num_rows($result);
											if($num==0)
												{
													echo'</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
												}
											else {

												$_SESSION['username']= $username;
												header('location:index.php');
												
												}
										}
										
									}

								?>
                </div>
            </div>
        </div>
        <!--endbody-->
        <footer>
            <!-- <div class="container"> 
              <div id="ftcontent">Student Mannager Application Version 1.0 - Test</div>
            </div> -->
        </footer>
    </body>
</html>
