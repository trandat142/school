<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$user = $isLoggedIn ? $_SESSION['user'] : null;

// Bước 4: Lấy giá trị class màu từ Cookie bgcolor nếu có
$headerClass = $_COOKIE['bgcolor'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Theme Cookie Header</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <!-- Bước 4: Khai báo class từ cookie vào thẻ header -->
    <header class="<?= htmlspecialchars($headerClass) ?>">
        <h1>Website Tự Đổi Màu Header Theo Sở Thích</h1>
        <p style="margin-top: 5px; font-size: 14px; opacity: 0.9;">
            Trạng thái màu hiện tại:
            <strong>
                <?= $headerClass === 'bg_green' ? 'Xanh lá (bg_green)' : ($headerClass === 'bg_red' ? 'Đỏ tươi (bg_red)' : 'Mặc định (Default Dark)') ?>
            </strong>
        </p>
    </header>

    <div class="main">
        <nav>
            <h3>Menu</h3>
            <ul>
                <li><a href="trangchu.php">Trang chủ</a></li>
                <?php if (!$isLoggedIn): ?>
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                <?php else: ?>
                    <li><a href="dangxuat.php">Đăng xuất</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="content">
            <h2>Hệ thống Cá nhân hóa Theme bằng Cookie</h2>

            <?php if ($isLoggedIn): ?>
                <div class="alert alert-success">
                    <p>Xin chào: <strong><?= htmlspecialchars($user['hoten'] ?? $user['email']) ?></strong></p>
                    <p>Màu header của bạn được lưu trong Cookie và sẽ tự động duy trì <strong>10 ngày</strong>!</p>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <p>Bạn chưa đăng nhập. Hãy <a href="dangky.php">Đăng ký</a> (chọn màu sở thích) rồi <a href="dangnhap.php">Đăng nhập</a> để xem header tự động đổi màu.</p>
                </div>
            <?php endif; ?>

            <div style="background: #eef2f7; padding: 15px; border-radius: 5px; margin-top: 20px;">
                <h4>Cơ chế hoạt động của Bài 4.3:</h4>
                <ol style="margin-left: 20px; line-height: 1.8;">
                    <li>Tại form đăng ký, bạn chọn checkbox <strong>Màu xanh</strong> (<code>bg_green</code>) hoặc <strong>Màu đỏ</strong> (<code>bg_red</code>).</li>
                    <li>Cookie <code>remember</code> lưu chuỗi: <code>dkemail=...&amp;dksothich=...</code> trong 100 ngày.</li>
                    <li>Khi đăng nhập, hàm <code>parse_str()</code> tách lấy <code>dksothich</code> và ghi cookie <code>bgcolor</code> với thời hạn <strong>10 ngày</strong> (<code>time() + 3600*24*10</code>).</li>
                    <li>Thẻ <code>&lt;header class="&lt;?=$_COOKIE['bgcolor']?&gt;"&gt;</code> tự động nạp style tương ứng.</li>
                </ol>
            </div>
        </div>
    </div>

    <footer>
        Bản quyền &copy; 2026 - Môn Phát triển Ứng dụng Web
    </footer>
</div>
</body>
</html>
