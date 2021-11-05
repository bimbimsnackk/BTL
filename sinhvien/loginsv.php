<?php
session_start()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="../style/style.css">
		<link rel="shortcut icon" href="../image/logotlu.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                    <h1 align="center">Đăng nhập cho sinh viên</h1>
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
										  Tài khoản :
									   </td>
									   <td>
										   <input type="text" name="user_name">
									   </td> 
									</tr>
									<tr>
										<td>
											Mật khẩu
										</td>
										<td>
											<input id="submit" type="password" name="pass_word">
										</td> 
									</tr>
								</table>
								<input id="btndangnhap" type="submit" name="login" value="Đăng nhập">
        						<p>Bạn chưa có tài khoản? <a href='../register.php'>Đăng ký ngay</a></p><br/>
                                <a href="../login1.php"><p>Quay lại tư cách đăng nhập (click)</p></a>
					 </form>
								<?php
									
									$link = new mysqli('localhost','root','','sinhvien','3306') or die('kết nối thất bại '); 
									mysqli_query($link, 'SET NAMES UTF8');
									if(isset($_POST['login'])){
										if ( empty($_POST['user_name']) or empty($_POST['pass_word'])) { echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';}
										else
										{
											$user_name= $_POST['user_name'];
											$pass_word= $_POST['pass_word'];
											$query="SELECT * FROM users where user_name = '$user_name' and pass_word = '$pass_word'";
											$result = mysqli_query($link, $query);
											$num = mysqli_num_rows($result);
											if($num==0)
												{
													echo'</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
												}
											else {

												$_SESSION['user_name']= $user_name;
												header('location:../sinhvien/indexsv.php');
												
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
            
            </div> -->
        </footer>
    </body>
</html>
