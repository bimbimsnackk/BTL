<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$link = mysqli_connect('localhost','root','','sinhvien','3308') or die('kết nối thất bại ');

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);

//  kiểm tra xem đã nhập đủ thông tin chưa
if (empty($username)) {
array_push($errors, "Tên đăng nhập bắt buộc"); 
}
if (empty($email)) {
array_push($errors, "Email bắt buộc"); 
}
if (empty($name)) {
    array_push($errors, "Tên là bắt buộc"); 
}
if (empty($phone)) {
array_push($errors, "Số điện thoại bắt buộc"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM users WHERE user_name = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($link, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO users (user_name, pass_word,name, email, phone) VALUES ('$username','$password','$name','$email','$phone')";
echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="register.php";</script>';

if (mysqli_query($link, $sql)){
echo "Tên đăng nhập: ".$_POST['user_name']."<br/>";
echo "Mật khẩu: " .$_POST['pass_word']."<br/>";
echo "Tên: " .$_POST['$name']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Số điện thoại: ".$_POST['phone']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
}
}
}
?>