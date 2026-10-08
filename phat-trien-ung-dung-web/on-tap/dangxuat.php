<?php
session_start();
// BỎ: chỉ xóa biến đăng nhập. KHÔNG session_destroy vì sẽ mất luôn thông tin đăng ký
unset($_SESSION["user"]);
// CHUYỂN
header("location:trangchu.php");
exit();
?>