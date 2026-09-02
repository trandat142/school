<?php
session_start();
error_reporting(0);

// Xử lý hủy session và chuyển hướng về session.php
if (isset($_SESSION["ThongTin"])) {
    unset($_SESSION["ThongTin"]);
}
session_destroy();

header("Location:session.php");
exit();
?>
