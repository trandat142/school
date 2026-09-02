<?php
session_start();

// d) Xóa session đăng nhập
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

// Xóa toàn bộ session
session_destroy();

// Điều hướng về trang chủ
header("Location: trangchu.php");
exit();
?>
