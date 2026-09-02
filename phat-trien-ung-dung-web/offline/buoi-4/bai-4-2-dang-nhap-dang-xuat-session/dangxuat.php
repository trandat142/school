<?php
session_start();

// d) Xóa session đăng nhập
unset($_SESSION["user"]);
session_destroy();

// Chuyển về trang chủ
header("location:trangchu.php");
exit();
?>
