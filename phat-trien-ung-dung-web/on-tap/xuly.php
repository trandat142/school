<?php
session_start();

// CHẶN: gõ thẳng URL thì không có nút submit => đá về dangky.php
if (!isset($_POST["sbdangky"])) {
    header("location:dangky.php");
    exit();
}

// LẤY: tên trong ngoặc = thuộc tính name của ô input
$email      = $_POST["email"];
$password   = $_POST["password"];
$repassword = $_POST["repassword"];
$hoten      = $_POST["hoten"];
$dienthoai  = $_POST["dienthoai"];
$quequan    = $_POST["quequan"];
$gioitinh   = $_POST["gioitinh"];

// Mật khẩu nhập lại không khớp thì báo lỗi và dừng
if ($password != $repassword) {
    echo "Mật khẩu nhập lại không khớp. <a href='dangky.php'>Quay lại</a>";
    exit();
}

// THÍCH: mặc định mảng rỗng, có tích thì ghi đè
$sothich = array();
if (isset($_POST["sothich"])) {
    $sothich = $_POST["sothich"];
}

// ẢNH: mặc định rỗng, đúng định dạng thì mới lưu
$duongdan = "";
$ext = strtolower(pathinfo($_FILES["anhdaidien"]["name"], PATHINFO_EXTENSION));

if (in_array($ext, array("gif", "jpg", "png"))) {
    if (!is_dir("upload")) { mkdir("upload"); }
    $duongdan = "upload/" . time() . "." . $ext;                         // TÊN: đổi tên theo giờ để không trùng
    move_uploaded_file($_FILES["anhdaidien"]["tmp_name"], $duongdan);    // DỜI: tham số 1 là file tạm, tham số 2 là nơi đến
}

// LƯU: cất vào session cho trang đăng nhập và trang chủ dùng lại
$_SESSION["thongtin_dangky"] = array(
    "email"     => $email,
    "password"  => $password,
    "hoten"     => $hoten,
    "quequan"   => $quequan,
    "dienthoai" => $dienthoai,
    "gioitinh"  => $gioitinh,
    "sothich"   => $sothich,
    "anh"       => $duongdan
);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Thông tin đăng ký</title></head>
<body>
<!-- IN -->
<h2>Thông tin vừa đăng ký</h2>
Email: <?php echo $email; ?><br>
Họ tên: <?php echo $hoten; ?><br>
Quê quán: <?php echo $quequan; ?><br>
Điện thoại: <?php echo $dienthoai; ?><br>
Giới tính: <?php echo $gioitinh; ?><br>
Sở thích:
<?php
// foreach: duyệt mảng, mỗi vòng lấy 1 sở thích ra in
foreach ($sothich as $st) {
    echo $st . "; ";
}
?><br>
Ảnh đại diện:
<?php
if ($duongdan != "") {
    echo "<img src='" . $duongdan . "'>";
} else {
    echo "<i>file upload không phải hình ảnh</i>";
}
?><br>
<a href="dangnhap.php">Đăng nhập</a>
</body>
</html>