<?php
session_start();

// a) Nếu người dùng đã đăng nhập thì tự động điều hướng về trang chủ
if (isset($_SESSION['user'])) {
    header("Location: trangchu.php");
    exit();
}

$error = "";
$success_msg = "";

if (isset($_GET['registered'])) {
    $success_msg = "Đăng ký thành công! Vui lòng đăng nhập với thông tin vừa tạo.";
}

// Xử lý submit form Đăng nhập
if (isset($_POST['sbdangnhap'])) {
    $email = trim($_POST['txtemail'] ?? '');
    $password = $_POST['txtpassword'] ?? '';

    // Tài khoản đã đăng ký trong phiên hoặc tài khoản demo mặc định
    $valid_user = $_SESSION['registered_user'] ?? [
        'email'     => 'admin@school.vn',
        'password'  => '123456',
        'hoten'     => 'Nguyễn Văn Quản Trị',
        'quequan'   => 'TP. Hồ Chí Minh',
        'dienthoai' => '0901234567',
        'gioitinh'  => 'Nam'
    ];

    if ($email === $valid_user['email'] && $password === $valid_user['password']) {
        // c) Đăng nhập thành công -> Lưu session
        $_SESSION['user'] = $valid_user;

        // Xử lý checkbox 'Nhớ thông tin đăng nhập' bằng Cookie
        if (isset($_POST['chkremember'])) {
            setcookie("saved_email", $email, time() + 86400 * 30, "/");
        } else {
            setcookie("saved_email", "", time() - 3600, "/");
        }

        // Chuyển về trang chủ
        header("Location: trangchu.php");
        exit();
    } else {
        $error = "Email hoặc mật khẩu không chính xác!";
    }
}

// Lấy email đã lưu từ cookie nếu có
$cookie_email = $_COOKIE['saved_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống - Bài 4.2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Đăng Nhập Thành Viên</h1>
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
            <h2>Form Thông Tin Đăng Nhập</h2>

            <?php if ($success_msg): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_msg) ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <p style="font-size: 13px; color: #666; margin-bottom: 15px;">
                <em>(Gợi ý tài khoản demo: <code>admin@school.vn</code> / Mật khẩu: <code>123456</code> hoặc dùng tài khoản vừa đăng ký)</em>
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="txtemail" value="<?= htmlspecialchars($_POST['txtemail'] ?? $cookie_email) ?>" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="txtpassword" required>
                </div>
                <div class="form-group" style="padding-left: 140px;">
                    <label style="width: auto; font-weight: normal; cursor: pointer;">
                        <input type="checkbox" name="chkremember" <?= !empty($cookie_email) ? 'checked' : '' ?>> Nhớ thông tin đăng nhập
                    </label>
                </div>

                <div class="form-actions">
                    <input type="submit" name="sbdangnhap" value="Đăng nhập" class="btn btn-primary">
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
