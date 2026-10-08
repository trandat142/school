<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Trang chủ</title></head>
<body>
<h2>Trang chủ</h2>

<!-- HỎI: chưa đăng nhập? -->
<?php if (!isset($_SESSION["user"])) { ?>

    <!-- ĐỔI: hiện link -->
    <a href="dangky.php">Đăng ký</a> | <a href="dangnhap.php">Đăng nhập</a>

<?php } else {
    $tk = $_SESSION["thongtin_dangky"]; ?>

    <p>Xin chào: <b><?php echo $tk["hoten"]; ?></b> | <a href="dangxuat.php">Đăng xuất</a></p>
    <?php if ($tk["anh"] != "") { ?>
        <img src="<?php echo $tk["anh"]; ?>" width="100"><br>
    <?php } ?>
    Sở thích: <?php echo implode(", ", $tk["sothich"]); ?>

<?php } ?>
</body>
</html>