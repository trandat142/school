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
        <!-- Bước 4: Tại phần html của thẻ header khai báo thêm class -->
        <header class="<?php echo isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : ''; ?>">
            <h1>Website của tôi</h1>
        </header>

        <div class="main">
            <nav>
                <h3>Menu</h3>
                <ul>
                    <li><a href="trangchu.php">Trang chủ</a></li>
                    <?php if (!isset($_SESSION["user"])) { ?>
                        <li><a href="dangky.php">Đăng ký</a></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                    <?php } else { ?>
                        <li><a href="dangxuat.php">Đăng xuất</a></li>
                    <?php } ?>
                </ul>
            </nav>

            <div class="content">
                <h2>Nội dung trang chủ</h2>
                <?php if (isset($_SESSION["user"])) { ?>
                    <p>Xin chào: <b><?php echo $_SESSION["user"]["hoten"]; ?></b></p>
                    <p>Email: <?php echo $_SESSION["user"]["email"]; ?></p>
                    <p>Header đổi màu theo sở thích: <b><?php echo isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : 'Mặc định'; ?></b></p>
                <?php } else { ?>
                    <p>Chào mừng bạn đến với website. Hãy đăng ký chọn sở thích màu và đăng nhập để thấy header đổi màu.</p>
                <?php } ?>
            </div>
        </div>

        <footer>
            Footer
        </footer>
    </div>
</body>
</html>
