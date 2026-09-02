<?php
session_start();

$error = "";

// Bước 3: Xử lý phần đăng ký và ghi nhớ sở thích vào cookie
if (isset($_POST['sbdangky'])) {
    $email      = trim($_POST['txtemail'] ?? '');
    $password   = $_POST['txtpassword'] ?? '';
    $repassword = $_POST['txtrepassword'] ?? '';
    $hoten      = trim($_POST['txthoten'] ?? '');
    $quequan    = $_POST['quequan'] ?? '';
    $dienthoai  = trim($_POST['txtdienthoai'] ?? '');
    $gioitinh   = $_POST['gioitinh'] ?? 'Nam';
    $sothich    = $_POST['sothich'] ?? ''; // Nhận bg_green hoặc bg_red

    if (empty($email) || empty($password) || empty($hoten)) {
        $error = "Vui lòng nhập đầy đủ các thông tin bắt buộc (*)!";
    } elseif ($password !== $repassword) {
        $error = "Mật khẩu xác nhận không khớp!";
    } else {
        // Lưu tài khoản vào session giả lập database
        $_SESSION['registered_user'] = [
            'email'     => $email,
            'password'  => $password,
            'hoten'     => $hoten,
            'quequan'   => $quequan,
            'dienthoai' => $dienthoai,
            'gioitinh'  => $gioitinh,
            'sothich'   => $sothich
        ];

        // Ghi cookie remember lưu cấu hình email và sở thích theo mẫu đề bài (100 ngày)
        $cookie_val = "dkemail=" . urlencode($email) . "&dksothich=" . urlencode($sothich);
        setcookie("remember", $cookie_val, time() + 3600 * 24 * 100, "/");

        // Điều hướng sang trang đăng nhập
        header("Location: dangnhap.php?registered=1");
        exit();
    }
}

$headerClass = $_COOKIE['bgcolor'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên - Bài 4.3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header class="<?= htmlspecialchars($headerClass) ?>">
        <h1>Đăng Ký Tài Khoản &amp; Chọn Sở Thích Màu Header</h1>
    </header>

    <div class="main">
        <nav>
            <h3>Menu</h3>
            <ul>
                <li><a href="trangchu.php">Trang chủ</a></li>
                <li><a href="dangky.php">Đăng ký</a></li>
                <li><a href="dangnhap.php">Đăng nhập</a></li>
            </ul>
        </nav>

        <div class="content">
            <h2>Thông tin Đăng Ký</h2>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="post" action="">
                <div class="form-group">
                    <label>Email (*):</label>
                    <input type="email" name="txtemail" value="<?= htmlspecialchars($_POST['txtemail'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu (*):</label>
                    <input type="password" name="txtpassword" required>
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu (*):</label>
                    <input type="password" name="txtrepassword" required>
                </div>
                <div class="form-group">
                    <label>Họ và tên (*):</label>
                    <input type="text" name="txthoten" value="<?= htmlspecialchars($_POST['txthoten'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label>Quê quán:</label>
                    <select name="quequan">
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="TP. Hồ Chí Minh" selected>TP. Hồ Chí Minh</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Điện thoại:</label>
                    <input type="tel" name="txtdienthoai" value="<?= htmlspecialchars($_POST['txtdienthoai'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <label style="width:auto; font-weight:normal; margin-right:15px;">
                        <input type="radio" name="gioitinh" value="Nam" checked> Nam
                    </label>
                    <label style="width:auto; font-weight:normal;">
                        <input type="radio" name="gioitinh" value="Nữ"> Nữ
                    </label>
                </div>

                <!-- Bước 2: Đặt value cho checkbox sở thích tương ứng class CSS -->
                <div class="form-group">
                    <label>Sở thích màu:</label>
                    <label style="width:auto; font-weight:normal; margin-right:15px;">
                        <input type="radio" name="sothich" value="bg_green" checked> Màu xanh (bg_green)
                    </label>
                    <label style="width:auto; font-weight:normal;">
                        <input type="radio" name="sothich" value="bg_red"> Màu đỏ (bg_red)
                    </label>
                </div>

                <div class="form-actions">
                    <input type="submit" name="sbdangky" value="Đăng ký" class="btn btn-primary">
                    <input type="reset" value="Làm lại" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>

    <footer>
        Bản quyền &copy; 2026 - Môn Phát triển Ứng dụng Web
    </footer>
</div>
</body>
</html>
