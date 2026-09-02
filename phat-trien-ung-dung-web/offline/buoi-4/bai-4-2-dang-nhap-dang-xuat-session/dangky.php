<?php
session_start();

$error = "";

// Xử lý khi nhấn nút Đăng ký
if (isset($_POST['sbdangky'])) {
    $email      = trim($_POST['txtemail'] ?? '');
    $password   = $_POST['txtpassword'] ?? '';
    $repassword = $_POST['txtrepassword'] ?? '';
    $hoten      = trim($_POST['txthoten'] ?? '');
    $quequan    = $_POST['quequan'] ?? '';
    $dienthoai  = trim($_POST['txtdienthoai'] ?? '');
    $gioitinh   = $_POST['gioitinh'] ?? 'Nam';
    $sothich    = isset($_POST['sothich']) ? implode(', ', $_POST['sothich']) : '';

    // Kiểm tra tính hợp lệ cơ bản
    if (empty($email) || empty($password) || empty($hoten)) {
        $error = "Vui lòng nhập đầy đủ các trường bắt buộc (*)!";
    } elseif ($password !== $repassword) {
        $error = "Mật khẩu nhập lại không khớp!";
    } else {
        // Lưu thông tin người dùng vừa đăng ký vào session giả lập database
        $_SESSION['registered_user'] = [
            'email'     => $email,
            'password'  => $password,
            'hoten'     => $hoten,
            'quequan'   => $quequan,
            'dienthoai' => $dienthoai,
            'gioitinh'  => $gioitinh,
            'sothich'   => $sothich
        ];

        // b) Đăng ký thành công -> Điều hướng về trang đăng nhập
        header("Location: dangnhap.php?registered=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên - Bài 4.2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Đăng Ký Tài Khoản</h1>
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
            <h2>Form Thông Tin Đăng Ký</h2>

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
                        <option value="Cần Thơ">Cần Thơ</option>
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
                <div class="form-group">
                    <label>Sở thích:</label>
                    <label style="width:auto; font-weight:normal; margin-right:10px;">
                        <input type="checkbox" name="sothich[]" value="Màu xanh"> Màu xanh
                    </label>
                    <label style="width:auto; font-weight:normal; margin-right:10px;">
                        <input type="checkbox" name="sothich[]" value="Màu đỏ"> Màu đỏ
                    </label>
                    <label style="width:auto; font-weight:normal; margin-right:10px;">
                        <input type="checkbox" name="sothich[]" value="Đồng quê"> Đồng quê
                    </label>
                    <label style="width:auto; font-weight:normal;">
                        <input type="checkbox" name="sothich[]" value="Cao nguyên"> Cao nguyên
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
