<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: trangchu.php");
    exit();
}

$error = "";
$success_msg = "";

if (isset($_GET['registered'])) {
    $success_msg = "Đăng ký thành công! Vui lòng đăng nhập.";
}

// Bước 3: Xử lý phần đăng nhập và kích hoạt Cookie đổi màu header
if (isset($_POST['sbdangnhap'])) {
    $email    = trim($_POST['txtemail'] ?? '');
    $password = $_POST['txtpassword'] ?? '';

    $valid_user = $_SESSION['registered_user'] ?? [
        'email'    => 'admin@school.vn',
        'password' => '123456',
        'hoten'    => 'Nguyễn Văn Quản Trị'
    ];

    if ($email === $valid_user['email'] && $password === $valid_user['password']) {
        $_SESSION['user'] = $valid_user;

        // Nếu có cookie remember ghi nhớ sở thích từ bước đăng ký
        if (!empty($_COOKIE["remember"])) {
            parse_str($_COOKIE["remember"], $result);
            if ($email === ($result["dkemail"] ?? '') && !empty($result["dksothich"])) {
                // Duy trì màu header trong 10 ngày (3600 * 24 * 10)
                setcookie("bgcolor", $result["dksothich"], time() + 3600 * 24 * 10, "/");
            }
        }

        // Điều hướng về trang chủ
        header("Location: trangchu.php");
        exit();
    } else {
        $error = "Email hoặc mật khẩu không chính xác!";
    }
}

$headerClass = $_COOKIE['bgcolor'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Bài 4.3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header class="<?= htmlspecialchars($headerClass) ?>">
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
            <h2>Đăng Nhập Hệ Thống</h2>

            <?php if ($success_msg): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_msg) ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <p style="font-size: 13px; color: #666; margin-bottom: 15px;">
                <em>(Dùng tài khoản đã đăng ký hoặc demo: <code>admin@school.vn</code> / <code>123456</code>)</em>
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="txtemail" value="<?= htmlspecialchars($_POST['txtemail'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu:</label>
                    <input type="password" name="txtpassword" required>
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
