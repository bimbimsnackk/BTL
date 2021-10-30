

<?php
	$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
	$idlop = $_GET['id'];
	$query = "DELETE FROM `lophoc` WHERE lopID='$idlop'";
	mysqli_query($link,$query) or die("lớp có sinh viên không thể xóa");
    header('location:../lop.php');
						}
?>