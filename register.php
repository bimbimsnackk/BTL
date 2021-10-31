<?php
session_start()

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/logotlu.png">
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
            <div id="formregister">
                <form method="post" name="regis-form" action="register.php">
                    <h1>Tên đăng nhập:</h1> <input type="text" name="username" value="" required>
                    <h1>Mật khẩu:</h1> <input type="text" name="password" value="" required />
                    <h1>Tên hiển thị:</h1> <input type="text" name="name" value="" required />
                    <h1> Email:</h1><input type="email" name="email" value="" required />
                    <h1>Số điện thoại:</h1><input type="text" name="phone" value="" required />
                    <input type="submit" name="dangky" value="Đăng Ký"/>
                    <h1>Bạn đã có tài khoản? <a href='login.php'>Đăng nhập ngay</a></h1><br/>
                    <?php require 'helpregister.php';?>
                </form>
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