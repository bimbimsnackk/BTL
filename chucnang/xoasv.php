

<?php
	$link = new mysqli('localhost','root','','sinhvien','3306') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
	$hoten = $_GET['id'];
	$query = 'DELETE FROM `sinhvien` WHERE sinhvienID = "'.$_GET['id'].'"' ;
	mysqli_query($link,$query) or die("xóa dữ liệu thất bại");
    header('location:../sinhvien.php');
						}
?>
				