<?php
// Bắt buộc gọi session_start() trước khi can thiệp vào session
session_start();

// Xóa biến session 'ThongTin' và hủy phiên
if (isset($_SESSION["ThongTin"])) {
    unset($_SESSION["ThongTin"]);
}

// Xóa sạch toàn bộ dữ liệu session
session_destroy();

// Điều hướng trang PHP chuẩn: Phải gọi header() TRƯỚC mọi output HTML
header("Location: session.php");
exit();
?>
