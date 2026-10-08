<?php
session_start();

// CHẶN: đã đăng nhập rồi thì về trang chủ
if (isset($_SESSION["user"])) {
    header("location:trangchu.php");
    exit();
}

$loi = "";

// Đọc cookie đã nhớ (chưa có thì để rỗng)
$email_cookie = "";
if (isset($_COOKIE["saved_email"])) {
    $email_cookie = $_COOKIE["saved_email"];
}

if (isset($_POST["sbdangnhap"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($_SESSION["thongtin_dangky"])) {
        $tk = $_SESSION["thongtin_dangky"];

        // SO: email đúng VÀ mật khẩu đúng
        if ($email == $tk["email"] && $password == $tk["password"]) {
            // LƯU
            $_SESSION["user"] = $email;

            // NHỚ: tích thì lưu cookie 10 ngày, không tích thì xóa cookie
            if (isset($_POST["chknho"])) {
                setcookie("saved_email", $email, time() + 3600 * 24 * 10, "/");
            } else {
                setcookie("saved_email", "", time() - 3600, "/");
            }

            // CHUYỂN
            header("location:trangchu.php");
            exit();
        }
    }
    // chạy tới đây nghĩa là sai hoặc chưa đăng ký
    $loi = "Email hoặc mật khẩu không chính xác!";
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Đăng nhập</title></head>
<body>
<h2>Đăng nhập</h2>
<p style="color:red;"><?php echo $loi; ?></p>
<form method="post" action="">
    Email: <input type="email" name="email" value="<?php echo $email_cookie; ?>" required><br>
    Mật khẩu: <input type="password" name="password" required><br>
    <input type="checkbox" name="chknho" <?php if ($email_cookie != "") { echo "checked"; } ?>> Nhớ email<br>
    <input type="submit" name="sbdangnhap" value="Đăng nhập">
</form>
<a href="dangky.php">Chưa có tài khoản? Đăng ký</a>
</body>
</html>