<?php

	$link = new mysqli('localhost','root', '', 'sinhvien') or die("Kết nối thất bại!");
	mysqli_query($link, 'SET NAMES UTF8');
	if (isset($_GET['id'])){
			$query = "DELETE * FROM diemthi WHERE diemthiID = '".$_GET['id']."";
			mysqli_query($link,$query);
			header('location:../suadiem.php');
		}

?>