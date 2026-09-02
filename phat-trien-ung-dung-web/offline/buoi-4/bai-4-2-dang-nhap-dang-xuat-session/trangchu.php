<?php
session_start();

// Kiểm tra trạng thái đăng nhập
$isLoggedIn = isset($_SESSION['user']);
$user = $isLoggedIn ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Quản lý Session</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Website Demo Quản Trị Trạng Thái Session</h1>
    </header>

    <div class="main">
        <nav>
            <h3>Menu Điều Hướng</h3>
            <ul>
                <li><a href="trangchu.php">Trang chủ</a></li>
                <?php if (!$isLoggedIn): ?>
                    <!-- c) Khi chưa đăng nhập: Hiển thị Đăng ký & Đăng nhập -->
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                <?php else: ?>
                    <!-- c) Khi đã đăng nhập: Xuất hiện Đăng xuất, ẩn Đăng nhập -->
                    <li><a href="dangxuat.php">Đăng xuất</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="content">
            <h2>Chào mừng bạn đến với Trang Chủ</h2>
            <?php if ($isLoggedIn): ?>
                <div class="alert alert-success">
                    <p>Xin chào, <strong><?= htmlspecialchars($user['hoten'] ?? $user['email']) ?></strong>!</p>
                    <p>Bạn đã đăng nhập thành công vào hệ thống.</p>
                </div>
                <div style="line-height: 1.8;">
                    <p><strong>Thông tin tài khoản:</strong></p>
                    <ul>
                        <li>Email: <?= htmlspecialchars($user['email']) ?></li>
                        <li>Họ và tên: <?= htmlspecialchars($user['hoten'] ?? 'Chưa cập nhật') ?></li>
                        <li>Quê quán: <?= htmlspecialchars($user['quequan'] ?? 'Chưa cập nhật') ?></li>
                        <li>Điện thoại: <?= htmlspecialchars($user['dienthoai'] ?? 'Chưa cập nhật') ?></li>
                        <li>Giới tính: <?= htmlspecialchars($user['gioitinh'] ?? 'Chưa cập nhật') ?></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <p>Bạn hiện đang là <strong>Khách vãng lai</strong>. Vui lòng <a href="dangnhap.php">Đăng nhập</a> hoặc <a href="dangky.php">Đăng ký</a> để trải nghiệm.</p>
                </div>
                <p>Hệ thống hỗ trợ kiểm soát phiên làm việc (Session), nhớ tài khoản và điều hướng trang an toàn.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        Bản quyền &copy; 2026 - Môn Phát triển Ứng dụng Web
    </footer>
</div>
</body>
</html>
