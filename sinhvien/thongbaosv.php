<?php
session_start();
if (isset($_SESSION['user_name'])) {
    $link = new mysqli('localhost', 'root', '', 'sinhvien', '3306') or die('failed');
    mysqli_query($link, 'SET NAMES UTF8');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Thông báo</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
        <link rel="shortcut icon" href="../image/logotlu.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                padding: 5px;
            }

            table {
                border-spacing: 15px;
            }
        </style>
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
                    <p> Xin chào ! <?php echo $_SESSION['user_name'] ?></p>
                    <a href="../sinhvien/dangxuatsv.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
                </div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
            <div class="container">
                <div id="menu">
                    <ul>
                        <li><a href="indexsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                        <li><a id="current" href="thongbaosv.php"><i class="fas fa-users"></i>Thông báo</a></li>
                        <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                        <li><a href="sinhviensv.php"><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                        <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                        <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                        <li><a href="contactsv.php"><i class="fas fa-address-book"></i>Contact</a></li>


                    </ul>
                    </br>
                </div>
                <div id="main-contain">
                    <h2>Thông báo</h2></br>
                    <div id="thongtinslide">
                        </form>

                        <table width="100%" padding="5px">
                            <tr>
                                <th>Bài đăng</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                            </tr>

                            <?php
                            $query = "SELECT * FROM tintuc order by ID DESC";
                            $result = mysqli_query($link, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 0;
                                while ($r = mysqli_fetch_assoc($result)) {
                                    $i++;
                                    $baidang = $r['ID'];
                                    $tieude = $r['tieude'];
                                    $noidung = $r['noidung'];
                                    echo "<tr> ";
                                    echo "<td>$baidang</td>";
                                    echo "<td>$tieude</td>";
                                    echo "<td>$noidung</td>";
                                }
                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
    </body>

    </html>

<?php

} else {
    header('location:../sinhvien/loginsv.php');
}
?>