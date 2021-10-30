<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập admin</title>
        <link rel="stylesheet" href="style/style.css">
         <link rel="stylesheet" href="style/fontawesome/css/all.css">
    </head>
    <body>
        <header> 
            <div class="container"> 
                    <h1>adminstrator page - login </h1>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
            <div class="container"> 
                <div id="loginForm">
                    <form method="post" action="process.php" name="login-form">
                            <h3>Login System for admin</h3>
							
								<table>
									<tr height="50px">
									   <td>
										   Account
									   </td>
									   <td>
										   <input type="text" name="taikhoan">
									   </td> 
									</tr>
									<tr>
										<td>
											Password
										</td>
										<td>
											<input type="password" name="password">
										</td> 
									</tr>
								   
								</table>
							
                            <!--<p>error</p>-->
								<input id="btndangnhap" type="submit" name="btndangnhap" value="Login">
							
                    </form>
                   
                </div>
            </div>
        </div>
        <!--endbody-->
        <footer>
            <div class="container"> 
              <div id="ftcontent">Student Mannager Application Version 1.0 - Test</div>
            </div>
        </footer>
    </body>
</html>