<?php


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/logotlu.png">
</head>

<body>
    <header>
        <div class="container">
            <h1 align="center">Đăng kí</h1>
        </div>
    </header>
    <!--endheader-->
    <div class="body">
        <div class="container">
            <div id="formlogin">
                <form method="post" name="login-form" action="register.php">
                            <h3>Nhập thông tin đăng kí</h3>
							<br>
								<table>
									<tr height="50px">
									   <td>
										  Tên đăng nhập:
									   </td>
									   <td>
										   <input type="text" name="username" value="Bắt buộc mã sinh viên"> 
									   </td> 
									</tr>
									<tr>
										<td>
											Mật khẩu:
										</td>
										<td>
											<input id="submit" type="password" name="password">
										</td> 
									</tr>
                                    <tr>
                                        <td>
                                            Tên:
                                        </td>
                                        <td>
                                            <input type="text" name="name" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email:
                                        </td>
                                        <td>
                                            <input type="email" name="email" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Số điện thoại:
                                        </td>
                                        <td>
                                            <input type="text" name="phone" >
                                        </td>
                                    </tr>
								</table>
								<input id="btndangnhap" type="submit" name="dangky" value="Đăng kí">
        						<p>Bạn đã có tài khoản? <a href='login.php'>Đăng nhập ngay</a></p><br/>
                                <?php require 'helpregister.php';?>
					 </form>
            </div>
        </div>
    </div>
    <!--endbody-->
    <footer>
    </footer>
</body>

</html>