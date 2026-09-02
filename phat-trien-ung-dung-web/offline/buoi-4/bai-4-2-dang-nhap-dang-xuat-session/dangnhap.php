<?php
session_start();

// a) Khi người dùng vào menu "Đăng nhập" nếu đã đăng nhập thì hệ thống điều hướng về trang chủ
if (isset($_SESSION["user"])) {
    header("location:trangchu.php");
    exit();
}

$thongbao = "";

if (isset($_POST["sbdangnhap"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lấy thông tin tài khoản đăng ký từ session hoặc tài khoản mặc định
    $user_dk = isset($_SESSION["thongtin_dangky"]) ? $_SESSION["thongtin_dangky"] : array("email" => "admin@gmail.com", "password" => "123456", "hoten" => "Quản trị viên");

    if ($email == $user_dk["email"] && $password == $user_dk["password"]) {
        // Lưu session đăng nhập
        $_SESSION["user"] = $user_dk;

        // Xử lý checkbox Nhớ thông tin đăng nhập
        if (isset($_POST["chknhothongtin"])) {
            setcookie("saved_email", $email, time() + 3600 * 24 * 30, "/");
        } else {
            setcookie("saved_email", "", time() - 3600, "/");
        }

        // c) Đăng nhập thành công -> chuyển về trang chủ
        header("location:trangchu.php");
        exit();
    } else {
        $thongbao = "Email hoặc mật khẩu không chính xác!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
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
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                </ul>
            </nav>

            <div class="content">
                <h2>Đăng nhập thông tin</h2>

                <?php if ($thongbao != "") { echo "<p style='color:red;'>$thongbao</p>"; } ?>

                <form method="post" action="">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo isset($_COOKIE['saved_email']) ? $_COOKIE['saved_email'] : ''; ?>" required><br>

                    <label>Password:</label>
                    <input type="password" name="password" required><br>

                    <label></label>
                    <input type="checkbox" name="chknhothongtin" <?php echo isset($_COOKIE['saved_email']) ? 'checked' : ''; ?>> Nhớ thông tin đăng nhập<br>

                    <label></label>
                    <input type="submit" name="sbdangnhap" value="Đăng nhập">
                    <input type="reset" value="Làm lại">
                </form>
            </div>
        </div>

        <footer>
            Footer
        </footer>
    </div>
</body>
</html>
