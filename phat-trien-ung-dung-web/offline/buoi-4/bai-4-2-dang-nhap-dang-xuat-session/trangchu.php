<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Website của tôi</h1>
        </header>

        <div class="main">
            <nav>
                <h3>Menu</h3>
                <ul>
                    <li><a href="trangchu.php">Trang chủ</a></li>
                    <?php if (!isset($_SESSION["user"])) { ?>
                        <!-- Khi chưa đăng nhập: hiển thị Đăng ký và Đăng nhập -->
                        <li><a href="dangky.php">Đăng ký</a></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                    <?php } else { ?>
                        <!-- c) Khi đã đăng nhập: xuất hiện thêm Đăng xuất, mất đi Đăng nhập -->
                        <li><a href="dangxuat.php">Đăng xuất</a></li>
                    <?php } ?>
                </ul>
            </nav>

            <div class="content">
                <h2>Nội dung trang chủ</h2>
                <?php if (isset($_SESSION["user"])) { ?>
                    <p>Xin chào: <b><?php echo $_SESSION["user"]["hoten"]; ?></b></p>
                    <p>Email: <?php echo $_SESSION["user"]["email"]; ?></p>
                <?php } else { ?>
                    <p>Chào mừng bạn đến với website. Vui lòng đăng nhập để sử dụng đầy đủ chức năng.</p>
                <?php } ?>
            </div>
        </div>

        <footer>
            Footer
        </footer>
    </div>
</body>
</html>
