<?php
session_start();

// Xóa toàn bộ session đăng nhập rồi quay về trang chủ
session_unset();
session_destroy();

header('Location: index.php');
exit();
?>
